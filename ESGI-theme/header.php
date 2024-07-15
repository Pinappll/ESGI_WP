<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
   
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="site-header">
        <div class="container-unfold">
            <?php 
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            } 
            ?>
            <a href="" class="custom-menu-link"><img src="<?php echo get_template_directory_uri(); ?>/img/menu.svg" alt="Menu" id="menu"></a>
        </div>
        <div class="fold">
            <div class="fold-logo">
                <?php the_custom_logo(); ?>
                <a href="" class="custom-menu-link"><img src="<?php echo get_template_directory_uri(); ?>/img/close.svg" alt="Close" id="close"></a>
            </div>
            <nav id="site-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'menu_class' => 'menu',
                ));
                ?>
            </nav>
        </div>
    </header>
    <div id="content">