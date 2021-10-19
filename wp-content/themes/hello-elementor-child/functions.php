<?php

// Styles enqueueing

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version')
    );
}

// Custom Post Type Regestering
 
function wm_custom_post_type (){
	
	$labels = array(
		'name' => 'Movies',
		'singular_name' => 'Movie',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Movies',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('movies',$args);
}
add_action('init','wm_custom_post_type');

// Regestering custom taxonomies

function wm_custom_taxonomies() {
	
    $args = array(
        'label' => __( 'Genres' ),
        'rewrite' => array( 'slug' => 'genres' ),
        'hierarchical' => true,
    );

    register_taxonomy( 'genres', 'movies', $args );
    
    $args = array(
            'label' => __( 'Countries' ),
            'rewrite' => array( 'slug' => 'countries' ),
            'hierarchical' => true,
    );

    register_taxonomy( 'countries', 'movies', $args );
    
    $args = array(
            'label' => __( 'Years' ),
            'rewrite' => array( 'slug' => 'years' ),
            'hierarchical' => true,
    );

    register_taxonomy( 'years', 'movies', $args );

    $args = array(
            'label' => __( 'Actors' ),
            'rewrite' => array( 'slug' => 'actors' ),
            'hierarchical' => true,
    );

    register_taxonomy( 'actors', 'movies', $args );
}

add_action( 'init' , 'wm_custom_taxonomies' );


// Registering your ACF Fields

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'movies_acf',
	'title' => 'Movies ACF',
	'fields' => array (
		array (
			'key' => 'cost',
			'label' => 'Cost',
			'name' => 'cost',
			'type' => 'text',
        ),
          array (
			'key' => 'date',
			'label' => 'Date',
			'name' => 'date',
			'type' => 'text',
		)
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'movies',
			),
		),
	),
));

endif;

// 5 latest movies shortcode

function wp_5_latest_movies_func( $atts ){
    $args = array(
    'posts_per_page' => 5,
    'post_type' => 'movies',

);

$latest = new WP_Query( $args );
while( $latest->have_posts() ) : $latest->the_post();
$output .= get_the_title() . "<br>";
endwhile; 
wp_reset_postdata();
return $output;
}

add_shortcode( 'latest_movies', 'wp_5_latest_movies_func' );