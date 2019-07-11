<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="w-100 h-250px">
        <div class="w-100 h-100 banner"  style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php the_field('bg_image'); ?>')">
            <div class="container d-flex flex-column justify-content-end h-100">
                <h1 class="text-white mb-3 w-35" ><?php the_title(); ?>
                    <hr class="bg-accent-main h-2px "/>
                </h1>
            </div>
        </div>
    </section>

    <section class="container py-6">

        <?php if ( ! is_page('gallary')  ): ?>
        
            <div class="row">
                <aside class="col-lg-4 px-xl-5 d-none d-lg-block">
                    <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
                </aside>

                <main class="col-lg-8 col-xs-12">
                    <?php the_content(); ?>   
                </main>
            </div>
        <?php else: ?>
            <main>
                <?php the_content(); ?>   
            </main>
        <?php endif; ?>

    </section>

<?php endwhile; else: ?>
        <p>Извините по вашему запросу ничего не найдено</p>
<?php endif; ?>

<?php get_footer(); ?>