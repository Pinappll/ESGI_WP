<div class="team-section">
    <h2><?php echo get_theme_mod('team_section_title', 'Our Team'); ?></h2>
    <div class="team-members">
        <?php for ($i = 1; $i <= 4; $i++) :
            $photo = get_theme_mod("team_member_photo_$i");
            $position = get_theme_mod("team_member_position_$i");
            $phone = get_theme_mod("team_member_phone_$i");
            $email = get_theme_mod("team_member_email_$i");
            if ($name && $photo) : ?>
                <div class="team-member">
                    <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($name); ?>">
                    <p><?php echo esc_html($position); ?></p>
                    <p><?php echo esc_html($phone); ?></p>
                    <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                </div>
            <?php endif;
        endfor; ?>
    </div>
</div>
