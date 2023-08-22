<?php
/**
 * Custom Filterable Investments Gallery: Investment category taxonomy registration
 *
 * @package cfig
 */

// Register Custom Investment Category Taxonomy
function investment_category_custom_taxonomy() {

	$labels = [
		'name' => __( 'Investment Categories', 'cfig' ),
		'singular_name' => __( 'Investment Category', 'cfig' ),
		'menu_name' => __( 'Investment Categories', 'cfig' ),
		'all_items' => __( 'All Investment Categories', 'cfig' ),
		'edit_item' => __( 'Edit Investment Category', 'cfig' ),
		'view_item' => __( 'View Investment Category', 'cfig' ),
		'update_item' => __( 'Update Investment Category name', 'cfig' ),
		'add_new_item' => __( 'Add new Investment Category', 'cfig' ),
		'new_item_name' => __( 'New Investment Category name', 'cfig' ),
		'parent_item' => __( 'Parent Investment Category', 'cfig' ),
		'parent_item_colon' => __( 'Parent Investment Category:', 'cfig' ),
		'search_items' => __( 'Search Investment Categories', 'cfig' ),
		'popular_items' => __( 'Popular Investment Categories', 'cfig' ),
		'separate_items_with_commas' => __( 'Separate Investment Categories with commas', 'cfig' ),
		'add_or_remove_items' => __( 'Add or remove Investment Categories', 'cfig' ),
		'choose_from_most_used' => __( 'Choose from the most used Investment Categories', 'cfig' ),
		'not_found' => __( 'No Investment Categories found', 'cfig' ),
		'no_terms' => __( 'No Investment Categories', 'cfig' ),
		'items_list_navigation' => __( 'Investment Categories list navigation', 'cfig' ),
		'items_list' => __( 'Investment Categories list', 'cfig' ),
		'back_to_items' => __( 'Back to Investment Categories', 'cfig' ),
		'name_field_description' => __( 'The name is how it appears on your site.', 'cfig' ),
		'parent_field_description' => __( 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.', 'cfig' ),
		'slug_field_description' => __( 'The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.', 'cfig' ),
		'desc_field_description' => __( 'The description is not prominent by default; however, some themes may show it.', 'cfig' ),
	];


	$args = [
		'label' => __( 'Investment Categories', 'cfig' ),
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
