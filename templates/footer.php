<?php
/* 
    **************************************************
    Menu arguments
    **************************************************
*/

$contacts  = get_field('contacts','options');

$menu_products_args = [
    'theme_location'  => 'footer_menu_products',
    'container'       => false,
    'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>',
    'depth'           => 1,
    'walker'          => new Walker_footer_menu()
];

$menu_service_args = [
    'theme_location'  => 'footer_menu_service',
    'container'       => false,
    'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>',
    'depth'           => 1,
    'walker'          => new Walker_footer_menu()
];

$menu_rent_args = [
    'theme_location'  => 'footer_menu_rent',
    'container'       => false,
    'items_wrap'      => '<ul class="navbar-nav">%3$s</ul>',
    'depth'           => 1,
    'walker'          => new Walker_footer_menu()
];

    $telephone_name     = $contacts['telephone']['name'];
    $telephone_link     = $contacts['telephone']['link'];
    $telephone_icon     = $contacts['telephone']['icon'];
    $telephone_title    = $contacts['telephone']['title'];

    $mail_name  = $contacts['mail']['name'];
    $mail_link  = $contacts['mail']['link'];
    $mail_icon  = $contacts['mail']['icon'];
    $mail_title = $contacts['mail']['title'];

    $address_name  = $contacts['address']['name'];
    $address_link  = $contacts['address']['link'];
    $address_icon  = $contacts['address']['icon'];
    $address_title = $contacts['address']['title'];
?>  
       
       
       <footer class="bg-primary-dark pt-3 pb-1">
            <div class="container">

                <!-- Start footer content  -->

                <div class="row">

                    <div class="col-12 col-md-6  col-lg-3 mt-3">
                        <h3 class="h3 text-common-white text-capitalize"><span class="text-accent-main font-weight-bold">S</span>inarxia</h3>
                        <p class="text-common-500 font-italic"><?php the_field("footer_sub_title","option"); ?> </p>
                    </div>

                    <div class="col-12 col-md-6 offset-lg-6 col-lg-3 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Контакты</h3>
                        <nav class="nav flex-column">
                            <a class="btn btn-link text-left py-1 px-0 text-common-500" href="tel:<?php echo $telephone_link; ?>"><?php echo $telephone_title ;?> <?php echo $telephone_name ; ?></a>
                            <a class="btn btn-link text-left py-1 px-0 text-common-500" href="mailto:<?php echo $mail_link ;?>"><?php echo $mail_title ;?> <?php echo $mail_name ; ?></a>
                            <a class="btn btn-link text-left py-1 px-0 text-common-500" href=" <?php echo $address_link; ?> "><?php echo $address_title ;?> <?php echo $address_name; ?></a>
                        </nav>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-md-4 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Продукция</h3>
                        <?php wp_nav_menu( $menu_products_args ); ?>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Услуги</h3>
                        <?php wp_nav_menu( $menu_service_args ); ?>
                    </div>

                    <div class="col-12 col-md-4 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Аренда</h3>
                        <?php wp_nav_menu( $menu_rent_args ); ?>
                    </div>

                </div>

                <!-- End footer content  -->
                
                <!-- Start copyright  -->

                <hr class="bg-accent-dark"/>

                <div class="text-center">
                    <p class="text-common-500">Copyright <?php the_field("copyright_footer","option"); ?> </p>
                </div>

                <!-- End copyright  -->

            </div>
        </footer>             
        
        <?php wp_footer();?>    
    </body>
</html>