<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" />
        <meta name="yandex-verification" content="8235b6e2ebc17a4d" />

        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <?php wp_head(); ?>
    </head>

    <body>
        <header class="sticky-top">
            
            <?php get_template_part('/template-parts/header/header', 'top-line'); ?>

            <div class="d-block d-lg-none">
                <?php get_template_part('/template-parts/header/header', 'navigation-xs'); ?>
            </div>

            <?php get_template_part('/template-parts/header/header', 'body'); ?>
            
            <div class="bg-white">
                <div class="container d-lg-none">
                    <div class="collapse" id="navbar_search_form">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block">
                <?php get_template_part('/template-parts/header/header', 'navigation-lg'); ?>
            </div>
            
        </header>
    

  

    
