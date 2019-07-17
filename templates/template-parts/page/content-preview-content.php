<div class="tab-content">
    

    <?php 

    ;?>

    <?php foreach ( $categories as $category) : ?>
        <?php
        switch( $category->taxonomy ) {
            case 'rent_category' :
                $post_type = 'rent';
                break;
            case 'service_category' :
                $post_type = 'service';
                break;
            default:
                $post_type = 'post';
        } 
        $posts = get_posts( array(
            'post_type'       => $post_type,
            'posts_per_page'  => get_option( 'posts_per_page' ),
            'orderby'         => 'rand',
            'suppress_filters'=> true,
            'tax_query'       => array(
                array(
                    'taxonomy' => $category->taxonomy,
                    'field'    => 'slug',
                    'terms'    => $category->slug,
                ),
            )
        ));
        ?>

        <div class="tab-pane" id="<?php echo $category->slug ;?>" role="tabpanel" aria-labelledby="home-tab">
            <div class="row mt-4">                               

                <?php  foreach( $posts as $post ) : setup_postdata($post); ?>
                    <div class="col-12 col-lg-4  col-md-6  pb-4">
                        <?php get_template_part('/template-parts/post/content', 'card');?>  
                    </div>     
                <?php  endforeach; wp_reset_postdata(); ?>   

            </div>
            <div class="text-center py-3">
                <a class="btn btn-accent-main text-common-white" href="<?php echo get_category_link( $category->term_id) ;?>">Посмотреть все</a>
            </div>                          
        </div>

    <?php endforeach; ?>
</div>
