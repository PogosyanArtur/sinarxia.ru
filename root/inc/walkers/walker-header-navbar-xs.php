<?php
class Walker_header_navbar_xs extends Walker_Nav_Menu {

/*
    ===============================================================
    Sub menu <ul>
    ===============================================================
*/
    
    function start_lvl( &$output, $depth = 0, $args = [] ){
        $indent = str_repeat( "\t", $depth );
        $sub_menu = ( $args->walker->has_children ) ? 'dropdown-menu text-center ' : '';
        $output .= "\n$indent<ul class=\"$sub_menu depth_$depth \">\n";
    }

/*
    ===============================================================
    Menu Items
    ===============================================================
*/

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
        
    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';

/*
    ===============================================================
    Menu <li>
    ===============================================================
*/
    // li attributes

    $li_attributes = '';
        
    // li class

    // $classes = empty( $item->classes ) ? array() : (array) $item->classes;        
    $classes[] = ( $depth === 0 &&  $args->walker->has_children ) ? ' dropdown' : '';
    $classes[] = ( $depth === 0 ) ? ' nav-item' : '';
    $classes[] = ( $item->current || $item->current_item_anchestor ) ? 'active' : '';


    $li_class_names = '';
    $li_class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $li_class_names = ' class="' . esc_attr( $li_class_names ) . '"';

    // li id

    $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
    
    // add li to output

    $output .= $indent . '<li ' . $id . $li_class_names . $li_attributes . '>';
    
/*
    ===============================================================
    Menu <li>
    ===============================================================
*/

    // a attributes

    $a_attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $a_attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
    $a_attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $a_attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
    
    $a_attributes .= ( $depth === 0 && $args->walker->has_children ) ? implode(' ', array( 
        "data-toggle='dropdown'",
        "aria-haspopup='true'",
        "aria-expanded='false'",
    )) : '';

    // a class
    $a_class_names = '';
    $a_class_names .= ( $depth === 0 && $args->walker->has_children ) ? ' dropdown-toggle ' : '';
    $a_class_names .= ( $depth === 0  ) ? ' nav-link text-accent-main' : 'text-accent-main ';

    
    // link item output

    $item_output = $args->before;
    $item_output= '<a class="' . $a_class_names . '"' . $a_attributes . '>';    
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    
    // add link to output
    $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    
    }
        
}



