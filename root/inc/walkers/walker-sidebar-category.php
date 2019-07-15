<?php
class Walker_sidebar_category extends Walker_Category {


    // Configure the start of each level
    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "";
    }
    
    // Configure the end of each level
    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "";
    }
    
    // Configure the start of each element
    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0) {
        $indent = str_repeat("\t", $depth);
        $queried_obj = get_queried_object();
    
        // Set the category name and slug as a variables for later use
        $cat_name = esc_attr( $category->name );
        $cat_name = apply_filters( 'list_cats', $cat_name, $category );

        if ( $depth === 0 ) {
            $link_active = ( $category->term_id === $args['current_category'] ) ? 'category-list__link_active' : '';    
            $link = '<a class="list-group-item category-list__link ' . $link_active . '"' . 'href="' . esc_url( get_term_link($category) ) . '"' . '>' . $cat_name . '</a>';
            $output .= "\t<li"  . "'>$link\n$indent<ul class='category-list'>\n";
        }
    
        if ( $depth === 1 ) {
            $link_active = ( $category->term_id === $args['current_category'] ) ? 'category-list__link_active' : '';
            $link = '<a class="list-group-item pl-5 category-list__link ' . $link_active . '"' . 'href="' . esc_url( get_term_link($category) ) . '"' . '>' . $cat_name . '</a>';
            $output .= "\t<li"  . "'>$link\n$indent<ul class='category-list'>\n";
        }

        if ( $depth === 2 ) {
            $link_active = ( $category->term_id === $args['current_category'] ) ? 'category-list__link_active' : '';
            $link = '<a class="list-group-item pl-7 category-list__link ' . $link_active . '"' . 'href="' . esc_url( get_term_link($category) ) . '"' . '>' . $cat_name . '</a>';
            $output .= "\t<li>$link\n";
        }
    
    }
    
    // Configure the end of each element
    function end_el(&$output, $page, $depth = 0, $args = array() ) {
        if ( $depth === 0 ) {
            $indent = str_repeat("\t", $depth);
            $output .= "$indent</ul>\n";
        }
        if ( $depth > 0 ) {
            $output .= "</li>";
        }
    
    }
    
}