<?php 
    $bg_images = get_field('bg_images');
    $articles = get_field('articles');
?>

<article class="banner py-8"   style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php echo $bg_images[1]['bg_image']; ?>')">
    <div class="container">

        <div class="card bg-primary-light w-100 ">
            <div class="card-body d-flex flex-column justify-content-between align-items-end">
                <div>
                    <h3 class="card-title text-center"><?php echo $articles[2]['article-title']; ?></h3>
                    <p class="card-text text-common-white"><?php  echo $articles[2]['article-content'];?></p>
                </div>
                <br/>
                <a href="<?php echo home_url( '/contacts' ); ?>" class="btn btn-accent-dark">Связаться с нами</a>
            </div>
        </div>

</article>