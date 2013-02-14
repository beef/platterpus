<?php
/*
 * ========================================================================
 * Theme Options
 * ========================================================================
 */

function setup_theme_admin_menus() {
    add_menu_page('Platterpus settings', 'Platterpus settings', 'manage_options', 'platter_settings', 'platterpus_settings_page');
}

function platterpus_settings_page() {

    if (isset($_POST["update_settings"])) {
        $num_elements = esc_attr($_POST["num_elements"]);   
        update_option("theme_name_num_elements", $num_elements);
    }

?>

    <div class="wrap">
        
        <?php screen_icon('themes'); ?> <h2>Front page elements</h2>
        
        <form method="POST" action="">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <label for="num_elements">
                        Number of elements on a row:
                    </label>
                </th>
                <td>
                    <input type="text" name="num_elements" size="25" value="<?php echo $num_elements;?>" />
                </td>
            </tr>                
        </table>
        <p><input type="submit" value="Save settings" class="button-primary"/></p>
        <input type="hidden" name="update_settings" value="Y" />
        </form>
        
    </div>
    
<?php
}

add_action("admin_menu", "setup_theme_admin_menus");

?>