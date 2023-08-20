<?php
/**
 * Custom Filterable Investments Gallery: Investment custom post type registration
 *
 * @package cfig
 */


// Register Custom Investment Post Type
function investment_custom_post_type() {

	$labels = [
		'name' => __( 'Investments', 'cfig' ),
		'singular_name' => __( 'Investment', 'cfig' ),
		'menu_name' => __( 'Investments', 'cfig' ),
		'all_items' => __( 'All Investments', 'cfig' ),
		'add_new' => __( 'Add new', 'cfig' ),
		'add_new_item' => __( 'Add new Investment', 'cfig' ),
		'edit_item' => __( 'Edit Investment', 'cfig' ),
		'new_item' => __( 'New Investment', 'cfig' ),
		'view_item' => __( 'View Investment', 'cfig' ),
		'view_items' => __( 'View Investments', 'cfig' ),
		'search_items' => __( 'Search Investments', 'cfig' ),
		'not_found' => __( 'No Investments found', 'cfig' ),
		'not_found_in_trash' => __( 'No Investments found in trash', 'cfig' ),
		'parent' => __( 'Parent Investment:', 'cfig' ),
		'featured_image' => __( 'Featured image for this Investment', 'cfig' ),
		'set_featured_image' => __( 'Set featured image for this Investment', 'cfig' ),
		'remove_featured_image' => __( 'Remove featured image for this Investment', 'cfig' ),
		'use_featured_image' => __( 'Use as featured image for this Investment', 'cfig' ),
		'archives' => __( 'Investment archives', 'cfig' ),
		'insert_into_item' => __( 'Insert into Investment', 'cfig' ),
		'uploaded_to_this_item' => __( 'Upload to this Investment', 'cfig' ),
		'filter_items_list' => __( 'Filter Investments list', 'cfig' ),
		'items_list_navigation' => __( 'Investments list navigation', 'cfig' ),
		'items_list' => __( 'Investments list', 'cfig' ),
		'attributes' => __( 'Investments attributes', 'cfig' ),
		'name_admin_bar' => __( 'Investment', 'cfig' ),
		'item_published' => __( 'Investment published', 'cfig' ),
		'item_published_privately' => __( 'Investment published privately.', 'cfig' ),
		'item_reverted_to_draft' => __( 'Investment reverted to draft.', 'cfig' ),
		'item_scheduled' => __( 'Investment scheduled', 'cfig' ),
		'item_updated' => __( 'Investment updated.', 'cfig' ),
		'parent_item_colon' => __( 'Parent Investment:', 'cfig' ),
	];

	$args = [
		'label' => __( 'Investments', 'cfig' ),
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
		'template_lock' => 'all',
		'template' => [
			['cfig/investment-block', [] ]
		],
	];

	register_post_type( 'investment', $args );
}
add_action( 'init', 'investment_custom_post_type', 0 );

// Add featured image column to admin lists
// Set thumbnail size
add_image_size( 'investment-admin-featured-image', 60, 60, false );

// Filter the columns
function cfig_add_investment_image_column( $cfig_cols ){
  $cfig_cols['investment_thumb'] = __( 'Image' );
  return $cfig_cols;
}
add_filter( 'manage_investment_posts_columns', 'cfig_add_investment_image_column', 2 );

// Add featured image thumbnail to the WP Admin table.
function cfig_investment_thumbnail_column( $cfig_cols, $id ){
  switch( $cfig_cols ){
    case 'investment_thumb':
    if ( function_exists( 'the_post_thumbnail' ) )
      echo the_post_thumbnail( 'investment-admin-featured-image' );
    break;
  }
}
add_action( 'manage_investment_posts_custom_column', 'cfig_investment_thumbnail_column', 5, 2 );

// Move the new column to left-most place.
function cfig_investment_column_order( $cols ) {
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
add_filter( 'manage_investment_posts_columns', 'cfig_investment_column_order' );

// Adjust the column width.
function cfig_add_admin_styles() {
	echo '<style>.column-investment_thumb {width: 60px;}</style>';
}
add_action( 'admin_head', 'cfig_add_admin_styles' );

// Only allow the investment block type
function cfig_allow_only_investment_block_type( $post ) {
	$allowed_blocks = [];
	if ( $post->post_type === 'investment' ) :
			$allowed_blocks[] = 'cfig/investment-block';
	endif;
	return $allowed_blocks;
}
add_filter('allowed_block_types', 'cfig_allow_only_investment_block_type', 10, 2);
