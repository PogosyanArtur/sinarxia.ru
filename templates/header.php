<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" />
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(54391741, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/54391741" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
<!-- /Yandex.Metrika counter -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php wp_head(); ?>
    <title>Document</title>
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
   

  

    
