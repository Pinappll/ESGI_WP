<?php
/*
Template Name: Services
*/
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
            <h1 class="entry-title"><?php the_content(); ?></h1>
            </div>
        </article>
    <?php endwhile; endif; ?>
        <?php get_template_part('template-parts/service-section'); ?>
    </main>
</div>
<?php get_footer(); ?>