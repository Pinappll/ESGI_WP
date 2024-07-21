<?php
/*
Template Name: Contact
*/
get_header(); ?>
<h1><?php echo get_the_title(); ?></h1>
<div class="">
    <section class="contact-form-section">
        <?php get_template_part('template-parts/contact-form'); ?>
    </section>
</div>

<?php get_footer(); ?>
