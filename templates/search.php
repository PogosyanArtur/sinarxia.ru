
<?php
/* 
    **************************************************
    Pagination arguments
    **************************************************
*/
    $pagination_args = array(
        'show_all'              => false,
        'end_size'              => 1,
        'mid_size'              => 1,
        'prev_next'             => True,
        'prev_text'             => __('« Назад'),
        'next_text'             => __('Вперед »'),
        'type'                  => 'list',
        'add_fragment'          => '',
        'screen_reader_text'    => ' ',
    )
;?>



<?php get_header(); ?>
    <main class="container py-6 container-full-height">

        <!-- Start heading -->

        <h1 class="h3">
            Результат поиска:
            <span class="text-accent-dark"><?php echo get_search_query() ;?></span>
        </h1>
    
        <!-- End heading -->

        <!-- Start search content -->

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts()) : the_post(); ?>

                <div class='border border-primary-main p-3 my-3 rounded'>                
                    <h2 class='h4'> <a class='text-warning-dark' href='<?php the_permalink() ;?>'> <?php the_title() ;?> </a></h2>
                    <p><?php the_excerpt() ;?></p>
                    <div>Дата добавления: <?php the_date() ;?> </div>   
                </div>

            <?php endwhile; ?>
        <?php else : ?>

            <p class="lead">Извините по Вашему результату ничего не найдено</p>

        <?php endif ;?>

        <!-- End search content -->

        <!-- Start pagination -->

            <nav aria-label="Page navigation" class="mt-3">
                    <?php the_posts_pagination( $pagination_args ) ;?>
            </nav>

         <!-- End pagination -->
    </main>


<?php get_footer(); ?>


