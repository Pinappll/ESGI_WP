<div class="team-section">
    <h2><?php echo get_theme_mod('team_section_title', 'Our Team'); ?></h2>
    <div class="team-members">
        <?php for ($i = 1; $i <= 4; $i++) :
            $photo = get_theme_mod("team_member_photo_$i");
            $phone_default = get_template_directory_uri() . "/img/png/". (4+$i).".png";
            $position = get_theme_mod("team_member_position_$i");
            $phone = get_theme_mod("team_member_phone_$i", '+33 1 53 31 25 23');
            $email = get_theme_mod("team_member_email_$i", 'mail@mail.fr');
            if ($name && $photo) : ?>
                <div class="team-member">
                    <?php if ($photo) : ?>
                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr($name); ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url($phone_default); ?>" alt="<?php echo esc_attr($name); ?>">
                    <?php endif; ?>
                    <p><?php echo esc_html($position); ?></p>
                    <p><?php echo esc_html($phone); ?></p>
                    <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                </div>
            <?php endif;
        endfor; ?>
    </div>
</div>
