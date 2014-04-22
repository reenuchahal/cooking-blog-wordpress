<?php

// Add new post type for Recipes
add_action('init', 'cooking_recipes_init');

function cooking_recipes_init() {      
	
	$recipe_labels = array(
		'name' => _x('Recipes', 'post type general name'),
		'singular_name' => _x('Recipe', 'post type singular name'),
		'all_items' => __('All Recipes'),
		'add_new' => _x('Add New Recipe', 'recipes'),
		'add_new_item' => __('Add New Recipe'),
		'edit_item' => __('Edit Recipe'),
		'new_item' => __('New Recipe'),
		'view_item' => __('View Recipe'),
		'search_items' => __('Search in recipes'),
		'not_found' =>  __('No recipes found'),
		'not_found_in_trash' => __('No recipes found in trash'), 
		'parent_item_colon' => ''
	);


	$args = array(
		'labels' => $recipe_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'recipes'
		
		
	);

	register_post_type('recipes',$args);
}

// Add new post type for Photos
add_action('init', 'cooking_photos_init');

function cooking_Photos_init() {

	$photo_labels = array(
		'name' => _x('Photos', 'post type general name'),
		'singular_name' => _x('Photo', 'post type singular name'),
		'all_items' => __('All Photos'),
		'add_new' => _x('Add New Photo', 'photos'),
		'add_new_item' => __('Add New Photo'),
		'edit_item' => __('Edit Photo'),
		'new_item' => __('New Photo'),
		'view_item' => __('View Photo'),
		'search_items' => __('Search in photos'),
		'not_found' =>  __('No photos found'),
		'not_found_in_trash' => __('No photos found in trash'), 
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $photo_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'photos'
	);
	
	register_post_type('photos',$args);
}

// Add new post type for Videos
add_action('init', 'cooking_videos_init');

function cooking_videos_init() {

	$video_labels = array(
		'name' => _x('Videos', 'post type general name'),
		'singular_name' => _x('Video', 'post type singular name'),
		'all_items' => __('All Videos'),
		'add_new' => _x('Add New Video', 'videos'),
		'add_new_item' => __('Add New Video'),
		'edit_item' => __('Edit Video'),
		'new_item' => __('New Video'),
		'view_item' => __('View Video'),
		'search_items' => __('Search in videos'),
		'not_found' =>  __('No videos found'),
		'not_found_in_trash' => __('No videos found in trash'), 
		'parent_item_colon' => ''
	);
	
	$args = array(
		'labels' => $video_labels ,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
		'has_archive' => 'videos'
	);
	
	register_post_type('videos',$args);
}

// Add new Custom Post Type icons
add_action( 'admin_head', 'cooking_icons' );

function cooking_icons() {
?>
	<style type="text/css" media="screen">
		 #menu-posts-recipes  div.wp-menu-image:before, #menu-posts-photos  div.wp-menu-image:before, #menu-posts-videos  div.wp-menu-image:before {
   			 content: ""!important;
		}
		#menu-posts-recipes .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/recipessmall.png) no-repeat 6px !important;
		}
		.icon32-posts-recipes {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/recipes.png) no-repeat !important;
		}
		#menu-posts-photos .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/photosmall.png) no-repeat 6px !important;
		}
		.icon32-posts-photos {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/photo.png) no-repeat !important;
		}
		#menu-posts-videos .wp-menu-image {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/videosmall.png) no-repeat 6px !important;
		}
		.icon32-posts-videos {
			background: url(<?php bloginfo('url') ?>/wp-content/themes/images/video.png) no-repeat !important;
		}

    </style>
<?php } 

// Add custom taxonomies
add_action( 'init', 'cooking_create_taxonomies', 0 );

