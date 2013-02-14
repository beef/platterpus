<?php
/*
 *  Author: Beef | @wearebeef
 *  Custom functions, support, custom post types and more.
 */

require_once locate_template('/functions/support.php');            	// Setting up wordpress features

require_once locate_template('/functions/setup.php');								// Default Setup for Wordpress
require_once locate_template('/functions/cleanup.php');							// Cleanup some Wordpress Mess
require_once locate_template('/functions/comments.php');						// Setting Up Discuss Comments
require_once locate_template('/functions/custom.php');							// Custom Features 

require_once locate_template('/functions/widget-areas.php');				// Widget Areas
require_once locate_template('/functions/custom-post-types.php');   // Custom Post Types
require_once locate_template('/functions/theme-options.php');       // Theme Options

?>