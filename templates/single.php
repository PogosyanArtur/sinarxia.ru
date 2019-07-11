<?php get_header(); ?>

<?php 
    $products_info = get_field( 'products_info' );
    $short_description = get_field( 'short_description' );

    $imageID = get_field('image');
    $old_price = get_field('old_price');
    $new_price = get_field('new_price');
    $unit = get_field('unit');
    $size = 'large';
    $alt = get_post_meta($imageID, '_wp_attachment_image_alt', true);

?>
<section class="container">
    <div class="row my-4">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
            <main class="col-12 col-lg-8">
                <div class="pt-3 text-muted font-italic"><?php esc_html_e( $short_description, 'sinarxia') ;?></div>
                <hr>
                <h1 class="pb-3 text-primary-main"><?php the_title() ;?></h1>
                <img class="img-fluid pb-3" src="<?php echo wp_get_attachment_image_url($imageID , $size) ?>" alt="<?php esc_attr_e( $alt ); ?>"/>

                <aside class="d-lg-none col-12">
                    <div class="">             
                        <p class="border  text-accent-main m-0 p-4 font-weight-bold rounded-top h5 text-center">
                            Цена 
                            <del class="text-common-500 font-weight-normal"><?php if( $old_price )(esc_html_e( $old_price )) ;?></del> 
                            <?php esc_html_e( $new_price ) ;?> руб./<?php esc_html_e( $unit ) ;?>
                        </p>
                        <p class="bg-primary-main rounded-bottom text-common-white font-italic text-center m-0 p-2"> в том числе НДС 20% </p>
                    </div>
                    <div class="my-4">
                        <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
                    </div>
                </aside>
                <?php if($products_info): ;?>
                    <ul class="nav bg-primary-main rounded" id="singlePageTab" role="tablist">
                    
                        <?php foreach( $products_info as $index => $info ): ;?>
                            <li class="nav-item">
                                <a class="nav-link singlePageTab" data-toggle="tab" href="#tub<?php echo $index?>" role="tab" aria-controls="home" aria-selected="true">
                                    <?php esc_html_e( $info[ 'acf_fc_layout' ], 'sinarxia' ) ;?>
                                </a>
                            </li>
                        <?php endforeach ;?>


                    </ul>
                    <div class="tab-content " id="singlePageTabContent">
                        <?php foreach( $products_info as $index => $info ): ;?>

                            <?php if( is_array( $info[ 'content' ] ) ): ?>

                                <div class="tab-pane fade p-3" id="tub<?php echo $index ?>" role="tabpanel" aria-labelledby="home-tab">
                                    
                                    <table class="table w-100 table-striped">
                                        <thead>
                                            <tr class="text-accent-main">
                                                <th scope="col" class="w-75">Наименование материала</th>
                                                <th scope="col" class="w-25 text-center">Cодержание</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach( $info[ 'content' ] as $item): ?>
                                                <tr>
                                                    <td class="w-75"><?php esc_html_e($item[ 'name' ]) ;?></td>
                                                    <td class="w-25 text-center"><?php esc_html_e($item[ 'value' ]) ;?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>

                            <?php else: ?>

                                <div class="tab-pane fade p-3" id="tub<?php echo $index ?>" role="tabpanel" aria-labelledby="home-tab">
                                    <?php echo $info[ 'content' ] ;?>
                                </div>

                            <?php endif ;?>

                        <?php endforeach ;?>
                    </div>              
                <?php endif; ?>

            </main>
            <aside class="col-12 col-lg-4 d-none d-lg-block">
                <div class="">             
                    <p class="border  text-accent-main m-0 p-4 font-weight-bold rounded-top h5 text-center">
                        Цена 
                        <del class="text-common-500 font-weight-normal"><?php if( $old_price )(esc_html_e( $old_price )) ;?></del> 
                        <?php esc_html_e( $new_price ) ;?> руб./<?php esc_html_e( $unit ) ;?>
                    </p>
                    <p class="bg-primary-main rounded-bottom text-common-white font-italic text-center m-0 p-2"> в том числе НДС 20% </p>
                </div>
                <div class="my-4">
                    <?php get_template_part('/template-parts/sidebar/sidebar', 'contacts'); ?>
                </div>
            </aside>

        <?php endwhile; else: ?>
            <p>Извините по вашему запросу ничего не найдено</p>
        <?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>