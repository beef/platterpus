<?php
/*
 * ========================================================================
 * Setup
 * ========================================================================
 */

// Functions
//---------------------------------------------------------

// Load Custom Theme Scripts using Enqueue
function platterpus_scripts() {
    if (!is_admin()) {
        wp_deregister_script('jquery'); // Deregister WordPress jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js', array(), '1.9.0', true); // Google CDN jQuery
        wp_enqueue_script('jquery'); // Enqueue it!
        
        wp_register_script('modernizr', get_template_directory_uri() . '/assets/javascripts/modernizr.min.js', array('jquery'), '2.6.2'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('platterpus', get_template_directory_uri() . '/assets/javascripts/application.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('platterpus'); // Enqueue it!
    }
}

// Theme Stylesheets using Enqueue
function platterpus_styles() {   
    wp_register_style('platterpus', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('platterpus'); // Enqueue it!
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Intiate
//---------------------------------------------------------
add_action('init', 'platterpus_scripts'); // Add Custom Scripts
add_action('wp_enqueue_scripts', 'platterpus_styles'); // Add Theme Stylesheet
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)

?>