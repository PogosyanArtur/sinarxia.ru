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
add_theme_support( 'widgets' );
add_theme_support( 'simple-logo' );

/*
	===============================================================
	Widget
	===============================================================
*/

register_sidebar( array(
	'id'          	=> 'left_menu',
	'name'        	=> __( 'Левый панель', 'sinarxia' ),
	'description' 	=> __( 'This sidebar is located above the age logo.', 'sinarxia'),
	'description'   => '',
	'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => "</li>\n",
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => "</h2>\n",
) );



function custom_remove_default_widget() {
	unregister_widget('WP_Widget_Archives'); // Архивы
	unregister_widget('WP_Widget_Calendar'); // Календарь
	unregister_widget('WP_Widget_Categories'); // Рубрики
	unregister_widget('WP_Widget_Meta'); // Мета
	unregister_widget('WP_Widget_Pages'); // Страницы
	unregister_widget('WP_Widget_Recent_Comments'); // Свежие комментарии
	unregister_widget('WP_Widget_Recent_Posts'); // Свежие записи
	unregister_widget('WP_Widget_RSS'); // RSS
	unregister_widget('WP_Widget_Search'); // Поиск
	unregister_widget('WP_Widget_Tag_Cloud'); // Облако меток
	unregister_widget('WP_Widget_Text'); // Текст
}
 
add_action( 'widgets_init', 'custom_remove_default_widget', 20 );

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
		'header_menu' 			=> 'Меню в шапке',
		'footer_menu_products' 	=> 'Меню в подвале продукция',
		'footer_menu_service'	=> 'Меню в подвале услуги',
		'footer_menu_rent' 		=> 'Меню в подвале аренда',
		] );
}

add_action( 'after_setup_theme', 'simple_register_nav_menus' );

/*
	===============================================================
	Change post menu name
	===============================================================
*/

function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'Продукция';
    $submenu['edit.php'][5][0] = 'Продукция';
    $submenu['edit.php'][10][0] = 'Добавить продукцию';
    $submenu['edit.php'][15][0] = 'Категория продукции';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Продукция';
    $labels->singular_name = 'Продукция';
    $labels->add_new = 'Добавить продукцию';
    $labels->add_new_item = 'Добавить продукцию';
    $labels->edit_item = 'Редактировать продукцию';
    $labels->new_item = 'Добавить продукцию';
    $labels->view_item = 'Посмотреть';
    $labels->search_items = 'Найти продукцию';
    $labels->not_found = 'Не найдено';
    $labels->not_found_in_trash = 'Корзина пуста';
}
add_action( 'init', 'change_post_object_label' );

/*
	===============================================================
	Unregister post type tag
	===============================================================
*/

function custom_unregister_taxonomy() { 
	register_taxonomy('post_tag', array());	 
};

function custom_remove_menus() {
	remove_menu_page('edit-tags.php?taxonomy=post_tag');
	
}

add_action('init', 'custom_unregister_taxonomy');
add_action('admin_menu', 'custom_remove_menus');


/*
	===============================================================
	Add walkers
	===============================================================
*/

require get_template_directory() . '/inc/walkers/walker-header-navbar-lg.php';
require get_template_directory() . '/inc/walkers/walker-header-navbar-xs.php';
require get_template_directory() . '/inc/walkers/walker-footer-menu.php';
require get_template_directory() . '/inc/walkers/walker-sidebar-category.php';


/*
	===============================================================
	Add filters for goods post type in admin panel by taxonomy
	===============================================================
*/


function simple_taxonomy_filter() {
	global $typenow; // тип поста
	if( $typenow == 'service' ){ // для каких типов постов отображать
		$taxes = array('service_category'); // таксономии через запятую
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


	if( $typenow == 'rent' ){ // для каких типов постов отображать
		$taxes = array('rent_category'); // таксономии через запятую
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
//   remove_menu_page( 'edit.php' );                   /* Записи */
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