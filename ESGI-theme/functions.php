<?php

// Chargement des assets css
add_action('wp_enqueue_scripts', 'esgi_enqueue_assets');
function esgi_enqueue_assets()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js');
}

// Ajout de supports au thème
add_action('after_setup_theme', 'esgi_theme_setup');
function esgi_theme_setup()
{
    add_theme_support('custom-logo');
    
}

add_action('after_setup_theme', 'add_title_tag');
function add_title_tag(){
    add_theme_support('title-tag');
}

// Déclaration des emplacements de menu
// primary-menu
add_action('after_setup_theme', 'esgi_register_nav_menu', 0);
function esgi_register_nav_menu()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'ESGI'),
    ));
}


// Ajout de fichier svg dans les médias
add_filter('upload_mimes', 'add_file_types_to_uploads');
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    
}

