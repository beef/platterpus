<!doctype html>
<!--[if lte IE 9]><html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if lte IE 8]><html class="no-js ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if lte IE 7]><html class="no-js ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if !IE]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
  <head>
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    
    <!-- so:meta-->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="robots" content="all" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

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
  
    <!-- so:assets -->
    <?php wp_head(); ?>
    <!-- eo:assets -->    
    
    <?php $input_examples = get_option('sandbox_theme_input_examples'); ?>
    <?php if( isset( $input_examples['input_example'] ) && $input_examples['input_example'] ) : ?>
      <!-- Google Analytics -->
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', '<?php echo sanitize_text_field( $input_examples['input_example'] ); ?>']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
      <!-- End Google Analytics -->
    <?php endif ?>

    
      
  </head>

  <body <?php body_class(); ?>>