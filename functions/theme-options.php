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
function sandbox_example_theme_menu() {
    
    add_menu_page(
        'Sandbox Theme',                    // The value used to populate the browser's title bar when the menu page is active
        'Sandbox Theme',                    // The text of the menu in the administrator's sidebar
        'administrator',                    // What roles are able to access the menu
        'sandbox_theme_menu',               // The ID used to bind submenu items to this menu 
        'sandbox_theme_display'             // The callback function used to render this menu
    );

} // end sandbox_example_theme_menu
add_action( 'admin_menu', 'sandbox_example_theme_menu' );

/**
 * Renders a simple page to display for the theme menu defined above.
 */
function sandbox_theme_display( $active_tab = '' ) {
?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap">
    
        <div id="icon-themes" class="icon32"></div>
        <h2><?php _e( 'Sandbox Theme Options', 'sandbox' ); ?></h2>
        <?php settings_errors(); ?>
        
        <form method="post" action="options.php">
            <?php
            
                if( $active_tab == 'display_options' ) {
                
                    settings_fields( 'sandbox_theme_display_options' );
                    do_settings_sections( 'sandbox_theme_display_options' );
                    
                } elseif( $active_tab == 'social_options' ) {
                
                    settings_fields( 'sandbox_theme_social_options' );
                    do_settings_sections( 'sandbox_theme_social_options' );
                    
                } else {
                
                    settings_fields( 'sandbox_theme_input_examples' );
                    do_settings_sections( 'sandbox_theme_input_examples' );
                    
                } // end if/else
                
                submit_button();
            
            ?>
        </form>
        
    </div><!-- /.wrap -->
<?php
} // end sandbox_theme_display

/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */ 

/**
 * Provides default values for the Input Options.
 */
function sandbox_theme_default_input_options() {
    
    $defaults = array(
        'input_example'     =>  '',
        'textarea_example'  =>  '',
        'checkbox_example'  =>  '',
        'radio_example'     =>  '',
        'time_options'      =>  'default'   
    );
    
    return apply_filters( 'sandbox_theme_default_input_options', $defaults );
    
} // end sandbox_theme_default_input_options

/**
 * Initializes the theme's input example by registering the Sections,
 * Fields, and Settings. This particular group of options is used to demonstration
 * validation and sanitization.
 *
 * This function is registered with the 'admin_init' hook.
 */ 
function sandbox_theme_initialize_input_examples() {

    if( false == get_option( 'sandbox_theme_input_examples' ) ) {   
        add_option( 'sandbox_theme_input_examples', apply_filters( 'sandbox_theme_default_input_options', sandbox_theme_default_input_options() ) );
    } // end if

    add_settings_section(
        'input_examples_section',
        __( 'Input Examples', 'sandbox' ),
        'sandbox_input_examples_callback',
        'sandbox_theme_input_examples'
    );
    
    add_settings_field( 
        'Input Element',                        
        __( 'Input Element', 'sandbox' ),                           
        'sandbox_input_element_callback',   
        'sandbox_theme_input_examples', 
        'input_examples_section'            
    );
    
    add_settings_field( 
        'Textarea Element',                     
        __( 'Textarea Element', 'sandbox' ),                            
        'sandbox_textarea_element_callback',    
        'sandbox_theme_input_examples', 
        'input_examples_section'            
    );
    
    add_settings_field(
        'Checkbox Element',
        __( 'Checkbox Element', 'sandbox' ),
        'sandbox_checkbox_element_callback',
        'sandbox_theme_input_examples',
        'input_examples_section'
    );
    
    add_settings_field(
        'Radio Button Elements',
        __( 'Radio Button Elements', 'sandbox' ),
        'sandbox_radio_element_callback',
        'sandbox_theme_input_examples',
        'input_examples_section'
    );
    
    add_settings_field(
        'Select Element',
        __( 'Select Element', 'sandbox' ),
        'sandbox_select_element_callback',
        'sandbox_theme_input_examples',
        'input_examples_section'
    );
    
    register_setting(
        'sandbox_theme_input_examples',
        'sandbox_theme_input_examples',
        'sandbox_theme_validate_input_examples'
    );

} // end sandbox_theme_initialize_input_examples
add_action( 'admin_init', 'sandbox_theme_initialize_input_examples' );

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 

/**
 * This function provides a simple description for the Input Examples page.
 *
 * It's called from the 'sandbox_theme_intialize_input_examples_options' function by being passed as a parameter
 * in the add_settings_section function.
 */
function sandbox_input_examples_callback() {
    echo '<p>' . __( 'Provides examples of the five basic element types.', 'sandbox' ) . '</p>';
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
function sandbox_input_element_callback() {
    
    $options = get_option( 'sandbox_theme_input_examples' );
    
    // Render the output
    echo '<input type="text" id="input_example" name="sandbox_theme_input_examples[input_example]" value="' . $options['input_example'] . '" />';
    
} // end sandbox_input_element_callback

function sandbox_textarea_element_callback() {
    
    $options = get_option( 'sandbox_theme_input_examples' );
    
    // Render the output
    echo '<textarea id="textarea_example" name="sandbox_theme_input_examples[textarea_example]" rows="5" cols="50">' . $options['textarea_example'] . '</textarea>';
    
} // end sandbox_textarea_element_callback

function sandbox_checkbox_element_callback() {

    $options = get_option( 'sandbox_theme_input_examples' );
    
    $html = '<input type="checkbox" id="checkbox_example" name="sandbox_theme_input_examples[checkbox_example]" value="1"' . checked( 1, $options['checkbox_example'], false ) . '/>';
    $html .= '&nbsp;';
    $html .= '<label for="checkbox_example">This is an example of a checkbox</label>';
    
    echo $html;

} // end sandbox_checkbox_element_callback

function sandbox_radio_element_callback() {

    $options = get_option( 'sandbox_theme_input_examples' );
    
    $html = '<input type="radio" id="radio_example_one" name="sandbox_theme_input_examples[radio_example]" value="1"' . checked( 1, $options['radio_example'], false ) . '/>';
    $html .= '&nbsp;';
    $html .= '<label for="radio_example_one">Option One</label>';
    $html .= '&nbsp;';
    $html .= '<input type="radio" id="radio_example_two" name="sandbox_theme_input_examples[radio_example]" value="2"' . checked( 2, $options['radio_example'], false ) . '/>';
    $html .= '&nbsp;';
    $html .= '<label for="radio_example_two">Option Two</label>';
    
    echo $html;

} // end sandbox_radio_element_callback

function sandbox_select_element_callback() {

    $options = get_option( 'sandbox_theme_input_examples' );
    
    $html = '<select id="time_options" name="sandbox_theme_input_examples[time_options]">';
        $html .= '<option value="default">' . __( 'Select a time option...', 'sandbox' ) . '</option>';
        $html .= '<option value="never"' . selected( $options['time_options'], 'never', false) . '>' . __( 'Never', 'sandbox' ) . '</option>';
        $html .= '<option value="sometimes"' . selected( $options['time_options'], 'sometimes', false) . '>' . __( 'Sometimes', 'sandbox' ) . '</option>';
        $html .= '<option value="always"' . selected( $options['time_options'], 'always', false) . '>' . __( 'Always', 'sandbox' ) . '</option>';   $html .= '</select>';
    
    echo $html;

} // end sandbox_radio_element_callback

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
function sandbox_theme_validate_input_examples( $input ) {

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
    return apply_filters( 'sandbox_theme_validate_input_examples', $output, $input );

} // end sandbox_theme_validate_input_examples

?>