<?php
    $wp_nav_menu_lg_args = [
        'theme_location'  => 'header_menu',
        'container'       => false,
        'items_wrap'      => '<ul class="navbar-nav mr-auto">%3$s</ul>',
        'depth'           => 2,
        'walker'          => new Walker_header_navbar_lg()
    ]
?>

<nav class="navbar navbar-expand-lg navbar-light bg-accent-main text-center p-0 py-lg-2 ">

    <div class="container nav-justified justify-content-space-around" id="navbarSupportedContent">
        <?php wp_nav_menu( $wp_nav_menu_lg_args ); ?>
            <?php get_search_form(); ?>
    </div>

</nav>