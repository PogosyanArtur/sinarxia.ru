<?php 
    $queried_object = get_queried_object();

    $tax =  ($queried_object->taxonomy) ? : $queried_object->taxonomies[0];

    $categories = array(
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
        <?php echo wp_list_categories($categories) ;?>    
    </ul>
</nav>




