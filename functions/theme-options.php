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
            $enable_google_analytics = esc_attr($_POST["enable_google_analytics"]);
            $google_analytics_id = esc_attr($_POST["google_analytics_id"]);    
            update_option("platterpus_disqus_shortname", $disqus_shortname);
            update_option("platterpus_enable_google_analytics", $enable_google_analytics);
            update_option("platterpus_google_analytics_id", $google_analytics_id);
        ?>
            <div id="setting-error-settings_updated" class="updated settings-error">
                <p><strong>Settings saved</strong></p>
            </div>
        <?php
        } else {
            $disqus_shortname = get_option("platterpus_disqus_shortname");
            $enable_google_analytics = esc_attr($_POST["platterpus_enable_google_analytics"]); 
            $google_analytics_id = get_option("platterpus_google_analytics_id"); 
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
            <tr valign="top">
                <th scope="row">Enable Google Analytics</th>
                <td> 
                    <fieldset>
                        <legend class="screen-reader-text">
                            <span>Enable Google Analytics</span>
                        </legend>
                        <label for="enable_google_analytics">
                            <input name="enable_google_analytics" type="checkbox" id="enable_google_analytics" value="1" checked>
                        </label>
                    </fieldset>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">
                    <label for="google_analytics_id">Google Analytics ID:</label>
                </th>
                <td>
                    <input placeholder="UA-XXXXX-Y" type="text" name="google_analytics_id" size="25" value="<?php echo $google_analytics_id;?>" />
                    <p class="description">Your tracking code should look like this UA-XXXXX-Y</p>
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