<?php
/*
 * ========================================================================
 * Theme Options
 * ========================================================================
 */

function setup_theme_admin_menus() {
    add_menu_page(get_bloginfo(name).' Settings', get_bloginfo(name).' Settings', 'manage_options', strtolower(get_bloginfo(name)).'_settings', 'platterpus_settings_page');
}

function platterpus_settings_page() {
?>

    <div class="wrap">
        
        <?php screen_icon('themes'); ?><h2><?php bloginfo(name); ?> Settings</h2>
        
        <?php
        if (isset($_POST["update_settings"])) {
            $disqus_shortname = esc_attr($_POST["disqus_shortname"]);   
            update_option("platterpus_disqus_shortname", $disqus_shortname);
        ?>
            <div id="setting-error-settings_updated" class="updated settings-error">
                <p><strong>Settings saved</strong></p>
            </div>
        <?php
        } else {
            $disqus_shortname = get_option("platterpus_disqus_shortname");  
        }
        ?>
        
        <form method="POST" action="">
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    <label for="disqus_shortname">Disqus shortname:</label>
                </th>
                <td>
                    <input type="text" name="disqus_shortname" size="25" value="<?php echo $disqus_shortname;?>" />
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