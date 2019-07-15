<?php 
    $image     = get_field('logo','options');
    $contacts  = get_field('contacts','options');
    $size      = 'medium'; // (thumbnail, medium, large, full or simple size)
    $alt       = get_post_meta($image, '_wp_attachment_image_alt', true);

    $telephone_name     = $contacts['telephone']['name'];
    $telephone_link     = $contacts['telephone']['link'];
    $telephone_icon     = $contacts['telephone']['icon'];
    $telephone_title    = $contacts['telephone']['title'];

    $mail_name  = $contacts['mail']['name'];
    $mail_link  = $contacts['mail']['link'];
    $mail_icon  = $contacts['mail']['icon'];
    $mail_title = $contacts['mail']['title'];

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
                        <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $mail_icon ); ?>"></use>
                    </svg>
                </div>
                <div class="ml-3 text-white small">
                    <div class="text-accent-main h6 text-uppercase"><?php esc_html_e( $mail_title ) ;?> </div>
                    <a class="text-white h6" href="mailto:<?php esc_attr_e( $mail_link ); ?>"><?php esc_html_e( $mail_name ) ; ?></a>
                </div>
            </div>

            <div class="d-none d-lg-flex align-items-center mx-3 p-1">
                <div class="icon__box p-2">
                    <svg class="text-accent-main" width="30" height="30">
                        <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $telephone_icon ); ?>"></use>
                    </svg>
                </div>
                <div class="ml-3 text-white small">
                    <div class="text-accent-main h6 text-uppercase"><?php esc_html_e( $telephone_title )   ;?></div>
                    <a class="text-white h6" href="tel:<?php esc_attr_e( $telephone_link )  ; ?>"><?php esc_html_e( $telephone_name )  ;?></a>
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