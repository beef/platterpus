<?php
/*
 * ========================================================================
 * Theme Options
 * ========================================================================
 */

/**
 * This function introduces the theme options into the 'Appearance' menu and into a top-level 
 * 'Sandbox Theme' menu.
 */
function platterpus_theme_menu() {
    
    add_menu_page(
        get_bloginfo('name'),                 // The value used to populate the browser's title bar when the menu page is active
        get_bloginfo('name'),                 // The text of the menu in the administrator's sidebar
        'administrator',                      // What roles are able to access the menu
        'platterpus_theme_menu',              // The ID used to bind submenu items to this menu 
        'platterpus_display'            // The callback function used to render this menu
    );

} // end platterpus_theme_menu
add_action( 'admin_menu', 'platterpus_theme_menu' );

/**
 * Renders a simple page to display for the theme menu defined above.
 */
function platterpus_display() {
?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">
    
        <div id="icon-themes" class="icon32"></div>
        <h2><?php bloginfo('name') ?> Theme Options</h2>
        <?php settings_errors(); ?>
        
        <form method="post" action="options.php">
            <?php

            settings_fields( 'platterpus_input_examples' );
            do_settings_sections( 'platterpus_input_examples' );
                    
            submit_button();
            
            ?>
        </form>
        
    </div><!-- /.wrap -->
<?php
} // end platterpus_display

/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */ 

/**
 * Provides default values for the Input Options.
 */
function platterpus_default_input_options() {
    
    $defaults = array(
        'google_analytics_id'     =>  'UX-XXXXX-Y',  
    );
    
    return apply_filters( 'platterpus_default_input_options', $defaults );
    
} // end platterpus_default_input_options

/**
 * Initializes the theme's input example by registering the Sections,
 * Fields, and Settings. This particular group of options is used to demonstration
 * validation and sanitization.
 *
 * This function is registered with the 'admin_init' hook.
 */ 
function platterpus_initialize() {

    if( false == get_option( 'platterpus_input_examples' ) ) {   
        add_option( 'platterpus_input_examples', apply_filters( 'platterpus_default_input_options', platterpus_default_input_options() ) );
    } // end if

    add_settings_section(
        'platterpus_section',
        'Input Examples',
        'platterpus_callback',
        'platterpus_input_examples'
    );
    
    add_settings_field( 
        'Google Analytics ID',                       
        'Google Analytics ID',                           
        'google_analytics_id_callback',   
        'platterpus_input_examples', 
        'platterpus_section'            
    );

    add_settings_field( 
        'Disqus Shortname',                       
        'Disqus Shortname',                           
        'disqus_shortname_callback',   
        'platterpus_input_examples', 
        'platterpus_section'            
    );
    
    // add_settings_field( 
    //     'Textarea Element',                     
    //     __( 'Textarea Element', 'sandbox' ),                            
    //     'sandbox_textarea_element_callback',    
    //     'sandbox_theme_input_examples', 
    //     'input_examples_section'            
    // );
    
    // add_settings_field(
    //     'Checkbox Element',
    //     __( 'Checkbox Element', 'sandbox' ),
    //     'sandbox_checkbox_element_callback',
    //     'sandbox_theme_input_examples',
    //     'input_examples_section'
    // );
    
    // add_settings_field(
    //     'Radio Button Elements',
    //     __( 'Radio Button Elements', 'sandbox' ),
    //     'sandbox_radio_element_callback',
    //     'sandbox_theme_input_examples',
    //     'input_examples_section'
    // );
    
    // add_settings_field(
    //     'Select Element',
    //     __( 'Select Element', 'sandbox' ),
    //     'sandbox_select_element_callback',
    //     'sandbox_theme_input_examples',
    //     'input_examples_section'
    // );
    
    register_setting(
        'platterpus_input_examples',
        'platterpus_input_examples',
        'platterpus_validate_input_examples'
    );

} // end sandbox_theme_initialize_input_examples
add_action( 'admin_init', 'platterpus_initialize' );

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 

/**
 * This function provides a simple description for the Input Examples page.
 *
 * It's called from the 'sandbox_theme_intialize_input_examples_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function platterpus_callback() {
    echo '<p>Provides examples of the five basic element types.</p>';
} // end sandbox_general_options_callback

/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */ 

