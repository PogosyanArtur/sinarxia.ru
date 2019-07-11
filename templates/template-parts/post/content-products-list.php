<?php
    $goods_categories = get_terms( array(
        'taxonomy'      => $product_list_arg['taxonomy'],
        'orderby'       => 'name', 
        'order'         => 'ASC',
        'parent'        => 0,
        'child_of'      => 0, 
        'hide_empty'    => true,
    ) );

    $titles = get_field('titles');
        switch($product_list_arg['taxonomy']){
            case 'goods_category':
                $title_right_part = $titles[0]['right_part'];
                $title_left_part = $titles[0]['left_part'];
                break;
            case 'service_category':
                $title_right_part = $titles[1]['right_part'];
                $title_left_part = $titles[1]['left_part'];
                break;
            default:
                $title_right_part = '';
                $title_left_part = '';
        }
?>

    <div class="bg-primary-main">
        <div class="container">

            <!-- Title -->
            <h2 class="text-center text-white py-4 text-uppercase text-size-6 text-size-md-8">
                <?php echo $title_left_part; ?><span class="text-accent-main"> <?php echo $title_right_part; ?></span>
            </h2>

           <!-- Navigation tabs -->
            <div class="nav nav-tabs d-none d-lg-flex productsTub" id="<?php echo $product_list_arg['taxonomy']; ?>Tub" role="tablist">

                <?php foreach ( $goods_categories as $category) : ?>
                    <a class="nav-link text-accent-main" id="home-tab" data-toggle="tab" href="#<?php echo $category->slug ?>" role="tab" aria-controls="home" aria-selected="true">
                        <?php echo $category->name; ?>
                    </a>
                 <?php endforeach; ?>

            </div>

        </div>    
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-md-4 col-lg-12">

                <!-- Navigation tabs -->
                <div class="nav flex-column d-lg-none productsTub" id="<?php echo $product_list_arg['taxonomy']; ?>Tub" role="tablist">

                    <?php foreach ( $goods_categories as $category) : ?>
                        <a class="btn btn-primary-main my-1" id="home-tab" data-toggle="tab" href="#<?php echo $category->slug ?>" role="tab" aria-controls="home" aria-selected="true">
                            <?php echo $category->name ?>
                        </a>
                    <?php endforeach; ?>

                </div>

            </div>

            <div class="col-12 col-md-8 col-lg-12">
                <div class="tab-content " id="<?php echo $product_list_arg['taxonomy']; ?>TubContent">

                <!-- Navigation tab content -->
                    <?php foreach ( $goods_categories as $category) : ?>

                        <div class="tab-pane" id="<?php echo $category->slug ;?>" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mt-4">                               
                                <?php 
                                    $posts = get_posts( array(
                                        'post_type'       => $product_list_arg['post_type'],
                                        'posts_per_page'  => get_option( 'posts_per_page' ),
                                        'orderby'         => 'rand',
                                        'tax_query'       => array(
                                            array(
                                                'taxonomy' => $product_list_arg['taxonomy'],
                                                'field'    => 'slug',
                                                'terms'    => $category->slug,
                                            ),
                                        )
                                    ));
                                ?>
                                <?php  foreach( $posts as $post ) : setup_postdata($post); ?>
                                    <div class="col-12 col-lg-4 pb-4">
                                        <?php get_template_part('/template-parts/post/content', 'card');?>  
                                    </div>     
                                <?php  endforeach; wp_reset_postdata(); ?>                                 
                            </div>

                        </div>
                    <?php endforeach; ?>
                    <div class="text-center py-3">
                        <a class="btn btn-accent-main text-common-white" href="<?php echo get_post_type_archive_link( $product_list_arg['post_type'] ) ;?>">Посмотреть все</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
