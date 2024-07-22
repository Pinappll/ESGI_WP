<div class="home-section">
    <div class="left"></div>
    <div class="right">
        <div>
        <?php if (get_theme_mod('about_hero_image')) : ?>
            <img src="<?php echo esc_url(get_theme_mod('about_hero_image')); ?>" alt="About hero Image">
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri() . '/img/png/4.png'; ?>" alt="About hero Image">
        <?php endif; ?>
        </div>
        <div class="home-about-section">
            <h2><?php echo get_theme_mod('about_section_title', 'Sky’s the limit'); ?></h2>
            <p><?php echo get_theme_mod('about_section_description', 'Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution. '); ?></p>
    </div>
    </div>
</div>