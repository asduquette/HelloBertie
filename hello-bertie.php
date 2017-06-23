<?php
  /**
   * @package Woodys
   * @version 1.0
   */
  /*
  Plugin Name: Woodys

  Description: This is not just a plugin, it symbolizes the cheerie charm of Bertie Wooster, Jeeves and the entire upper crust crew as written by P.G. Wodehouse. This plugin is totally copied from Hello Dolly by Matt Mullenweg
  Author: Andrea Duquette copying Matt Mullenweg
  Version: 0.1
  Author URI: http:andreaduquette.net
  */

  function hello_bertie_get_prose() {
    /** These are some of my favorite PG Wodehouse quotes */
    $prose = "&ldquo;There are moments, Jeeves, when one asks oneself, &lsquo;Do trousers matter&thinsp;?&rsquo;&#8201;&rdquo;<br />&rdquo;The mood will pass, sir.&rdquo;<br />&mdash; P.G. Wodehouse
		A melancholy-looking man, he had the appearance of one who has searched for the leak in life&rsquo;s gas-pipe with a lighted candle.<br />&mdash; P.G. Wodehouse
		The fascination of shooting as a sport depends almost wholly on whether you are at the right or wrong end of the gun.<br />&mdash; P.G. Wodehouse
		It is no use telling me there are bad aunts and good aunts. At the core, they are all alike. Sooner or later, out pops the cloven hoof.<br />&mdash; P.G. Wodehouse
		Hell, it is well known, has no fury like a woman who wants her tea and can't get it.<br />&mdash; P.G. Wodehouse
		Gussie, a glutton for punishment, stared at himself in the mirror.&mdash; P.G. Wodehouse
		Right-ho.<br />&mdash; P.G. Wodehouse
		It’s a rummy thing, but the silver lining had absolutely escaped my notice till then.<br />&mdash; P.G. Wodehouse
		I once got engaged to his daughter Honoria, a ghastly dynamic exhibit who read Nietzsche and had a laugh like waves breaking on a stern and rockbound coast.<br />&mdash; P.G. Wodehouse
		I pressed down the mental accelerator. The old lemon throbbed fiercely. I got an idea.<br />&mdash; P.G. Wodehouse
		Failed to win! Why, he was so far behind that he nearly came in first in the next race.<br />&mdash; P.G. Wodehouse
		
  Oh, dash it!<br />&mdash; P.G. Wodehouse";


    // Here we split it into lines
    $prose = explode( "\n", $prose );

    // And then randomly choose a line
    return wptexturize( $prose[ mt_rand( 0, count( $prose ) - 1 ) ] );
  }

// This just echoes the chosen line, we'll position it later
  function hello_bertie() {
    $chosen = hello_bertie_get_prose();
    echo "<p id='bertie'>$chosen</p>";
  }

// Now we set that function up to execute when the admin_notices action is called
  add_action( 'admin_notices', 'hello_bertie' );

// We need some CSS to position the paragraph
  function get_bertie_css() {
    // This makes sure that the positioning is also good for right-to-left languages
    $x = is_rtl() ? 'left' : 'right';

    echo "
	<style type='text/css'>
	#bertie {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
  }

  add_action( 'admin_head', 'get_bertie_css' );

?>