function cooking_create_taxonomies() {

	$meal_labels = array(
		'name' => _x( 'Meal type', 'taxonomy general name' ),
		'singular_name' => _x( 'Meal Type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in meal type' ),
		'all_items' => __( 'All Meal Type' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Meal Type' ), 
		'update_item' => __( 'Update Meal Type' ),
		'add_new_item' => __( 'Add New Meal Type' ),
		'new_item_name' => __( 'New Meal Type' ),
		'menu_name' => __( 'Meal Type' ),
	);
	
	// Meal type
	register_taxonomy('meal-type',array('recipes','photos','videos'), array(
		'hierarchical' => true,
		'labels' => $meal_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'meal-type' )
	));
	
	// Level of difficulty
	$difficulty_labels = array(
		'name' => _x( 'Levels of Difficulty', 'taxonomy general name' ),
		'singular_name' => _x( 'Level of Difficulty', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in level of difficulty' ),
		'all_items' => __( 'All Levels of Difficulty' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Level of Difficulty' ), 
		'update_item' => __( 'Update Level of Difficulty' ),
		'add_new_item' => __( 'Add New Level of Difficulty' ),
		'new_item_name' => __( 'New Level of Difficulty' ),
		'menu_name' => __( 'Levels of Difficulty' ),
	);
	
	register_taxonomy('difficulty','recipes',array(
		'hierarchical' => true,
		'labels' => $difficulty_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'difficulty' )
	));
	
	// Ingredients
	$ingredients_labels = array(
		'name' => _x( 'Ingredients', 'taxonomy general name' ),
		'singular_name' => _x( 'Ingredient', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in ingredients' ),
		'popular_items' => __( 'Popular Ingredients' ),
		'all_items' => __( 'All Ingredients' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Ingredient' ), 
		'update_item' => __( 'Update Ingredient' ),
		'add_new_item' => __( 'Add New Ingredient' ),
		'new_item_name' => __( 'New Ingredient Name' ),
		'separate_items_with_commas' => __( 'Separate ingredients with commas' ),
		'add_or_remove_items' => __( 'Add or remove ingredients' ),
		'choose_from_most_used' => __( 'Choose from the most used ingredients' ),
		'menu_name' => __( 'Ingredients' ),
	);
	
	register_taxonomy('ingredients',array('recipes','photos','videos'),array(
		'hierarchical' => false,
		'labels' => $ingredients_labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'rewrite' => array('slug' => 'ingredient' )
	));
	
	// Preparation time
	$time_labels = array(
		'name' => _x( 'Preparation Time', 'taxonomy general name' ),
		'singular_name' => _x( 'Preparation Time', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in preparation times' ),
		'all_items' => __( 'All Preparation Times' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Preparation Time' ), 
		'update_item' => __( 'Update Preparation Time' ),
		'add_new_item' => __( 'Add New Preparation Time' ),
		'new_item_name' => __( 'New Preparation Time' ),
		'menu_name' => __( 'Preparation Time' ),
	);
	
	register_taxonomy('time','recipes',array(
		'hierarchical' => true,
		'labels' => $time_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'time' )
	));
	
	// Servings
	$servings_labels = array(
		'name' => _x( 'Servings', 'taxonomy general name' ),
		'singular_name' => _x( 'Servings', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in servings' ),
		'all_items' => __( 'All Servingss' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Serving' ), 
		'update_item' => __( 'Update Serving' ),
		'add_new_item' => __( 'Add New Serving' ),
		'new_item_name' => __( 'New Serving' ),
		'menu_name' => __( 'Servings' ),
	);
	
	register_taxonomy('servings','recipes',array(
		'hierarchical' => true,
		'labels' => $servings_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'serving' )
	));

	// Technique (photos)
	$techniques_labels = array(
		'name' => _x( 'Techniques', 'taxonomy general name' ),
		'singular_name' => _x( 'Technique', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in techniques' ),
		'all_items' => __( 'All Techniques' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Technique' ), 
		'update_item' => __( 'Update Technique' ),
		'add_new_item' => __( 'Add New Technique' ),
		'new_item_name' => __( 'New Technique' ),
		'menu_name' => __( 'Techniques' ),
	);
	
	register_taxonomy('techniques','photos',array(
		'hierarchical' => true,
		'labels' => $techniques_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'technique' )
	));
	
	// Video type
	$video_labels = array(
		'name' => _x( 'Video Type', 'taxonomy general name' ),
		'singular_name' => _x( 'Video Type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in video types' ),
		'all_items' => __( 'All Video Types' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Video Type' ), 
		'update_item' => __( 'Update Video Type' ),
		'add_new_item' => __( 'Add New Video Type' ),
		'new_item_name' => __( 'New Video Type' ),
		'menu_name' => __( 'Video Types' ),
	);
	
	register_taxonomy('video-types','videos',array(
		'hierarchical' => true,
		'labels' => $video_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'video-types' )
	));


}

function twentyeleven_posted_on() {
	
	printf( __( '<div class="date"> <p><time class="entry-date" datetime="%3$s">%4$s</time></p></div>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}


?>