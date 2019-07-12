<?php get_header(); ?>

<main class="container">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post();?>

            <h1><?php the_title(); ?> </h1>
            <div><?php the_content(); ?> </div>    

        <?php endwhile; ?>
    <?php else: ?>

        <h2>Извините по вашему запросу ничего не найдено index.php</h2>

    <?php endif; ?>

</main>


<?php get_footer(); ?>