/**
 * This function renders the interface elements for toggling the visibility of the header element.
 * 
 * It accepts an array or arguments and expects the first element in the array to be the description
 * to be displayed next to the checkbox.
 */
function google_analytics_id_callback() {
    
    $options = get_option( 'platterpus_input_examples' );
    
    // Render the output
    echo '<input placeholder="UX-XXXXX-Y" type="text" id="google_analytics_id" name="platterpus_input_examples[google_analytics_id]" value="' . $options['google_analytics_id'] . '" />';
    
} // end sandbox_input_element_callback

function disqus_shortname_callback() {
    
    $options = get_option( 'platterpus_input_examples' );
    
    // Render the output
    echo '<input type="text" id="disqus_shortname" name="platterpus_input_examples[disqus_shortname]" value="' . $options['disqus_shortname'] . '" />';
    
} // end sandbox_input_element_callback

// function sandbox_textarea_element_callback() {
    
//     $options = get_option( 'sandbox_theme_input_examples' );
    
//     // Render the output
//     echo '<textarea id="textarea_example" name="sandbox_theme_input_examples[textarea_example]" rows="5" cols="50">' . $options['textarea_example'] . '</textarea>';
    
// } // end sandbox_textarea_element_callback

// function sandbox_checkbox_element_callback() {

//     $options = get_option( 'sandbox_theme_input_examples' );
    
//     $html = '<input type="checkbox" id="checkbox_example" name="sandbox_theme_input_examples[checkbox_example]" value="1"' . checked( 1, $options['checkbox_example'], false ) . '/>';
//     $html .= '&nbsp;';
//     $html .= '<label for="checkbox_example">This is an example of a checkbox</label>';
    
//     echo $html;

// } // end sandbox_checkbox_element_callback

// function sandbox_radio_element_callback() {

//     $options = get_option( 'sandbox_theme_input_examples' );
    
//     $html = '<input type="radio" id="radio_example_one" name="sandbox_theme_input_examples[radio_example]" value="1"' . checked( 1, $options['radio_example'], false ) . '/>';
//     $html .= '&nbsp;';
//     $html .= '<label for="radio_example_one">Option One</label>';
//     $html .= '&nbsp;';
//     $html .= '<input type="radio" id="radio_example_two" name="sandbox_theme_input_examples[radio_example]" value="2"' . checked( 2, $options['radio_example'], false ) . '/>';
//     $html .= '&nbsp;';
//     $html .= '<label for="radio_example_two">Option Two</label>';
    
//     echo $html;

// } // end sandbox_radio_element_callback

// function sandbox_select_element_callback() {

//     $options = get_option( 'sandbox_theme_input_examples' );
    
//     $html = '<select id="time_options" name="sandbox_theme_input_examples[time_options]">';
//         $html .= '<option value="default">' . __( 'Select a time option...', 'sandbox' ) . '</option>';
//         $html .= '<option value="never"' . selected( $options['time_options'], 'never', false) . '>' . __( 'Never', 'sandbox' ) . '</option>';
//         $html .= '<option value="sometimes"' . selected( $options['time_options'], 'sometimes', false) . '>' . __( 'Sometimes', 'sandbox' ) . '</option>';
//         $html .= '<option value="always"' . selected( $options['time_options'], 'always', false) . '>' . __( 'Always', 'sandbox' ) . '</option>';   $html .= '</select>';
    
//     echo $html;

// } // end sandbox_radio_element_callback

/* ------------------------------------------------------------------------ *
 * Setting Callbacks
 * ------------------------------------------------------------------------ */ 
 
/**
 * Sanitization callback for the social options. Since each of the social options are text inputs,
 * this function loops through the incoming option and strips all tags and slashes from the value
 * before serializing it.
 *  
 * @params  $input  The unsanitized collection of options.
 *
 * @returns         The collection of sanitized values.
 */
function platterpus_validate_input_examples( $input ) {

    // Create our array for storing the validated options
    $output = array();
    
    // Loop through each of the incoming options
    foreach( $input as $key => $value ) {
        
        // Check to see if the current option has a value. If so, process it.
        if( isset( $input[$key] ) ) {
        
            // Strip all HTML and PHP tags and properly handle quoted strings
            $output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
            
        } // end if
        
    } // end foreach
    
    // Return the array processing any additional functions filtered by this action
    return apply_filters( 'platterpus_validate_input_examples', $output, $input );

} // end sandbox_theme_validate_input_examples

?>