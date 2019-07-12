<div class="card-body d-flex flex-column justify-content-between align-items-end">
    <div>
        <h3 class="card-title text-center text-accent-main"><?php esc_html_e( $article['article-title'] ) ;?></h3>
        <p class="card-text text-common-white"><?php  esc_html_e( $article['article-content'] ) ;?></p>
    </div>
    <br/>
    <a href="<?php echo home_url( '/contacts' ); ?>" class="btn btn-accent-dark">Связаться с нами</a>
</div>
