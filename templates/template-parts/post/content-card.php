<?php 
    $image          = get_field('image');
    $image_url      = wp_get_attachment_image_url($image, 'medium');
    $no_image_url   = get_stylesheet_directory_uri() . '/assets/images/no_image.jpg';
?>

<a class="card" href="<?php echo get_permalink(); ?>">

    <?php if( $image_url ): ;?>
        <div class="card__img" style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('<?php echo $image_url; ?>')"></div>
        <div class="card__img--hover" style="background-image: linear-gradient(to bottom right,rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('<?php echo $image_url; ?>')"></div>
    <?php else: ;?>
        <div class="card__img" style="background-image:url('<?php echo $no_image_url; ?>')"></div>
        <div class="card__img--hover" style="background-image:url('<?php echo $no_image_url; ?>')"></div>  
    <?php endif ;?>

    <div class="card__info d-flex flex-column justify-content-between">

        <div>
            <div class="card__category"> <?php the_field('short_description');?></div>
            <h3 class="card__title"><?php the_title(); ?></h3>
        </div>

        <div>
            <span class="card__price mr-1">Цена</span>
            <?php if(get_field('old_price')): ?>
                <del class="text-common-500"><span class="text-size-4 text-common-500 mr-2"> <?php the_field('old_price')?> руб./<?php the_field('unit');?></span></del>
            <?php endif; ?>
            <span class="card__price"><?php the_field('new_price')?> руб./<?php the_field('unit');?></span>
        </div>

    </div>
</a> 

