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

<?php get_template_part('/template-parts/page/content','two-article') ;?>
<?php get_template_part('/template-parts/page/content','advantage') ;?>
<?php get_template_part('/template-parts/page/content','one-article') ;?>

<?php get_footer(); ?>