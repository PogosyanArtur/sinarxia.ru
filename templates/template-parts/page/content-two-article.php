<?php 

    $articles = get_field('articles');
    $bg_images = get_field('bg_images');

?>

<article class="py-8 banner"  style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('<?php echo $bg_images[0]['bg_image']; ?>')">
    <div class="container">
        <div class="card-deck">

            <?php $i=0; foreach( $articles as $article ): ?>

                <div class='card <?php echo ( $i == 0 ) ? 'bg-warning-light' : 'bg-primary-light' ?>'>
                    <div class="card-body d-flex flex-column justify-content-between align-items-end">
                        <div>
                            <h3 class="card-title text-center"><?php echo $article['article-title']; ?></h3>
                            <p class="card-text text-common-white"><?php  echo $article['article-content'];?></p>
                        </div>
                        <br/>
                        <a href="<?php echo home_url( '/contacts' ); ?>" class="btn btn-accent-dark">Связаться с нами</a>
                    </div>
                </div>

                <?php if($i==1)break; $i++; ?>     

            <?php endforeach; ?>

        </div>
    </div>
</article>