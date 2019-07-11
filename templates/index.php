<?php get_header(); ?>

<main class="container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
       <h1><?php the_title(); ?> </h1>
       <div><?php the_content(); ?> </div>       
    <?php endwhile; else: ?>
        <p>Извините по вашему запросу ничего не найдено index.php</p>

    <?php endif; ?>

</main>


<?php get_footer(); ?>