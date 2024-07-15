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

function esgi_customize_register($wp_customize)
{
    // Ajout d'une nouvelle section pour les partenaires
    $wp_customize->add_section('esgi_partners_section', [
        'title' => __('Partenaires', 'ESGI'),
        'description' => __('Gérez les partenaires ici.'),
        'priority' => 160,
    ]);

    // Ajout des paramètres et contrôles pour chaque logo de partenaire (limité à 6)
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("partner_logo_$i", [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "partner_logo_$i", [
            'label' => __("Logo Partenaire $i", 'ESGI'),
            'section' => 'esgi_partners_section',
        ]));
    }

    // Ajout d'une nouvelle section pour l'équipe
    $wp_customize->add_section('esgi_team_section', [
        'title' => __('Équipe', 'ESGI'),
        'description' => __('Gérez les membres de l\'équipe ici.'),
        'priority' => 170,
    ]);

    // Ajout des paramètres et contrôles pour chaque membre de l'équipe (limité à 4)
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("team_member_photo_$i", [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "team_member_photo_$i", [
            'label' => __("Photo du membre $i", 'ESGI'),
            'section' => 'esgi_team_section',
        ]));
        
        $wp_customize->add_setting("team_member_position_$i", [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("team_member_position_$i", [
            'type' => 'text',
            'label' => __("Poste du membre $i", 'ESGI'),
            'section' => 'esgi_team_section',
        ]);

        $wp_customize->add_setting("team_member_phone_$i", [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("team_member_phone_$i", [
            'type' => 'text',
            'label' => __("Téléphone du membre $i", 'ESGI'),
            'section' => 'esgi_team_section',
        ]);

        $wp_customize->add_setting("team_member_email_$i", [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_email',
        ]);

        $wp_customize->add_control("team_member_email_$i", [
            'type' => 'email',
            'label' => __("Email du membre $i", 'ESGI'),
            'section' => 'esgi_team_section',
        ]);
    }

}
add_action('customize_register', 'esgi_customize_register');


