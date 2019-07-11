<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('/template-parts/banners/banner', 'image'); ?>

    <section class="container py-6">

        <main>
            <?php the_content(); ?>   
        </main>

    </section>

<?php endwhile; else: ?>
        <p>Извините по вашему запросу ничего не найдено</p>
<?php endif; ?>

<?php get_footer(); ?>