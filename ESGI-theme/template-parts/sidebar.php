<aside class="sidebar">
    <?php get_search_form(); ?>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Recent Posts'); ?></h2>
        <?php
        // Requête personnalisée pour les articles récents
        $recent_posts_query = new WP_Query(array(
            'posts_per_page' => 5, // Nombre d'articles à afficher
            'post_status'    => 'publish' // Affiche seulement les articles publiés
        ));
        
        if ($recent_posts_query->have_posts()) :
            echo '<ul>';
            while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            endwhile;
            echo '</ul>';
            wp_reset_postdata(); // Réinitialise la requête principale
        else :
            echo '<p>' . __('No recent posts available.') . '</p>';
        endif;
        ?>
    </div>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Archives'); ?></h2>
        <?php wp_get_archives(array('type' => 'monthly', 'limit' => 12)); ?>
    </div>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Categories'); ?></h2>
        <?php wp_list_categories(array('title_li' => '')); ?>
    </div>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Tags'); ?></h2>
        <div class="tag-links">
            <?php wp_tag_cloud(); ?>
        </div>
    </div>
</aside>
