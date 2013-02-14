<?php

$google_analytics_id = get_option("platterpus_google_analytics_id"); 

// Google Analytics Tracking Code (ga.js)
// @ http://code.google.com/apis/analytics/docs/tracking/asyncUsageGuide.html
function google_analytics_tracking_code(){ 
  $options = get_option('platterpus_google_analytics_id');
  if ($options['gap_enable']) { ?>

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $google_analytics_id; ?>']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

<?php }
}

add_action('wp_footer', 'google_analytics_tracking_code');

?>