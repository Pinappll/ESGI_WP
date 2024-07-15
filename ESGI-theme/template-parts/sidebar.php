<aside class="sidebar">
    <?php get_search_form(); ?>
    
    <div class="widget">
        <h2 class="widget-title"><?php _e('Recent Posts'); ?></h2>
        <?php
        $recent_posts = wp_get_recent_posts(array('numberposts' => 5));
        if (!empty($recent_posts)) :
            echo '<ul>';
            foreach ($recent_posts as $post) :
                echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
            endforeach;
            echo '</ul>';
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
        <?php wp_tag_cloud(); ?>
    </div>
</aside>
