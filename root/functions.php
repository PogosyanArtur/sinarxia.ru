<?php
/*
	===============================================================
	Debug functions
	===============================================================
*/

function pr($var) {
    static $int=0;
    echo '<pre><b style="background: red;padding: 1px 5px;">'.$int.'</b> ';
    print_r($var);
    echo '</pre>';
    $int++;
}

function prv($var) {
    static $int=0;
    echo '<pre><b style="background: blue;padding: 1px 5px;">'.$int.'</b> ';
    var_dump($var);
    echo '</pre>';
    $int++;
}



/*
	===============================================================
	Add options page in admin panel
	===============================================================
*/

if( function_exists( 'acf_add_options_page' ) ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'контакты',
	// 	'menu_title'	=> 'Контакты',
	// 	'parent_slug'	=> 'theme-general-settings',
	// 	'menu_slug' 	=> 'theme-general-contacts',
	// ));
	
}


/*
	===============================================================
	Theme support function
	===============================================================
*/

add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'simple-logo' );


/*
	===============================================================
	Add scripts and styles files
	===============================================================
*/

function simple_enqueue_script(){
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/bundle.css',false,'1.1','all');
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js", false, false, true);
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/bundle.js', array ( 'jquery' ), 1.1, true);
}

add_action( 'wp_enqueue_scripts', 'simple_enqueue_script' );

/*
	===============================================================
	Register menu and simpleize menu 
	===============================================================
*/


function simple_register_nav_menus() {
	register_nav_menus( [ 
		'header_menu' => 'Меню в шапке',
		'footer_menu_products' => 'Меню в подвале продукция',
		'footer_menu_service' => 'Меню в подвале услуги'
		] );
}

add_action( 'after_setup_theme', 'simple_register_nav_menus' );

/*
	===============================================================
	Add walkers
	===============================================================
*/

require get_template_directory() . '/inc/walkers/walker-header-navbar-lg.php';
require get_template_directory() . '/inc/walkers/walker-header-navbar-xs.php';
require get_template_directory() . '/inc/walkers/walker-footer-menu.php';


/*
	===============================================================
	Add filters for goods post type in admin panel by taxonomy
	===============================================================
*/


