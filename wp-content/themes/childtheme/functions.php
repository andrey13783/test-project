<?php
add_action( 'init', 'true_register_objects' );
function true_register_objects() {
	$labels = array(
		'name' => 'Недвижимость',
		'singular_name' => 'Объект',
		'menu_name' => 'Недвижимость'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-media-archive',
		'menu_position' => 11,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array()
	);
	register_post_type('objects',$args);
}

add_action( 'init', 'true_register_towns' );
function true_register_towns() {
	$labels = array(
		'name' => 'Города',
		'singular_name' => 'Город',
		'menu_name' => 'Города'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'menu_icon' => 'dashicons-media-archive',
		'menu_position' => 11,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array()
	);
	register_post_type('towns',$args);
}

add_action( 'init', 'create_taxonomies' );
function create_taxonomies(){
	register_taxonomy('objects_cats', 'objects', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x('Тип недвижимости',''),
			'singular_name' => _x('Тип недвижимости',''),
			'menu_name' => __('Тип недвижимости'),
		),
		'show_ui' => true,
		'query_var' => true,
	));
}

// Добавим метабокс выбора команды к игроку
add_action('add_meta_boxes', function () {
	add_meta_box( 'town', 'Город', 'town_select', 'objects', 'normal', 'low'  );
}, 1);

function town_select( $post ){
	$towns = get_posts(array( 'post_type'=>'towns', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $towns ){
		echo '
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
		';

		foreach( $towns as $town ){
			echo '
			<li><label>
				<input type="radio" name="post_parent" value="'. $town->ID .'" '. checked($town->ID, $post->post_parent, 0) .'> '. esc_html($town->post_title) .'
			</label></li>
			';
		}

		echo '
			</ul>
		</div>';
	}
	else
		echo 'Команд нет...';
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 11 );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri() );
}
?>