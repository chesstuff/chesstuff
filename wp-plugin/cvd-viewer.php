<?php
/*
Plugin Name: cvd-viewer
Plugin URI: http://code.google.com/p/chesstuff/source/browse/wp-plugin
Description: Allows including of PGN data in your blog posts that are later displayed on an interactive chesboard. Make chess publishing on the Web really easy.
Version: 0.1.0
$Revision$
Author: Nikolai Pilafov
Author URI: http://chesstuff.blogspot.com
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

function cvd_rewrite_pgn ( $pbody ) {
	global $cvd_seqno;

	// there must be at least two attribute pairs on the PGN tag: id and onload
	if ( preg_match_all ( "#\s+(\w+)=(?P<quot>[\"']?)(.+?)(?P=quot)(?=\s)#",
			$pbody[1] . " ", $matches, PREG_SET_ORDER ) < 2 )
		return $pbody[0];

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
		return $pbody[0];

	$cvd_stag .= " seqno='$cvd_seqno'>/*";
	$cvd_seqno++;

	// strip numeric entities
	$pgn = str_replace ( array ( '&#8220;', '&#8221;', '&#8243;' ), '"', $pbody[2] );

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

/**
 * the following nice and powerful way of doing this doesn't work if $content is about 10K big
 * in that case both "preg_replace_callback" and "preg_split" functions fail quite badly
 */

function cvd_content ( $content ) {
	return preg_replace_callback ( '/<pgn(.*?)>((.|\n|\r)*?)<\/pgn>/', "cvd_rewrite_pgn", $content );
}

// the first instance of CVD on the page gets to be the number-one
$cvd_seqno = 1;

add_filter ( 'the_content', 'cvd_content' );
add_action ( 'wp_head', 'cvd_header_tags' );
?>
