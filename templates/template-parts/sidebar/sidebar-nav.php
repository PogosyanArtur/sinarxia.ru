<?php 
    $queried_object     = get_queried_object();
    $queried_taxonomy   = $queried_object->taxonomy;
    $queried_taxonomies  = $queried_object->taxonomies;
    $tax =  ($queried_taxonomy) ? : $queried_taxonomies[0];

    $list_categories_args = array(
        'taxonomy'     => $tax, 
        'orderby'      => 'name',  
        'show_count'   => 0,       
        'pad_counts'   => 0,       
        'hierarchical' => 1,       
        'title_li'     => '',
        'hide_empty'   => true     
    );
?>

<nav class="w-100">
    <h3 class="list-group-item bg-primary-main text-white font-weight-bold">Категория</h3>
    <ul class="category-list list-group">
        <?php echo wp_list_categories($list_categories_args) ;?>    
    </ul>
</nav>




