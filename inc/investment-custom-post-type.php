<?php
/**
 * Custom Filterable Post Gallery: Investment custom post type and taxonomy registration
 *
 * @package cfpg
 */


// Register Custom Investment Post Type
function investment_custom_post_type() {

	$labels = [
		'name' => __( 'Investments', 'cfpg' ),
		'singular_name' => __( 'Investment', 'cfpg' ),
		'menu_name' => __( 'Investments', 'cfpg' ),
		'all_items' => __( 'All Investments', 'cfpg' ),
		'add_new' => __( 'Add new', 'cfpg' ),
		'add_new_item' => __( 'Add new Investment', 'cfpg' ),
		'edit_item' => __( 'Edit Investment', 'cfpg' ),
		'new_item' => __( 'New Investment', 'cfpg' ),
		'view_item' => __( 'View Investment', 'cfpg' ),
		'view_items' => __( 'View Investments', 'cfpg' ),
		'search_items' => __( 'Search Investments', 'cfpg' ),
		'not_found' => __( 'No Investments found', 'cfpg' ),
		'not_found_in_trash' => __( 'No Investments found in trash', 'cfpg' ),
		'parent' => __( 'Parent Investment:', 'cfpg' ),
		'featured_image' => __( 'Featured image for this Investment', 'cfpg' ),
		'set_featured_image' => __( 'Set featured image for this Investment', 'cfpg' ),
		'remove_featured_image' => __( 'Remove featured image for this Investment', 'cfpg' ),
		'use_featured_image' => __( 'Use as featured image for this Investment', 'cfpg' ),
		'archives' => __( 'Investment archives', 'cfpg' ),
		'insert_into_item' => __( 'Insert into Investment', 'cfpg' ),
		'uploaded_to_this_item' => __( 'Upload to this Investment', 'cfpg' ),
		'filter_items_list' => __( 'Filter Investments list', 'cfpg' ),
		'items_list_navigation' => __( 'Investments list navigation', 'cfpg' ),
		'items_list' => __( 'Investments list', 'cfpg' ),
		'attributes' => __( 'Investments attributes', 'cfpg' ),
		'name_admin_bar' => __( 'Investment', 'cfpg' ),
		'item_published' => __( 'Investment published', 'cfpg' ),
		'item_published_privately' => __( 'Investment published privately.', 'cfpg' ),
		'item_reverted_to_draft' => __( 'Investment reverted to draft.', 'cfpg' ),
		'item_scheduled' => __( 'Investment scheduled', 'cfpg' ),
		'item_updated' => __( 'Investment updated.', 'cfpg' ),
		'parent_item_colon' => __( 'Parent Investment:', 'cfpg' ),
	];

	$args = [
		'label' => __( 'Investments', 'cfpg' ),
		'labels' => $labels,
		'description' => '',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'rest_base' => 'investment',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'rest_namespace' => 'wp/v2',
		'has_archive' => false,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'delete_with_user' => false,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'can_export' => true,
		'rewrite' => [ 'slug' => 'investment', 'with_front' => false ],
		'query_var' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-money',
		'supports' => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'revisions' ],
		'show_in_graphql' => false,
	];

	register_post_type( 'investment', $args );
}
add_action( 'init', 'investment_custom_post_type', 0 );

// Register Custom Investment Category Taxonomy
function investment_category_custom_taxonomy() {

	$labels = [
		'name' => __( 'Investment Categories', 'cfpg' ),
		'singular_name' => __( 'Investment Category', 'cfpg' ),
		'menu_name' => __( 'Investment Categories', 'cfpg' ),
		'all_items' => __( 'All Investment Categories', 'cfpg' ),
		'edit_item' => __( 'Edit Investment Category', 'cfpg' ),
		'view_item' => __( 'View Investment Category', 'cfpg' ),
		'update_item' => __( 'Update Investment Category name', 'cfpg' ),
		'add_new_item' => __( 'Add new Investment Category', 'cfpg' ),
		'new_item_name' => __( 'New Investment Category name', 'cfpg' ),
		'parent_item' => __( 'Parent Investment Category', 'cfpg' ),
		'parent_item_colon' => __( 'Parent Investment Category:', 'cfpg' ),
		'search_items' => __( 'Search Investment Categories', 'cfpg' ),
		'popular_items' => __( 'Popular Investment Categories', 'cfpg' ),
		'separate_items_with_commas' => __( 'Separate Investment Categories with commas', 'cfpg' ),
		'add_or_remove_items' => __( 'Add or remove Investment Categories', 'cfpg' ),
		'choose_from_most_used' => __( 'Choose from the most used Investment Categories', 'cfpg' ),
		'not_found' => __( 'No Investment Categories found', 'cfpg' ),
		'no_terms' => __( 'No Investment Categories', 'cfpg' ),
		'items_list_navigation' => __( 'Investment Categories list navigation', 'cfpg' ),
		'items_list' => __( 'Investment Categories list', 'cfpg' ),
		'back_to_items' => __( 'Back to Investment Categories', 'cfpg' ),
		'name_field_description' => __( 'The name is how it appears on your site.', 'cfpg' ),
		'parent_field_description' => __( 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.', 'cfpg' ),
		'slug_field_description' => __( 'The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.', 'cfpg' ),
		'desc_field_description' => __( 'The description is not prominent by default; however, some themes may show it.', 'cfpg' ),
	];

	
	$args = [
		'label' => __( 'Investment Categories', 'cfpg' ),
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'hierarchical' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'rewrite' => [ 'slug' => 'investment-category', 'with_front' => true, ],
		'show_admin_column' => true,
		'show_in_rest' => true,
		'show_tagcloud' => false,
		'rest_base' => 'investment-category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
		'rest_namespace' => 'wp/v2',
		'show_in_quick_edit' => true,
		'sort' => false,
		'show_in_graphql' => false,
	];
	register_taxonomy( 'investment-category', [ 'investment' ], $args );
}
add_action( 'init', 'investment_category_custom_taxonomy' );

// Add featured image column to admin lists
// Set thumbnail size
add_image_size( 'investment-admin-featured-image', 60, 60, false );

// Filter the columns
function cfpg_add_investment_image_column( $cfpg_cols ){
  $cfpg_cols['investment_thumb'] = __( 'Image' );
  return $cfpg_cols;
}
add_filter( 'manage_investment_posts_columns', 'cfpg_add_investment_image_column', 2 );

// Add featured image thumbnail to the WP Admin table.
function cfpg_investment_thumbnail_column( $cfpg_cols, $id ){
  switch( $cfpg_cols ){
    case 'investment_thumb':
    if ( function_exists( 'the_post_thumbnail' ) )
      echo the_post_thumbnail( 'investment-admin-featured-image' );
    break;
  }
}
add_action( 'manage_investment_posts_custom_column', 'cfpg_investment_thumbnail_column', 5, 2 );

// Move the new column to left-most place.
function cfpg_investment_column_order( $cols ) {
  $n_cols = array();
  $move = 'investment_thumb';
  $before = 'title';

  foreach( $cols as $key => $value ) {
    if ( $key === $before ) {
      $n_cols[$move] = $move;
    }
    $n_cols[$key] = $value;
  }
  return $n_cols;
}
add_filter( 'manage_investment_posts_columns', 'cfpg_investment_column_order' );

// Adjust the column width.
function cfpg_add_admin_styles() {
	echo '<style>.column-investment_thumb {width: 60px;}</style>';
}
add_action( 'admin_head', 'cfpg_add_admin_styles' );
