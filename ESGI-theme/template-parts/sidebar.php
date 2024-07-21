<aside class="sidebar">
    <div class="widget">
        <h2 class="widget-title"><?php _e('Search'); ?></h2>
        <?php get_search_form(); ?>
    </div>
    

    <div class="widget">
        <h2 class="widget-title"><?php _e('Recent Posts'); ?></h2>
        <?php echo get_recent_posts_with_images_and_dates(4); ?>
    </div>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Archives'); ?></h2>
        <ul class="list-archive">
            <?php wp_get_archives(array('type' => 'monthly', 'limit' => 12)); ?>
        </ul>
    </div>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Categories'); ?></h2>
        <ul class="list-categorie">
            <?php wp_list_categories(array('title_li' => '')); ?>
        </ul>
    </div>

    <div class="widget">
        <h2 class="widget-title"><?php _e('Tags'); ?></h2>
        <div class="tag-links">
            <?php wp_tag_cloud(); ?>
        </div>
    </div>
</aside>
