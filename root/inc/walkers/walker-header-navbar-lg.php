<?php
class Walker_header_navbar_lg extends Walker_Nav_Menu {
    
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
    
        // Default class.
        $classes = array( 'dropdown-menu py-3' );    

        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
        $output .= "{$n}{$indent}<ul$class_names aria-labelledby='navbarDropdownMenuLink' >{$n}";
    }

    function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ){
        
        $indent = ($depth) ? str_repeat( "\t", $depth ) : '';
        
        $li_attributes = '';
        $class_names = $value = '';

        // $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'nav-item  dropdown' : 'nav-item' ;
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        if( $depth > 0 && $args->walker->has_children )  {
            $classes[] = 'dropdown-submenu';
        }

        $class_names = join( ' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item , $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . $value . $li_attributes . '>' ;

        

        $linkClass = ( $depth === 0 ) ? 'nav-link navbar_size_md' : 'dropdown-item text-left dropdown-item_view_accent navbar_size_md';
        $linkClass .= ( $args->walker->has_children ) ? ' dropdown-toggle' : '';


        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty( $item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        if( !$args->walker->has_children ) {
            $attributes .=  ! empty( $item->url) ? ' href="' . esc_attr($item->url) . '"': '';
        } else {
            $attributes .= ' href="#"';
        }
        $attributes .= ( $args->walker->has_children ) ? 'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : '';
        $item_output = $args->before;
        $item_output .= '<a class="' . $linkClass . '"' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= ( $depth === 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent</ul>{$n}";
    }


}



