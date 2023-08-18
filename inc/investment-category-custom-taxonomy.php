<?php
/**
 * Custom Filterable Post Gallery: Investment custom taxonomy registration
 *
 * @package cfpg
 */


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
		'hierarchical' => true,
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
