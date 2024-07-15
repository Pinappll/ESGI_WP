<?php
/* Template Name: Blog Page */
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <header class="page-header">
            <h1 class="page-title">Blog.</h1>
        </header>

        <div class="content-wrapper">
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

            <div class="blog-posts">
                <?php if (have_posts()) : ?>
                    <div class="posts-grid">
                        <?php
                        while (have_posts()) :
                            the_post(); ?>
                            <div class="post-item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium'); ?>
                                    <?php endif; ?>
                                    <h2 class="post-title"><?php the_title(); ?></h2>
                                    <div class="post-excerpt"><?php the_excerpt(); ?></div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => __('« Previous'),
                            'next_text' => __('Next »'),
                        ));
                        ?>
                    </div>

                <?php else : ?>
                    <p><?php _e('No posts found.'); ?></p>
                <?php endif; ?>
            </div>
        </div>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
