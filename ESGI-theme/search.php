<?php get_header(); ?>

<div class="search-results-container">
    <div class="content-area">
        <main class="site-main">
            <header class="page-header">
                <h1 class="page-title">
                    <?php printf( esc_html__( 'Search results for: %s', 'textdomain' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
            </header><!-- .page-header -->

            <?php if ( have_posts() ) : ?>
                <div class="search-results-grid">
                    <?php
                    // Start the Loop.
                    while ( have_posts() ) :
                        the_post();

                        // Include the template for the content.
                        get_template_part( 'template-parts/content', 'search' );

                    endwhile;
                    ?>
                </div><!-- .search-results-grid -->

                <?php
                // Display navigation to next/previous pages when applicable.
                the_posts_navigation();

            else :
                // If no content, include the "No posts found" template.
                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </main><!-- .site-main -->
    </div><!-- .content-area -->
</div><!-- .search-results-container -->

<?php get_footer(); ?>
