<?php
    $wp_nav_menu_xs_args = array(
        'theme_location'  => 'header_menu',
        'container'       => false,
        'menu_class'      => '',
        'fallback_cb'     => '__return_false',
        'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
        'depth'           => 2,
        'walker'        => new Walker_header_navbar_xs() 
        ) ;
?>

<nav class="navbar navbar-expand-lg bg-common-white text-center p-0 py-lg-2 ">
    <div class="collapse navbar-collapse" id="navbarDropdown">
        <?php wp_nav_menu( $wp_nav_menu_xs_args); ?>
    </div>
</nav>