<?php
/*
 *  Author: Beef | @wearebeef
 *  Custom functions, support, custom post types and more.
 */

require_once locate_template('/includes/support.php');            	// Setting up wordpress features

require_once locate_template('/includes/setup.php');								// Default Setup for Wordpress
require_once locate_template('/includes/cleanup.php');							// Cleanup some Wordpress Mess
require_once locate_template('/includes/comments.php');						// Setting Up Discuss Comments
require_once locate_template('/includes/custom.php');							// Custom Features 

require_once locate_template('/includes/widget-areas.php');				// Widget Areas
require_once locate_template('/includes/custom-post-types.php');   // Custom Post Types
require_once locate_template('/includes/theme-options.php');       // Theme Options

?>