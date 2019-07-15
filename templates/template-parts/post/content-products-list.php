<?php
    $categories = get_terms( array(
        'taxonomy'      => $product_list_arg['taxonomy'],
        'orderby'       => 'name', 
        'order'         => 'ASC',
        'parent'        => 0,
        'child_of'      => 0, 
        'hide_empty'    => true,
    ) );
?>


<div class="tab-content" id="<?php echo $product_list_arg['taxonomy']; ?>TubContent">

    <?php foreach ( $categories as $category) : ?>
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

        <div class="tab-pane" id="<?php echo $category->slug ;?>" role="tabpanel" aria-labelledby="home-tab">
            <div class="row mt-4">                               

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


        
