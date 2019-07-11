
<?php 
    $contacts = get_field( 'contacts', "option" );
?>

   <div class="bg-primary-main">
        <div class="container border-bottom border-light">            
            <ul class="nav justify-content-end">

                <li class="nav-item  d-none d-sm-block d-lg-none">
                    <a class="nav-link small text-common-white" role="button" href="mailto:<?php echo $contacts['mail']['link']; ?>">
                        <svg class="mr-2" width="24" height="24">
                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $contacts['mail']['icon'] ); ?>"></use>
                        </svg><?php echo $contacts['mail']['name']; ?>
                    </a>
                </li>

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link small text-common-white" href="tel:<?php echo $contacts['telephone']['link']; ?>">
                        <svg class="mr-2" width="24" height="24">
                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $contacts['telephone']['icon'] ); ?>"></use>
                        </svg><?php echo $contacts['telephone']['name']; ?>
                    </a>
                </li>

                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link text-common-white small" href="tel:<?php echo $contacts['address']['link']; ?>">
                        <svg class="mr-2" width="24" height="24">
                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $contacts['address']['icon'] ); ?>"></use>
                        </svg><?php echo $contacts['address']['name']; ?>
                    </a>
                </li>

                <li class="nav-item d-none d-lg-block">
                    <span class="nav-link text-common-white small">
                        <svg class="mr-2" width="24" height="24" style="transform:rotate(90deg);">
                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#time' ); ?>"></use>
                        </svg><?php the_field('global_contacts_time_to_work','option'); ?>
                    </span>
                </li>

            </ul>
        </div>
    </div>