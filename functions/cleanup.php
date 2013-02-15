<?php
/*
 * ========================================================================
 * Cleanup
 * ========================================================================
 */


// Functions
//---------------------------------------------------------
// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
		$args['container'] = false;
		return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
		return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
		return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
		global $wp_widget_factory;
		remove_action('wp_head', array(
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style'
		));
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag) {
		return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
}

function example_remove_dashboard_widgets() {
		// Globalize the metaboxes array, this holds all the widgets for wp-admin
		global $wp_meta_boxes;

		// Remove the incomming links widget
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);   

		// Remove right now
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

function platterpus_remove_menu_elements()
{   
		// Remove Theme Editor
		remove_submenu_page( 'themes.php', 'theme-editor.php' );  

		// Remove Plugin Editor  
		remove_submenu_page( 'plugins.php', 'plugin-editor.php' );

		// Remove Comments 
		remove_menu_page( 'edit-comments.php' );
}

// Change Login Error Messages
function failed_login() {
	return 'The login information you have entered is incorrect.';
}

// Edt Admin Footer
function modify_footer_admin () {  
  echo 'Created by <a href="http://www.wearebeef.com">Beef</a>. Powered by <a href="http://www.wordpress.org">WordPress</a>';  
}


// Replace the default welcome 'Howdy' in the admin bar with something more professional.
function admin_bar_replace_howdy($wp_admin_bar) {
    $account = $wp_admin_bar->get_node('my-account');
    $replace = str_replace('Howdy,', 'Welcome,', $account->title);            
    $wp_admin_bar->add_node(array('id' => 'my-account', 'title' => $replace));
}

// Initiate
//---------------------------------------------------------
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('screen_options_show_screen', '__return_false'); // Hides the screen options tab
add_filter('login_errors', 'failed_login'); // Change Login Error Messages
add_filter('admin_footer_text', 'modify_footer_admin'); // Edt Admin Footer
add_filter('admin_bar_menu', 'admin_bar_replace_howdy', 25); // Replace the default welcome 'Howdy' in the admin bar with something more professional.

remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

add_action('admin_init', 'platterpus_remove_menu_elements', 102); // Remove menu items
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' ); // Remove dashboard widgets - Incoming links

// Originally from http://wpengineer.com/1438/wordpress-header/
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

add_filter('the_generator', '__return_false'); //Remove the WordPress version from RSS feeds

?>