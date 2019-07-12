<?php 
    $image = get_field('logo','options');
    $size = 'medium'; // (thumbnail, medium, large, full or simple size)
    $alt = get_post_meta($image, '_wp_attachment_image_alt', true);
?>



<div class="bg-primary-main navbar navbar-expand-lg navbar-light">
    <div class="container">

        <a class="" href="<?php echo site_url() ?>">        
            <img class="img-fluid w-200px w-lg-250px" src="<?php echo wp_get_attachment_image_url($image , $size) ?>" alt="<?php esc_attr_e( $alt ); ?>"/>
        </a>

        <div class="d-flex justify-content-end ">  

            <div class="d-none d-lg-flex align-items-center ml-2 p-1">
                <div class="icon__box p-2">
                    <svg class="text-accent-main" width="30" height="30">
                        <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#mail' ); ?>"></use>
                    </svg>
                </div>
                <div class="ml-3 text-white small">
                    <div class="text-accent-main h6 text-uppercase">E-mail:</div>
                    <a class="text-white h6" href="mailto:<?php the_field("global_contacts_mail","option"); ?>"><?php the_field("global_contacts_mail","option"); ?></a>
                </div>
            </div>

            <div class="d-none d-lg-flex align-items-center mx-3 p-1">
                <div class="icon__box p-2">
                    <svg class="text-accent-main" width="30" height="30">
                        <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#call' ); ?>"></use>
                    </svg>
                </div>
                <div class="ml-3 text-white small">
                    <div class="text-accent-main h6 text-uppercase">телефон:</div>
                    <a class="text-white h6" href="tel:<?php the_field("global_contacts_telephone_link","option"); ?>"><?php the_field("global_contacts_telephone_caption","option"); ?></a>
                </div>
            </div>

            <button class="btn text-center text-white d-lg-none" type="button" data-toggle="collapse" data-target="#navbar_search_form" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="mr-2" width="24" height="24">
                    <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#search' ); ?>"></use>
                </svg>
            </button>
            
            <button class="navbar-toggler border border-primary-main " type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="" width="30" height="30">
                    <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#menu_bar' ); ?>"></use>
                </svg>
            </button>

        </div>

    </div>       
</div>

