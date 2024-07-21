<div class="contact-head">
    <div class="contact-details">
        <div class="contact-item">
            <h3>Location</h3>
            <p><?php echo wp_kses_post(get_theme_mod('location1', __('242 Rue du Faubourg Saint-Antoine, 75012 Paris FRANCE', 'mytheme'))); ?></p>
            <p><?php echo wp_kses_post(get_theme_mod('location2', __('75012 Paris FRANCE', 'mytheme'))); ?></p>
        </div>
        <div class="contact-item">
            <h3><?php echo wp_kses_post(get_theme_mod('manager_name', '')); ?></h3>
            <p><?php echo wp_kses_post(get_theme_mod('manager_phone', '')); ?></p>
            <p><a href="mailto:<?php echo antispambot(get_theme_mod('manager_email', '')); ?>"><?php echo antispambot(get_theme_mod('manager_email', '')); ?></a></p>
        </div>
        <div class="contact-item">
            <h3><?php echo wp_kses_post(get_theme_mod('ceo_name', '')); ?></h3>
            <p><?php echo wp_kses_post(get_theme_mod('ceo_phone', '')); ?></p>
            <p><a href="mailto:<?php echo antispambot(get_theme_mod('ceo_email', '')); ?>"><?php echo antispambot(get_theme_mod('ceo_email', '')); ?></a></p>
        </div>
    </div>
    <div class="contact-image">
        <?php if (get_theme_mod('contact_image')) : ?>
            <img src="<?php echo esc_url(get_theme_mod('contact_image')); ?>" alt="<?php _e('Contact Image', 'mytheme'); ?>">
        <?php endif; ?>
    </div>
</div>
