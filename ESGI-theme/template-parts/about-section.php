<div class="about-container">
    

    <div class="about-content">
        <div class="about-image">
            <img src="<?php echo esc_url(get_theme_mod('about_image')); ?>" alt="About Image">
        </div>

        <div class="about-details">
            <div class="who-we-are">
                <h3><?php echo get_theme_mod('about_who_we_are_title', 'Who are we?'); ?></h3>
                <p><?php echo get_theme_mod('about_who_we_are_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'); ?></p>
            </div>

            <div class="our-vision">
                <h3><?php echo get_theme_mod('about_our_vision_title', 'Our vision'); ?></h3>
                <p><?php echo get_theme_mod('about_our_vision_text', 'Suspendisse commodo magna orci.'); ?></p>
            </div>

            <div class="our-mission">
                <h3><?php echo get_theme_mod('about_our_mission_title', 'Our mission'); ?></h3>
                <p><?php echo get_theme_mod('about_our_mission_text', 'Aliquam eget consequat libero.'); ?></p>
            </div>
        </div>
    </div>
</div>
