<?php 
    $queried_obj = get_queried_object();
    $bg_images = get_field('bg_images','options');
    $category_name = $queried_obj->name;

    foreach($bg_images as $bg_image){

        if( $bg_image['slug'] === $queried_obj->post_name || $bg_image['slug'] === $queried_obj->taxonomy ){
            $bg_image_url = wp_get_attachment_image_src($bg_image['image'], 'full')[0];
        }
    }
    ;
;?>

<section class="w-100 h-250px">
        <div class="w-100 h-100 banner"  style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php esc_attr_e($bg_image_url, 'sinarxia') ?>')">
            <div class="container d-flex flex-column justify-content-end h-100">
                <h1 class="text-white mb-3 w-50" ><?php ($category_name ) ? esc_html_e( $category_name,'sinarxia' ) : the_title(); ?>
                    <hr class="bg-accent-main h-2px "/>
                </h1>
            </div>
        </div>
</section>