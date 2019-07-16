<div class="tab-content">


    <?php foreach ( $categories as $category) : ?>
        <?php 
        $posts = get_posts( array(
            'posts_per_page'  => get_option( 'posts_per_page' ),
            'orderby'         => 'rand',
            'tax_query'       => array(
                array(
                    'taxonomy' => 'category',
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
