<?php get_header(); ?>

<?php get_template_part( 'content', 'part' ) ?>
<?php echo do_shortcode('[smartslider3 slider=2]') ;?>

<main class="mb-4">
    
    <?php 
        $product_list_arg = [
            'post_type' =>'goods',
            'taxonomy' =>'goods_category',
        ];
        set_query_var('product_list_arg', $product_list_arg);
        get_template_part('/template-parts/post/content','products-list');
    ?>
    <?php 
        $product_list_arg = [
            'post_type' =>'service',
            'taxonomy' =>'service_category',
        ];
        set_query_var('product_list_arg', $product_list_arg);
        get_template_part('/template-parts/post/content','products-list');
    ?>
    
</main> 

<?php 
    $articles = get_field('articles');
    $bg_images = get_field('bg_images');
    $bg_images1 = wp_get_attachment_image_src($bg_images[0]['bg_image'],'full')[0];
    $bg_images2 = wp_get_attachment_image_src($bg_images[1]['bg_image'],'full')[0];
?>

<article class="py-8 banner"  style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php echo $bg_images1 ?>')">
    <div class="container">
        <div class="card-deck">

            <?php foreach( $articles as $index=> $article ): ?>
                <?php if( $index < 2 ): ?>
                    <div class='card article-card my-3 m-lg-0 <?php echo ( $index == 0 ) ? 'bg-warning-light' : 'bg-primary-light' ?>'>
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