
<?php 
$products_info       = get_field( 'products_info' );
$short_description   = get_field( 'short_description' );
$imageID             = get_field( 'image' );
$alt                 = get_post_meta($imageID, '_wp_attachment_image_alt', true);
$image_url           = wp_get_attachment_image_url( $imageID , 'large' );

$sidebar_price_var_object = [
    'old_price' => get_field( 'old_price' ),
    'new_price' => get_field( 'new_price' ),
    'unit'      => get_field( 'unit' ),
];

set_query_var('sidebar_price_var_object', $sidebar_price_var_object);

?>
<?php get_header(); ?>

<section class="container">
    <div class="row my-4">

        <!-- Start main content -->

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post();?>
            
                <main class="col-12 col-lg-8">

                    <div class="pt-3 text-muted font-italic"><?php esc_html_e( $short_description, 'sinarxia') ;?></div>
                    <hr>
                    <h1 class="pb-3 text-primary-main"><?php the_title() ;?></h1>
                    <img class="img-fluid pb-3" src="<?php echo $image_url ;?>" alt="<?php esc_attr_e( $alt ) ;?>"/>

                    <!-- Start mobile and tablet aside -->

                    <aside class="d-lg-none col-12">
                        <?php get_template_part('/template-parts/sidebar/sidebar', 'price'); ?>
                        <div class="my-4">
                            <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
                        </div>
                    </aside>

                    <!-- End mobile and tablet aside -->

                    <!-- Start content -->

                    <?php if($products_info): ;?>

                        <!-- Start navigation tubs  -->

                        <ul class="nav bg-primary-main rounded" id="singlePageTab" role="tablist">
                            <?php foreach( $products_info as $index => $info ): ?>
                                <li class="nav-item">
                                    <a class="nav-link singlePageTab" data-toggle="tab" href="#tub<?php echo $index?>" role="tab" aria-controls="home" aria-selected="true">
                                        <?php esc_html_e( $info[ 'tub' ], 'sinarxia' ) ;?>
                                    </a>
                                </li>
                            <?php endforeach ;?>
                        </ul>

                        <!-- End navigation tubs  -->

                        <!-- Start navigation tubs content  -->

                        <div class="tab-content " id="singlePageTabContent">
                            <?php foreach( $products_info as $index => $info ) : ?>

                                <?php if( $info['acf_fc_layout'] === 'table2' ) : ?>

                                    <div class="tab-pane fade p-3" id="tub<?php esc_attr_e( $index )  ?>" role="tabpanel" aria-labelledby="home-tab">                                        
                                        <table class="table w-100 table-striped">
                                            <thead>
                                                <tr class="text-accent-main">
                                                    <th scope="col" class="w-75"><?php esc_html_e( $info['name_column1'], 'sinarxia' );?></th>
                                                    <th scope="col" class="w-25 text-center"><?php esc_html_e( $info['name_column2'], 'sinarxia' ) ;?></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach( $info[ 'table' ] as $item): ?>
                                                    <tr>
                                                        <td class="w-75"><?php esc_html_e( $item['value_column1'], 'sinarxia') ;?></td>
                                                        <td class="w-25 text-center"><?php esc_html_e( $item['value_column2'], 'sinarxia') ;?></td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>

                                <?php else: ?>

                                    <div class="tab-pane fade p-3" id="tub<?php esc_attr_e( $index ) ;?>" role="tabpanel" aria-labelledby="home-tab">
                                        <?php echo $info['content'] ;?>
                                    </div>

                                <?php endif ;?>

                            <?php endforeach ;?>
                        </div>
                        
                        <!-- End navigation tubs content  -->

                    <?php endif; ?>

                     <!-- End content -->

                </main>
            <?php endwhile; ?>

        <?php else: ?>
            <p>Извините по вашему запросу ничего не найдено</p>
        <?php endif; ?>

        <!-- End main content -->

        <!-- Start desktop aside -->

        <aside class="col-12 col-lg-4 d-none d-lg-block">
            <?php get_template_part('/template-parts/sidebar/sidebar', 'price'); ?>
            <div class="my-4">
                <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
            </div>
        </aside>

        <!-- End desktop aside -->

    </div>
</section>


<?php get_footer(); ?>