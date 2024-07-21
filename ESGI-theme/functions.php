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

    $wp_customize->add_setting('partner_main_title', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
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

        // Section pour la page About Us
    $wp_customize->add_section('esgi_about_section', [
        'title' => __('Page About Us', 'ESGI'),
        'priority' => 160,
    ]);

    // Titre de la section About Us
    $wp_customize->add_setting('about_section_title', [
        'default' => 'About Us',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('about_section_title', [
        'type' => 'text',
        'label' => __('Titre de la section About Us', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    // Description de la section About Us
    $wp_customize->add_setting('about_section_description', [
        'default' => 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_section_description', [
        'type' => 'textarea',
        'label' => __('Description de la section About Us', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    // Texte "Who are we?"
    $wp_customize->add_setting('about_who_we_are_title', [
        'default' => 'Who are we?',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('about_who_we_are_title', [
        'type' => 'text',
        'label' => __('Titre "Who are we?"', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    $wp_customize->add_setting('about_who_we_are_text', [
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_who_we_are_text', [
        'type' => 'textarea',
        'label' => __('Texte "Who are we?"', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    // Texte "Our vision"
    $wp_customize->add_setting('about_our_vision_title', [
        'default' => 'Our vision',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('about_our_vision_title', [
        'type' => 'text',
        'label' => __('Titre "Our vision"', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    $wp_customize->add_setting('about_our_vision_text', [
        'default' => 'Suspendisse commodo magna orci.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_our_vision_text', [
        'type' => 'textarea',
        'label' => __('Texte "Our vision"', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    // Texte "Our mission"
    $wp_customize->add_setting('about_our_mission_title', [
        'default' => 'Our mission',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('about_our_mission_title', [
        'type' => 'text',
        'label' => __('Titre "Our mission"', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    $wp_customize->add_setting('about_our_mission_text', [
        'default' => 'Aliquam eget consequat libero.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('about_our_mission_text', [
        'type' => 'textarea',
        'label' => __('Texte "Our mission"', 'ESGI'),
        'section' => 'esgi_about_section',
    ]);

    // Image pour la section About Us
    $wp_customize->add_setting('about_image', [
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', [
        'label' => __('Image de la section About Us', 'ESGI'),
        'section' => 'esgi_about_section',
    ]));
    }

}
add_action('customize_register', 'esgi_customize_register');

// Customisation du thème (WP customizer)
add_action('customize_register', 'esgi_footer_customize_register');
function esgi_footer_customize_register($wp_customize) {
    // Section de contact
    $wp_customize->add_section('contact_info_section', array(
        'title' => __('Contact Information', 'mytheme'),
        'priority' => 30,
    ));
    
    // Manager Info
    $wp_customize->add_setting('manager_name', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('manager_name', array(
        'label' => __('Manager Name', 'mytheme'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('manager_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('manager_phone', array(
        'label' => __('Manager Phone', 'mytheme'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('manager_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('manager_email', array(
        'label' => __('Manager Email', 'mytheme'),
        'section' => 'contact_info_section',
        'type' => 'email',
    ));
    
    // CEO Info
    $wp_customize->add_setting('ceo_name', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('ceo_name', array(
        'label' => __('CEO Name', 'mytheme'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('ceo_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('ceo_phone', array(
        'label' => __('CEO Phone', 'mytheme'),
        'section' => 'contact_info_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('ceo_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('ceo_email', array(
        'label' => __('CEO Email', 'mytheme'),
        'section' => 'contact_info_section',
        'type' => 'email',
    ));

    // Section des réseaux sociaux
    $wp_customize->add_section('social_media_section', array(
        'title' => __('Social Media', 'mytheme'),
        'priority' => 40,
    ));
    
    // Réseaux sociaux
    $social_networks = array('LinkedIn', 'Facebook', 'Twitter', 'Instagram');
    
    foreach ($social_networks as $network) {
        $setting_id = strtolower($network) . '_url';
        $enable_setting_id = 'enable_' . strtolower($network);
        
        // URL du réseau social
        $wp_customize->add_setting($setting_id, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control($setting_id, array(
            'label' => sprintf(__('%s URL', 'mytheme'), $network),
            'section' => 'social_media_section',
            'type' => 'url',
        ));
        
        // Activation du réseau social
        $wp_customize->add_setting($enable_setting_id, array(
            'default' => false,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control($enable_setting_id, array(
            'label' => sprintf(__('Enable %s', 'mytheme'), $network),
            'section' => 'social_media_section',
            'type' => 'checkbox',
        ));
    }
    
    // Footer Text
    $wp_customize->add_section('footer_text_section', array(
        'title' => __('Footer Text', 'mytheme'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('footer_text', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('footer_text', array(
        'label' => __('Footer Text', 'mytheme'),
        'section' => 'footer_text_section',
        'type' => 'text',
    ));

    
}

// Function "helper" pour afficher les icones
function esgi_get_icon($name)
{
    $twitter = '<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M18 1.6875C17.325 2.025 16.65 2.1375 15.8625 2.25C16.65 1.8 17.2125 1.125 17.4375 0.225C16.7625 0.675 15.975 0.9 15.075 1.125C14.4 0.45 13.3875 0 12.375 0C10.4625 0 8.775 1.6875 8.775 3.7125C8.775 4.05 8.775 4.275 8.8875 4.5C5.85 4.3875 3.0375 2.925 1.2375 0.675C0.9 1.2375 0.7875 1.8 0.7875 2.5875C0.7875 3.825 1.4625 4.95 2.475 5.625C1.9125 5.625 1.35 5.4 0.7875 5.175C0.7875 6.975 2.025 8.4375 3.7125 8.775C3.375 8.8875 3.0375 8.8875 2.7 8.8875C2.475 8.8875 2.25 8.8875 2.025 8.775C2.475 10.2375 3.825 11.3625 5.5125 11.3625C4.275 12.375 2.7 12.9375 0.9 12.9375C0.5625 12.9375 0.3375 12.9375 0 12.9375C1.6875 13.95 3.6 14.625 5.625 14.625C12.375 14.625 16.0875 9 16.0875 4.1625C16.0875 4.05 16.0875 3.825 16.0875 3.7125C16.875 3.15 17.55 2.475 18 1.6875Z" fill="#1A1A1A"/>
    </svg>
    ';

    $facebook = '<svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M3.4008 18L3.375 10.125H0V6.75H3.375V4.5C3.375 1.4634 5.25545 0 7.9643 0C9.26187 0 10.3771 0.0966038 10.7021 0.139781V3.3132L8.82333 3.31406C7.35011 3.31406 7.06485 4.01411 7.06485 5.04139V6.75H11.25L10.125 10.125H7.06484V18H3.4008Z" fill="#1A1A1A"/>
    </svg>
    ';

    $google = '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.12143 7.71429V10.8H14.3929C14.1357 12.0857 12.85 14.6571 9.25 14.6571C6.16429 14.6571 3.72143 12.0857 3.72143 9C3.72143 5.91429 6.29286 3.34286 9.25 3.34286C11.05 3.34286 12.2071 4.11429 12.85 4.75714L15.2929 2.44286C13.75 0.9 11.6929 0 9.25 0C4.23572 0 0.25 3.98571 0.25 9C0.25 14.0143 4.23572 18 9.25 18C14.3929 18 17.8643 14.4 17.8643 9.25714C17.8643 8.61428 17.8643 8.22857 17.7357 7.71429H9.12143Z" fill="#1A1A1A"/>
    </svg>
    ';

    $linkedin = '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.9698 0H1.64687C1.19966 0 0.864258 0.335404 0.864258 0.782609V17.2174C0.864258 17.5528 1.19966 17.8882 1.64687 17.8882H18.0816C18.5289 17.8882 18.8643 17.5528 18.8643 17.1056V0.782609C18.7525 0.335404 18.4171 0 17.9698 0ZM3.54749 15.205V6.70807H6.23072V15.205H3.54749ZM4.8891 5.59006C3.99469 5.59006 3.32389 4.80745 3.32389 4.02484C3.32389 3.13043 3.99469 2.45963 4.8891 2.45963C5.78351 2.45963 6.45432 3.13043 6.45432 4.02484C6.34252 4.80745 5.67171 5.59006 4.8891 5.59006ZM16.0692 15.205H13.386V11.0683C13.386 10.0621 13.386 8.8323 12.0444 8.8323C10.7028 8.8323 10.4792 9.95031 10.4792 11.0683V15.3168H7.79593V6.70807H10.3674V7.82609C10.7028 7.15528 11.5972 6.48447 12.827 6.48447C15.5102 6.48447 15.9574 8.27329 15.9574 10.5093V15.205H16.0692Z" fill="#1A1A1A"/>
    </svg>
    ';

    return isset($$name) ? $$name : ''; // nom de variable dynamique;

}
//Cusomizer pour les services
add_action('customize_register', 'esgi_services_customize_register');
function esgi_services_customize_register($wp_customize)
{
    // Section pour les services
    $wp_customize->add_section('service_section', array(
        'title' => __('Service Section', 'mytheme'),
        'priority' => 30,
    ));

    // Images et titre pour les services
    for ($i = 1; $i <= 4; $i++) {
        $setting_id = "service_image_$i";
        $wp_customize->add_setting($setting_id, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label' => __("Service Image $i", 'mytheme'),
            'section' => 'service_section',
            'settings' => $setting_id,
        )));
    }

    $wp_customize->add_setting('service_main_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_main_title', array(
        'label' => __('Service Main Title', 'mytheme'),
        'section' => 'service_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('service_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('service_title', array(
        'label' => __('Service Title', 'mytheme'),
        'section' => 'service_section',
        'type' => 'text',
    ));

   
}

// Customizer pour le Home
add_action('customize_register', 'esgi_home_customize_register');
function esgi_home_customize_register($wp_customize)
{
    // Section pour le Home
    $wp_customize->add_section('home_section', array(
        'title' => __('Home', 'mytheme'),
        'priority' => 30,
    ));

    //Titre pour le home
    $wp_customize->add_setting('home_main_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('home_main_title', array(
        'label' => __('Home Main Title', 'mytheme'),
        'section' => 'home_section',
        'type' => 'text',
    ));

    // Image pour le home
    $wp_customize->add_setting('home_hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'home_hero_image', array(
        'label' => __('Home Hero Image', 'mytheme'),
        'section' => 'home_section',
        'settings' => 'home_hero_image',
    )));

    // titre et paragraph pour le home
    $wp_customize->add_setting('home_hero_title', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('home_hero_title', array(
        'label' => __('Home Hero Title', 'mytheme'),
        'section' => 'home_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('home_hero_paragraph', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('home_hero_paragraph', array(
        'label' => __('Home Hero Paragraph', 'mytheme'),
        'section' => 'home_section',
        'type' => 'text',
    ));
   
}

add_action('pre_get_posts', 'esgi_modify_query_for_blog');
function esgi_modify_query_for_blog($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('posts_per_page', 6);
    }
}

add_action('after_setup_theme', 'esgi_setup');
function esgi_setup() {
    // Prise en charge des images mises en avant
    add_theme_support('post-thumbnails');
}

function handle_custom_comment_form() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['fullname']) && !empty($_POST['comment'])) {
        $comment_post_ID = intval($_POST['comment_post_ID']);
        $comment_parent = intval($_POST['comment_parent']);
        $fullname = sanitize_text_field($_POST['fullname']);
        $comment_content = sanitize_textarea_field($_POST['comment']);

        error_log("Received comment for post ID: $comment_post_ID"); // Debug message

        // Enregistrer le commentaire
        $comment_data = array(
            'comment_post_ID' => $comment_post_ID,
            'comment_author' => $fullname,
            'comment_content' => $comment_content,
            'comment_type' => '',
            'comment_parent' => $comment_parent,
            'user_id' => get_current_user_id(),
            'comment_approved' => 1, // Approuver immédiatement le commentaire (pour les tests)
        );

        $comment_id = wp_insert_comment($comment_data);
        if (is_wp_error($comment_id)) {
            error_log("Failed to insert comment: " . $comment_id->get_error_message());
        } else {
            error_log("Comment successfully inserted with ID: $comment_id");

            wp_redirect(get_permalink());
            exit;
        }
    } else {
        error_log("Form submission error: " . print_r($_POST, true)); // Log form data
    }
}
add_action('wp', 'handle_custom_comment_form');

function my_custom_comment_format($comment, $args, $depth) {
   
    $image_url = get_template_directory_uri() . '/img/reply.svg'; // Chemin de l'image
    ?>

    <li>
        <div class="comment-content">
            <div class="comment-author"><?php echo get_comment_author(); ?></div>
            <div class="comment-text"><?php echo get_comment_text(); ?></div>

            <?php if (comments_open()) : ?>
                <div class="comment-reply">
                    
                        <button type="submit" class="reply-button" data-comment="<?php echo comment_ID() ?>" data-author="<?php echo get_comment_author() ?>">
                            <img src="<?php echo $image_url; ?>" alt="Reply Image" class="reply-image">
                            Reply
                        </button>
                </div>
            <?php endif; ?>
        </div>
    </li>
    <?php

}
function get_recent_posts_with_images_and_dates($number_of_posts = 4) {
    $recent_posts_query = new WP_Query(array(
        'posts_per_page' => $number_of_posts,
        'post_status'    => 'publish'
    ));
    
    $output = '';
    
    if ($recent_posts_query->have_posts()) {
        $output .= '<ul class="recent-posts ">';
        while ($recent_posts_query->have_posts()) {
            $recent_posts_query->the_post();
            $output .= '<li>';
            if (has_post_thumbnail()) {
                $output .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'recent-post-image')) . '</a>';
            }
            $output .= '<div class="recent-post-content">';
            $output .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            $output .= '<span class="recent-post-date">' . get_the_date() . '</span>';
            $output .= '</div>';
            $output .= '</li>';
        }
        $output .= '</ul>';
        wp_reset_postdata(); // Réinitialise la requête principale
    } else {
        $output .= '<p>' . __('No recent posts available.') . '</p>';
    }
    
    return $output;
}

function mytheme_customize_register($wp_customize) {
    // Section Contact Form
    $wp_customize->add_section('contact_form_section', array(
        'title'    => __('Contact Form', 'mytheme'),
        'priority' => 30,
    ));

    // Setting for Contact Form H1
    $wp_customize->add_setting('contact_form_h1', array(
        'default'   => __('Write us here', 'mytheme'),
        'transport' => 'refresh',
    ));

    // Control for Contact Form H1
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_form_h1_control', array(
        'label'    => __('Contact Form H1', 'mytheme'),
        'section'  => 'contact_form_section',
        'settings' => 'contact_form_h1',
    )));

    // Setting for Contact Form P
    $wp_customize->add_setting('contact_form_p', array(
        'default'   => __('Go! Don\'t be shy.', 'mytheme'),
        'transport' => 'refresh',
    ));

    // Control for Contact Form P
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'contact_form_p_control', array(
        'label'    => __('Contact Form Paragraph', 'mytheme'),
        'section'  => 'contact_form_section',
        'settings' => 'contact_form_p',
    )));
}

add_action('customize_register', 'mytheme_customize_register');

function custom_excerpt_by_sentences($text, $sentence_count = 1) {
    // Vérifiez si le texte est vide
    if (empty($text)) {
        return '';
    }

    // Diviser le texte en phrases
    $sentences = preg_split('/(\.|\!|\?)(\s)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

    // Vérifiez si nous avons des phrases
    if (count($sentences) < 2) {
        return $text;
    }

    $excerpt = '';
    $sentences_count = 0;

    for ($i = 0; $i < count($sentences); $i += 3) {
        if ($sentences_count >= $sentence_count) {
            break;
        }
        $excerpt .= $sentences[$i] . $sentences[$i + 1];
        $sentences_count++;
    }

    // Ajouter des points de suspension si le texte est plus long que les phrases spécifiées
    if ($sentences_count < count($sentences) / 3) {
        $excerpt .= '...';
    }

    return $excerpt;
}





