<?php
/*
Template Name: Services
*/
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container"> <h1><?php echo esc_html(get_theme_mod('partner_text', 'Our Services.')); ?></h1></div>
   

        <?php get_template_part('template-parts/service-section'); ?>
        <div class="container">
            <h1>
                <?php echo esc_html(get_theme_mod('service_title_text', 'Corp. Parties')); ?>
            </h1>
            <p>
                <?php echo esc_html(get_theme_mod('service_paragraph_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec ultricies malesuada, nunc turpis ultricies nunc, nec ultricies nunc turpis ultricies nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec ultricies malesuada, nunc turpis ultricies nunc, nec ultricies nunc turpis ultricies nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc nec ultricies malesuada, nunc turpis ultricies nunc, nec ultricies nunc turpis ultricies nunc.')); ?>
            </p>
        </div>
        <div class="service-img">
            <?php 
            $img_service = get_theme_mod('service_image_text');
            $default_img_service = get_template_directory_uri() . '/img/png/9.png';

            if ($img_service) {
            $image_to_display = $img_service;
            } else if ($default_img_service) {
                // Utiliser le image par défaut si aucun image personnalisé n'est défini
                $image_to_display = $default_img_service;
            }

        if ($image_to_display) : ?>
            <img src="<?php echo esc_url($image_to_display); ?>" alt="<?php bloginfo('name'); ?> - image Noir et Blanc">
        <?php endif; ?>
    </main>
<?php get_footer(); ?>