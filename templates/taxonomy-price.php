<?php 
$queried_object     = get_queried_object();
$queried_taxonomy   = $queried_object->taxonomy;
$queried_term_id    = $queried_object->term_id;
$big                = 999999999;

/* 
    **************************************************
    Wp Query 
    **************************************************
*/ 

if( taxonomy_exists( $queried_taxonomy ) ){

    $the_query = new WP_Query([
        'post_type'       => get_post_type(),
        'posts_per_page'  => 30,
        'paged'           => get_query_var('paged') ? : 1,
        'orderby'         => 'title',
        'order'           => 'ASC ',
        'tax_query'       => [
            [
                'taxonomy' => $queried_taxonomy,
                'field'    => 'term_id',
                'terms'    => $queried_term_id,
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

/* 
    **************************************************
    Pagination arguments
    **************************************************
*/

$pagination_args = array(
    'base'          => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format'        => '?paged=%#%',
    'current'       => max( 1, get_query_var( 'paged' ) ),
    'total'         => $the_query->max_num_pages,
    'show_all'      => false,
    'end_size'      => 1,
    'mid_size'      => 1,
    'prev_next'     => True,
    'prev_text'     => __( '« Назад' ),
    'next_text'     => __( 'Вперед »' ),
    'type'          => 'list',
    'add_args'      => False,
);  

?>

<?php get_header(); ?>

<?php get_template_part('/template-parts/banners/banner', 'image'); ?>

<section class="container py-6">
    <div class="row">

        <!-- Start sidebar -->

        <aside class="col-lg-4 ">

            <?php get_template_part('/template-parts/sidebar/sidebar', 'nav'); ?>

            <div class="pt-4 d-none d-lg-block">
                <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
            </div>

        </aside>

        <!-- End sidebar -->

        <!-- Start main content -->

        <main class="col-lg-8 mt-4 mt-lg-0">
            <table class="table table-hover">
                <thead class="">
                    <tr class="bg-primary-main text-common-white">
                        <th scope="col">№</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Цена</th>
                    </tr>
                </thead>
                <tbody class="table-hover">
                    <?php if( $the_query->have_posts() ) :
                        foreach( $the_query->posts as $index => $post ):?>

                        <tr>
                            <th scope="row"><?php echo $index + 1 ;?></th>
                            <td>
                                <a class="text-primary-dark" href="<?php echo get_permalink(); ?>">
                                    <div class="text-size-4"><?php the_title() ;?></div>                                
                                </a>
                                <div class="text-size-3 text-common-500 font-italic"><?php the_field('short_description') ;?></div>
                            </td>
                            <td class="text-primary-dark "><?php the_field('new_price')?> руб./<?php the_field('unit');?></td>
                        </tr>

                        <?php endforeach; wp_reset_postdata(); ?>
                    <?php endif; ?>

                </tbody>
            </table>



            <!-- Start pagination -->

            <nav aria-label="Page navigation" class="mt-3">
                <?php echo paginate_links( $pagination_args ) ;?>
            </nav>

            <!-- End pagination -->

        </main>

        <!-- End main content -->

    </div>

</section>


<?php get_footer(); ?>