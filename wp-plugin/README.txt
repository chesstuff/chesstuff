********************************************************************
*              WordPress plugin for CVD viewer                     *
*                                                                  *
* The Chess Viewer Deluxe is a full featured Java applet, designed *
* to present chess games on the Web. Extending its funcionality to *
* enable publishing with WordPress is the purpose of this project. *
*                                                                  *
* The plugin allows the post's body to include PGN chess data      *
* which is later displayed on an interactive chesboard. To use it  *
* just paste your PGN chess data into your post between <pgn> and  *
* </pgn> tags as described on the Users' Guide page below.         *
*                                                                  *
* Nikolai Pilafov (pilafov[at]hotmail[dot]com)                     *
*                                                                  *
* Consult the cvd-viewer.php for the license of the plugin.        *
*                                                                  *
*******************************************************************************************
* Plugin's Code: http://code.google.com/p/chesstuff/source/browse/wp-plugin               *
* Download Page: http://code.google.com/p/chesstuff/downloads/list                        *
* Users' Guide: http://chesstuff.blogspot.com/2009/04/publishing-with-wordpress.html      *
* Info: http://chesstuff.blogspot.com/2008/11/how-to-publish-chess-game-on-your-blog.html *
*******************************************************************************************

Installation
    * Download the WordPress plugin's ZIP from the download page to the Webspace on your server.
    * Uncompress it into your server's folder "[word press install folder]/wp-content/plugins".
      If your hosting provider supports it you can combine the first two steps.
    * To make sure that the folder is created in the right place locate the plugin module
      at "[word press install folder]/wp-content/plugins/cvd-viewer/cvd-viewer.php"
    * Log in to the WordPress's administration interface and activate the cvd-viewer plugin.
    * Your installation is complete.

Using the plugin
    * Create a new post using your WordPress
    * Enter a start tag of <pgn id='oChessViewer' onload='makeChessApplet ( null );'>
    * Paste your game's PGN after this tag
    * Enter an ending tag of </pgn>
    * Publish your post and try it out.

Have fun!
