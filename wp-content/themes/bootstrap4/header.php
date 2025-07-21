<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">    
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <!-- Icons -->
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/ico/favicon.png">
        <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/ico/apple_icons_57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/ico/apple_icons_72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/ico/apple_icons_114x114.png"> 
        <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/ico/apple_icons_144x144.png"> 	
    	<!-- Site Title -->
        <?php if (is_page('inicio')) { ?>
    	    <title><?php bloginfo( 'name' ); ?></title>
        <?php } else { ?>
            <title><?php wp_title(''); echo ' | ';  bloginfo( 'name' ); ?></title>
        <?php } ?>	
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- <div class="loading-overlay"></div> -->
        <!-- <div id="main" class="m-scene"> -->
            <header class="transp d-none d-md-block w-100 position-fixed t down">
                <nav class="text-white d-flex justify-content-between position-relative">
                    <a class="brand" href="<?php bloginfo('siteurl'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/del-infinito-brand.png" alt="" class="img-fluid">
                    </a>
                    <div class="menu-cont">
                        <?php wp_nav_menu( array('menu' => 'Desktop es', 'menu_class' => 'white text-lowercase d-flex justify-content-between', 'container'=> false)); ?>
                    </div>
                </nav>
                <div class="bg-gradient w-100 position-absolute"></div>
            </header>
            <header class="resp transp d-block d-md-none w-100 position-fixed down">
                <nav class="text-white d-flex justify-content-between">
                    <a class="brand" href="<?php bloginfo('siteurl'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/del-infinito-brand.png" alt="" class="img-fluid">
                    </a>
                    <div class="plus-menu-resp transition" id="toggle-plus">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/inc/icons/plus-responsive-menu.svg" alt="" class="img-fluid">
                    </div>
                </nav>
                <div class="bg-gradient w-100 position-absolute"></div>
            </header>
            <div class="overlay d-block d-md-none" id="overlay">
                <nav class="overlay-menu w-100 h-100">
                    <?php wp_nav_menu( array('menu' => 'Responsive es', 'menu_class' => 'white text-lowercase text-right h3', 'container'=> false)); ?>
                </nav>
            </div>
