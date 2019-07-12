<section class="container my-6">
    <h2 class="my-5 h2 text-center text-primary-main"> Наши преимущества</h2>
    <div class="row">
        <?php if( have_rows('our_advantages') ) : while( have_rows('our_advantages') ): the_row();         
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');           
        ?>
            <div class="col-12 col-md-6 col-lg-3 my-2">
                <div class="d-flex align-items-center">
                    <div class="mr-4 ">
                        <svg class="text-accent-main w-80px h-80px">
                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $icon ); ?>"></use>
                        </svg>
                    </div>
                    <p class="h6"><?php echo $title; ?> </p>
                </div>
            </div>
        <?php endwhile; ?>
	
        <?php endif; ?>
    </div> 
</section>