function simple_taxonomy_filter() {
	global $typenow; // тип поста
	if( $typenow == 'goods' ){ // для каких типов постов отображать
		$taxes = array('goods_category'); // таксономии через запятую
		foreach ($taxes as $tax) {
			$current_tax = isset( $_GET[$tax] ) ? $_GET[$tax] : '';
			$tax_obj = get_taxonomy($tax);
			$tax_name = mb_strtolower($tax_obj->labels->name);
			// функция mb_strtolower переводит в нижний регистр
			// она может не работать на некоторых хостингах, если что, убирайте её отсюда
			$terms = get_terms($tax);
			if(count($terms) > 0) {
				echo "<select name='$tax' id='$tax' class='postform'>";
				echo "<option value=''>Все $tax_name</option>";
				foreach ($terms as $term) {
					echo '<option value='. $term->slug, $current_tax == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}

add_action( 'restrict_manage_posts', 'simple_taxonomy_filter' );

/*
	===============================================================
	Remove menu items from admin panel
	===============================================================
*/


function remove_menus(){

//   remove_menu_page( 'index.php' );                  /* Консоль */
remove_menu_page( 'edit.php' );                   /* Записи */
//   remove_menu_page( 'upload.php' );                 /* Медиафайлы */
//   remove_menu_page( 'edit.php?post_type=page' );    /* Страницы */
remove_menu_page( 'edit-comments.php' );          /* Комментарии */
//   remove_menu_page( 'themes.php' );                 /* Внешний вид */
//   remove_menu_page( 'plugins.php' );                /* Плагины */
//   remove_menu_page( 'users.php' );                  /* Пользователи */
//   remove_menu_page( 'tools.php' );                  /* Инструменты */
//   remove_menu_page( 'options-general.php' );        /* Параметры */

};

add_action( 'admin_menu', 'remove_menus' );



// function simple_remove_post_excerpt_feature() {
// 	remove_post_type_support( 'post', 'editor' );
// }

// add_action( 'init', 'simple_remove_post_excerpt_feature' );



/*
	===============================================================
	Taxonomy: Категория товаров.
	===============================================================
*/


function simple_register_goods_category_taxes() {

	$labels = array(
		"name" 			=> __( "Категория товаров"),
		"singular_name" => __( "Категория товаров" ),
	);

	$rewrite =  [
		'slug' 			=> 'goods_category',
		'with_front' 	=> true, 
		'hierarchical' 	=> false
	];

	$args = array(
		"label" 				=> __( "Категория товаров" ),
		"labels" 				=> $labels,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		"hierarchical" 			=> true,
		"show_ui" 				=> true,
		"show_in_menu" 			=> true,
		"show_in_nav_menus" 	=> true,
		"query_var" 			=> true,
		"rewrite" 				=> $rewrite,
		"show_admin_column" 	=> true,
		"show_in_rest" 			=> true,
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" 	=> false,
		);

	register_taxonomy( "goods_category", array( "goods" ), $args );
}

add_action( 'init', 'simple_register_goods_category_taxes' );

/*
	===============================================================
	Taxonomy: Категория услуг.
	===============================================================
*/


function simple_register_goods_service_taxes() {

	$labels = array(
		"name" 			=> __( "Категория услуг"),
		"singular_name" => __( "Категория услуг" ),
	);

	$rewrite =  [
		'slug' 			=> 'service_category',
		'with_front' 	=> true, 
		'hierarchical' 	=> false
	];

	$args = array(
		"label" 				=> __( "Категория услуг" ),
		"labels" 				=> $labels,
		"public" 				=> true,
		"publicly_queryable" 	=> true,
		"hierarchical" 			=> true,
		"show_ui" 				=> true,
		"show_in_menu" 			=> true,
		"show_in_nav_menus" 	=> true,
		"query_var" 			=> true,
		"rewrite" 				=> $rewrite,
		"show_admin_column" 	=> true,
		"show_in_rest" 			=> true,
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" 	=> false,
		);

	register_taxonomy( "service_category", array( "service" ), $args );
}

add_action( 'init', 'simple_register_goods_service_taxes' );



/*
	===============================================================
	Post Type: Товары.
	===============================================================
*/

function simple_register_goods_post_type() {

	$labels = array(
		"name" 			=> __( "Товары", "sinarxia" ),
		"singular_name" => __( "Товары", "sinarxia" ),
	);

	$args = array(
		"label" 					=> __( "Товары", 'sinarxia' ),
		"labels" 					=> $labels,
		"description" 				=> "",
		"public" 					=> true,
		"publicly_queryable" 		=> true,
		"show_ui" 					=> true,
		"delete_with_user" 			=> false,
		"show_in_rest" 				=> true,
		"rest_base" 				=> "",
		"rest_controller_class" 	=> "WP_REST_Posts_Controller",
		"has_archive" 				=> true,
		"show_in_menu" 				=> true,
		"show_in_nav_menus" 		=> true,
		"exclude_from_search"		=> false,
		"capability_type" 			=> "post",
		"map_meta_cap" 				=> true,
		"hierarchical" 				=> true,
		"rewrite" 					=> true,
		"query_var" 				=> true,
		"menu_position" 			=> 5,
		"menu_icon" 				=> "dashicons-cart",
		'taxonomies'            	=> array( 'goods_category' ),
		"supports" 					=> array( "title" ),
		'can_export'            	=> true,
	);

	register_post_type( "goods", $args );
}

add_action( 'init', 'simple_register_goods_post_type', 0 );

/*
	===============================================================
	Post Type: Услуги.
	===============================================================
*/

function simple_register_service_post_type() {

	$labels = array(
		"name" 			=> __( "Услуги", "sinarxia" ),
		"singular_name" => __( "Услуги", "sinarxia" ),
	);

	$args = array(
		"label" 					=> __( "Услуги", 'sinarxia' ),
		"labels" 					=> $labels,
		"description" 				=> "",
		"public" 					=> true,
		"publicly_queryable" 		=> true,
		"show_ui" 					=> true,
		"delete_with_user" 			=> false,
		"show_in_rest" 				=> true,
		"rest_base" 				=> "",
		"rest_controller_class" 	=> "WP_REST_Posts_Controller",
		"has_archive" 				=> true,
		"show_in_menu" 				=> true,
		"show_in_nav_menus" 		=> true,
		"exclude_from_search"		=> false,
		"capability_type" 			=> "post",
		"map_meta_cap" 				=> true,
		"hierarchical" 				=> true,
		"rewrite" 					=> true,
		"query_var" 				=> true,
		"menu_position" 			=> 5,
		"menu_icon" 				=> "dashicons-cart",
		'taxonomies'            	=> array( 'service_category'),
		"supports" 					=> array( "title" ),
		'can_export'            	=> true,
	);

	register_post_type( "service", $args );
}

add_action( 'init', 'simple_register_service_post_type', 0 );

/*
	===============================================================
	Relevanssi fix from yoist
	===============================================================
*/

function simple_meta_fix( $q ) {
	$q->set( 'meta_query', array() );
	return $q;
}

add_filter( 'relevanssi_modify_wp_query', 'simple_meta_fix', 99 );


/*
	===============================================================
	Remove the pagination headings
	===============================================================
*/

function simple_navigation_template( $template, $class ){
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="w-100">%3$s</div>
	</nav>    
	';
}

add_filter('navigation_markup_template', 'simple_navigation_template', 10, 2 );