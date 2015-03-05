<html <?php language_attributes(); ?>>
  <head>
    <title><?php  
    if (is_page('home')) {
        bloginfo('name') ?> | <?php bloginfo ( 'description' ); 
    }
    if (is_single()) {
        bloginfo('name') ?> | <?php the_title();
    }
    if (is_page() && !is_page('home')) {
        bloginfo('name') ?> | <?php the_title();
    }
    if (is_404() && !is_page('home')) {
        bloginfo('name') ?> | Page Not Found <?php
    } 
    ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" rel="apple-touch-icon" />

    <script type="text/javascript" src="/wp-content/js/media-query-polyfill.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <!--[if lt IE 9]>
    <script src="/wp-content/js/html5shiv.js"></script>
    <![endif]-->

    <link  href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" media="screen">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/wp-content/js/gravityforms.js"></script>
    <?php wp_head();?>
  </head>
