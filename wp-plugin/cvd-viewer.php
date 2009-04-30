<?php
/*
Plugin Name: cvd-viewer
Plugin URI: http://code.google.com/p/chesstuff/source/browse/wp-plugin
Description: Allows the post's body to include PGN chess data which is later displayed on an interactive chesboard. Makes chess publishing on the Web really easy.
Author: Nikolai Pilafov
Author URI: http://chesstuff.blogspot.com/2009/04/publishing-with-wordpress.html
Version: 0.2.0
*/

/**
 * Copyright 2009 Nikolai Pilafov (email: pilafov[at]hotmail)
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either version 2 of
 * the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not,
 * write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 */

function cvd_rewrite_pgn ( $sPgn ) {
	global $cvd_seqno;

	if ( ( $nTagEnd = strpos ( $sPgn, ">", 4 ) ) === false )
		return false;

	// there must be at least two attribute pairs on the PGN tag: id and onload
	if ( preg_match_all ( "#\s+(\w+)=(?P<quot>[\"']?)(.+?)(?P=quot)(?=\s)#",
			substr ( $sPgn, 4, $nTagEnd - 4 ) . " ", $matches, PREG_SET_ORDER ) < 2 )
		return false;

	$onload = "";
	$found = false;
	$cvd_stag= "<script type='text/javascript'";

	// if there are any other attribute pairs on the PGN tag we have to transfer them over
	foreach ( $matches as $value )
		if ( strcasecmp ( $value[1], 'onload' ) != 0 ) {
			$cvd_stag .= " " . $value[1] . '="' . $value[3] . '"';
			if ( !$found && strcasecmp ( $value[1], 'id' ) == 0 && strcasecmp ( $value[3], 'oChessViewer' ) == 0 )
				$found = true;
		} else
			// save the function call text for later
			$onload = $value[3];

	// is this PGN tag one of ours?
	if ( !$found || $onload == "" )
		return false;

	$cvd_stag .= " seqno='$cvd_seqno'>/*";
	$cvd_seqno++;

	// strip numeric entities
	$pgn = str_replace ( array ( '&#8220;', '&#8221;', '&#8243;' ), '"', substr ( $sPgn, $nTagEnd + 1 ) );

	// tinyMCE or WP thinks that replacing "..." with a numeric entity behind the scenes
	// will not break anything and serves a purpose! DEAD WRONG!
	$pgn = str_replace ( array ( '<p>', '</p>', '&#8230;' ), array ( '', "\n", '...' ), $pgn );

	return $cvd_stag . $pgn . "*/ $onload</script>\n" .
		'<noscript>You have JavaScript disabled and you are not seeing a graphical interactive chessboard!</noscript>';
}

function cvd_header_tags ( $_ ) {
	echo "<!-- Chess Viewer stub -->\n" .
		"<script src='http://chesstuff.googlecode.com/svn/deployChessViewer.js' type='text/javascript'></script>\n";
}

function cvd_content ( $content ) {
	$result = "";
	for ( $nPosEnd = -1; $nPosEnd < strlen ( $content ); $nPosEnd += 5 ) {
		// are there any PGN tags left?
		if ( ( $nPosStart = stripos ( $content, "<pgn", $nPosEnd + 1 ) ) === false ) {
			$result .= substr ( $content, $nPosEnd + 1 );
			break;
		}

		$result .= substr ( $content, $nPosEnd + 1, $nPosStart - $nPosEnd - 1 );
		if ( ( $nPosEnd = stripos ( $content, "</pgn>", $nPosStart + 4 ) ) === false )
			return $result . substr ( $content, $nPosStart );

		$sOrigTag = substr ( $content, $nPosStart, $nPosEnd - $nPosStart );
		// now that we have the whole tag we can try making it HTML friendly
		if ( ( $sNewTag = cvd_rewrite_pgn ( $sOrigTag ) ) === false )
			$result .= $sOrigTag . "</pgn>";
		else
			$result .= $sNewTag;
	}
	return $result;
}

// the first instance of CVD on the page gets to be the number-one
$cvd_seqno = 1;

add_filter ( 'the_content', 'cvd_content' );
add_action ( 'wp_head', 'cvd_header_tags' );
?>
