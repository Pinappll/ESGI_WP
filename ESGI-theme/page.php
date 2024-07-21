<?php get_header() ?>

<main id="site-main">
    <div class="container">
        <?php get_template_part('template-parts/home-section') ?>   
        <?php get_template_part('template-parts/about-section') ?>   
        <?php get_template_part('template-parts/service-section') ?>
        
        <div class="partners-page">
            <section class="partners-hero">
                <?php get_template_part('template-parts/partners-section') ?>
            </section>
        </div>

    </div>
</main>

<?php get_footer() ?>