<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post() ;?>

        <?php get_template_part('/template-parts/banners/banner', 'image') ;?>

        <section class="container py-6">
            <main>
                <?php the_content() ;?>   
            </main>
        </section>

    <?php endwhile; ?>
<?php else: ?>

        <h2>Извините по вашему запросу ничего не найдено</h2>
        
<?php endif; ?>

<?php get_footer(); ?>