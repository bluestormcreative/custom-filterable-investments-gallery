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
		'supports' => [ 'title', 'editor', 'custom-fields', 'revisions' ],
		'show_in_graphql' => false,
		'template_lock' => 'all',
		'template' => [
			['cfig/investment-block', [] ]
		],
	];

	register_post_type( 'investment', $args );
}
add_action( 'init', 'investment_custom_post_type', 0 );

// Set image sizes
add_image_size( 'investment_logo', 200, 100 );


// Register post meta for our block attributes.
function cfig_register_investment_meta() {

	$meta_items = [
		'logoUrl',
		'logoAlt',
		'business',
		'sector',
		'years',
		'type',
	];

	foreach ($meta_items as $item) {
		register_post_meta(
		'investment',
		$item,
		array(
			'show_in_rest'       => true,
			'single'             => true,
			'type'               => 'string',
			'sanitize_callback'  => 'wp_kses_post',
			)
		);
	}

	register_post_meta(
		'investment',
		'logoID',
		array(
			'show_in_rest'       => true,
			'single'             => true,
			'type'               => 'integer',
			'sanitize_callback'  => 'wp_kses_post',
			)
		);
}
add_action( 'init', 'cfig_register_investment_meta' );