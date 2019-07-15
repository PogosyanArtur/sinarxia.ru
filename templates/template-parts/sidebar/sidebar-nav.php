<?php 
    $queried_object     = get_queried_object();

    $list_categories_args = array(
        'orderby'      => 'name',
        'hierarchical' => 1,       
        'title_li'     => '',
        'hide_empty'   => true,
        'walker'       => new Walker_sidebar_category,
    );
?>

<nav class="w-100">
    <h3 class="list-group-item bg-primary-main text-white font-weight-bold">Категория</h3>
    <ul class="category-list list-group">
        <?php echo wp_list_categories($list_categories_args) ;?>    
    </ul>
</nav>




