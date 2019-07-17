<?php
$articles   = get_field('articles');
$bg_images  = get_field('bg_images');
$titles     = get_field('titles');
$bg_images1 = wp_get_attachment_image_url($bg_images[0]['bg_image'],'full');
$bg_images2 = wp_get_attachment_image_url($bg_images[1]['bg_image'],'full');

$title_right_part_1   = $titles[0]['right_part'];
$title_left_part_1    = $titles[0]['left_part'];

$title_right_part_2   = $titles[1]['right_part'];
$title_left_part_2    = $titles[1]['left_part'];

$title_right_part_3   = $titles[2]['right_part'];
$title_left_part_3    = $titles[2]['left_part'];

$products_categories = get_categories( array(
    'taxonomy'     => 'category',
	'type'         => 'post',
	'parent'       => 0,
	'orderby'      => 'name',
	'hide_empty'   => 1,
) );

$service_categories = get_categories( array(
    'taxonomy'     => 'service_category',
	'type'         => 'service',
	'parent'       => 0,
	'orderby'      => 'name',
	'hide_empty'   => 1,
) );

$rent_categories = get_categories( array(
    'taxonomy'     => 'rent_category',
	'type'         => 'rent',
	'parent'       => 0,
	'orderby'      => 'name',
	'hide_empty'   => 1,
) );



;?>

<?php get_header(); ?>

<?php echo do_shortcode('[smartslider3 slider=2]') ;?>

<main class="mb-4">

    <!-- Start first preview -->

    <section>
        <div class="bg-primary-main">
            <div class="container">
                <h2 class="text-center text-white py-3 text-uppercase text-size-6 text-size-md-8 m-0">
                    <?php esc_html_e( $title_left_part_2, 'sinarxia' ) ;?><span class="text-accent-main"> <?php esc_html_e( $title_right_part_2, 'sinarxia' ); ?></span>
                </h2>            
            </div>    
        </div>

    <?php set_query_var('categories', $service_categories) ;?>
    
        <div class="preview">
            <div class="container" id="service_preview_tabs">            
                <?php get_template_part('/template-parts/page/content','preview-tubs') ;?>
            </div> 
        </div>    

        <div class="container">
            <?php get_template_part('/template-parts/page/content','preview-content') ;?>
        </div>
    </section>

    <!-- End first preview -->

    <!-- Start second preview -->

    <section>
        <div class="bg-primary-main">
            <div class="container">
                <h2 class="text-center text-white py-3 text-uppercase text-size-6 text-size-md-8 m-0">
                    <?php esc_html_e( $title_left_part_1, 'sinarxia' ) ;?><span class="text-accent-main"> <?php esc_html_e( $title_right_part_1, 'sinarxia' ); ?></span>
                </h2>            
            </div>    
        </div>

    <?php set_query_var('categories', $products_categories) ;?>
    
        <div class="preview">
            <div class="container" id="products_preview_tabs">            
                <?php get_template_part('/template-parts/page/content','preview-tubs') ;?>
            </div> 
        </div>    

        <div class="container">
            <?php get_template_part('/template-parts/page/content','preview-content') ;?>
        </div>
    </section>

    <!-- End second preview -->

    <!-- Start third preview -->

    <!-- <section>
        <div class="bg-primary-main">
            <div class="container">
                <h2 class="text-center text-white py-3 text-uppercase text-size-6 text-size-md-8 m-0">
                    <?php // esc_html_e( $title_left_part_3, 'sinarxia' ) ;?><span class="text-accent-main"> <?php // esc_html_e( $title_right_part_3, 'sinarxia' ); ?></span>
                </h2>            
            </div>    
        </div>

    <?php // set_query_var('categories', $rent_categories) ;?>
    
        <div class="preview">
            <div class="container" id="rent_preview_tabs">            
                <?php // get_template_part('/template-parts/page/content','preview-tubs') ;?>
            </div> 
        </div>    

        <div class="container">
            <?php // get_template_part('/template-parts/page/content','preview-content') ;?>
        </div>
    </section> -->

    <!-- End third preview -->

   
</main> 

<article class="py-8 banner"  style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php echo $bg_images1 ?>')">
    <div class="container">
        <div class="card-deck">

            <?php foreach( $articles as $index => $article ): ?>
                <?php if( $index < 2 ): ?>
                    <div class='card article-card my-3 my-lg-0 <?php echo ( $index == 0 ) ? 'bg-warning-light' : 'bg-primary-light' ?>'>
                        <?php 
                            set_query_var('article', $article);
                            get_template_part('/template-parts/page/content','article-card');             
                        ?>
                    </div>
               <?php endif ;?>
            <?php endforeach; ?>

        </div>
    </div>
</article>

<?php get_template_part('/template-parts/page/content','advantage') ;?>

<article class="py-8 banner"  style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php echo $bg_images2; ?>')">
    <div class="container">
        <div class="card-deck">

            <?php foreach( $articles as $index => $article ): ?>
                <?php if( $index === 2 ): ?>
                    <div class='card <?php echo ( $index == 0 ) ? 'bg-warning-light' : 'bg-primary-light' ?>'>
                        <?php 
                            set_query_var('article', $article);
                            get_template_part('/template-parts/page/content','article-card');             
                        ?>
                    </div>
               <?php endif ;?>
            <?php endforeach; ?>

        </div>
    </div>
</article>

<?php get_footer(); ?>