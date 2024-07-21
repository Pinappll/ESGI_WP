<?php
/*
Template Name: Partners
*/
get_header(); ?>
<h1><?php echo get_the_title(); ?></h1>
<div class="partners-page">
    <section class="partners-hero">
        <?php get_template_part('template-parts/partners-section'); ?>
    </section>
</div>

<?php get_footer(); ?>