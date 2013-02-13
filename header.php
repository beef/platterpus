<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

  <head>
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    
    <!-- so:meta-->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="robots" content="all" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>

    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="" />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />

    <meta name="robots" content="noodp,noydir" />

    <meta name="author" content="Site Title" />
    <meta name="copyright" content="Year, Site Title" />

    <meta name="Geo.Country" content="GB" />
    <meta name="Geo.Region" content="GB-BST" />
    <!-- eo:meta-->
  
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon-precomposed.png">
  
    <!--[if ! lte IE 6]><!-->
      <link href="style.css" media="screen,tv,projection" rel="Stylesheet" type="text/css" />
      <!--[if lte IE 9]><link href="assets/stylesheets/ie9.css" media="screen" rel="Stylesheet" type="text/css" /><![endif]-->
      <!--[if lte IE 8]><link href="assets/stylesheets/ie8.css" media="screen" rel="Stylesheet" type="text/css" /><![endif]-->
      <!--[if lte IE 7]><link href="assets/stylesheets/ie7.css" media="screen" rel="Stylesheet" type="text/css" /><![endif]-->
    <!--<![endif]-->
    <!--[if lte IE 6]>
      <link rel="stylesheet" href="http://universal-ie6-css.googlecode.com/files/ie6.1.1.css" media="screen, projection">
    <![endif]-->
      
    <script src="assets/javascripts/modernizr.min.js"></script>
  
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-XXXXX-X']);
      _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
      
  </head>

  <body <?php body_class(); ?>>