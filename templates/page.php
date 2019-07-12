<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('/template-parts/banners/banner', 'image'); ?>

        <section class="container py-6">
            
            <div class="row">

                <aside class="col-lg-4 px-xl-5 col-12 mb-5 mb-lg-0">
                    <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
                </aside>

                <main class="col-lg-8 col-xs-12">
                    <?php the_content(); ?>   
                </main>
                
            </div>

        </section>

    <?php endwhile; ?>
<?php else: ?>

        <h2>Извините по вашему запросу ничего не найдено</h2>

<?php endif; ?>

<?php get_footer(); ?>