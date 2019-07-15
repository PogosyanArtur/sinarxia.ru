<div class="nav flex-column flex-lg-row text-center" id="preview_tabs" role="tablist">
    <?php foreach ( $categories as $category) : ?>
        <a class=" nav-link preview_tub" data-toggle="tab" href="#<?php echo $category->slug ;?>" role="tab" aria-controls="home" aria-selected="true">
            <?php esc_html_e( $category->name, 'sinarxia' ); ?>
        </a>
    <?php endforeach; ?>
</div>