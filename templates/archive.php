<?php get_header(); ?>

<?php get_template_part('/template-parts/banners/banner', 'image'); ?>

<section class="container py-6">
    <div class="row">

        <aside class="col-lg-4 ">
            <?php get_template_part('/template-parts/sidebar/sidebar', 'nav'); ?>
            <div class="pt-4 d-none d-lg-block">
                <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
            </div>
        </aside>

        <main class="col-lg-8 ">
            <div class="row">
                <?php 
                    $queried_object = get_queried_object();

                    if( taxonomy_exists( $queried_object->taxonomy ) ){

                        $the_query = new WP_Query([
                            'post_type'       => get_post_type(),
                            'posts_per_page'  => get_option( 'posts_per_page' ),
                            'paged'           => get_query_var('paged') ? : 1,
                            'orderby'         => 'rand',
                            'tax_query'       => [
                                [
                                    'taxonomy' => $queried_object->taxonomy,
                                    'field'    => 'term_id',
                                    'terms'    => $queried_object->term_id,
                                ],
                            ]
                        ]);
                   } else {
                        $the_query = new WP_Query([
                            'post_type'       => $post_type,
                            'posts_per_page'  => get_option( 'posts_per_page' ),
                            'paged'           => get_query_var('paged') ? : 1,
                            'orderby'         => 'rand',
                        ]);
                   }                   
                ?>
                <?php if( $the_query->have_posts() ) : 
                        while( $the_query->have_posts() ) :
                            $the_query->the_post();
                ?>
                    <div class="col-12 col-md-6 mt-4 mt-lg-0 pb-4">

                      <?php get_template_part( '/template-parts/post/content', 'card' ) ;?>

                    </div>

                    <?php endwhile; wp_reset_postdata();

                endif; ?>
            </div>

            <nav aria-label="Page navigation" class="mt-3">
                <?php 
                    $big = 999999999;

                    $args = array(
                        'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        'format'  => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'total'   => $the_query->max_num_pages,
                        'show_all'     => false,
                        'end_size'     => 1,
                        'mid_size'     => 1,
                        'prev_next'    => True,
                        'prev_text'    => __('« Назад'),
                        'next_text'    => __('Вперед »'),
                        'type'         => 'list',
                        'add_args'     => False,
                    );                     
                    echo paginate_links( $args );
                ?>
            </nav>

        </main>

    </div>
</section>


<?php get_footer(); ?>