<?php
/* 
    **************************************************
    Menu arguments
    **************************************************
*/
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
    ]
?>  
       
       
       <footer class="bg-primary-dark pt-3 pb-1">
            <div class="container">

                <!-- Start footer content  -->

                <div class="row">

                    <div class="col-12 col-sm-6 col-lg-3 mt-3">
                        <h3 class="h3 text-common-white text-capitalize"><span class="text-accent-main font-weight-bold">S</span>inarxia</h3>
                        <p class="text-common-500 font-italic"><?php the_field("footer_sub_title","option"); ?> </p>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Продукция</h3>
                        <?php wp_nav_menu( $menu_products_args ); ?>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Услуги</h3>
                        <?php wp_nav_menu( $menu_service_args ); ?>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 mt-3">
                        <h3 class="h5 text-common-white text-capitalize">Контакты</h3>
                        <nav class="nav flex-column">
                            <a class="btn btn-link text-left py-1 px-0 text-common-500" href="tel:<?php the_field("global_contacts_telephone_link","option"); ?>">Тел: <?php the_field("global_contacts_telephone_caption","option"); ?></a>
                            <a class="btn btn-link text-left py-1 px-0 text-common-500" href="mailto:<?php the_field("global_contacts_mail","option"); ?>">E-mail: <?php the_field("global_contacts_mail","option"); ?></a>
                            <a class="btn btn-link text-left py-1 px-0 text-common-500" href=" <?php echo home_url( '/contacts' ); ?> "> Адрес: <?php the_field( "global_contacts_adress", "option" ); ?></a>
                        </nav>
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