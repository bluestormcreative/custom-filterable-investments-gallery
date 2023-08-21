<?php
/**
 * Plugin Name:       Custom Filterable Investments Gallery
 * Description:       Add a filterable gallery of investment posts. Scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Blue Storm Creative
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cfig
 *
 * @package           cfig
 */

// Investment Post Type.
require_once __DIR__ . '/inc/investment-custom-post-type.php';

// Investment Category Taxonomy.
require_once __DIR__ . '/inc/investment-category-custom-taxonomy.php';

// Register blocks.
function cfig_custom_filterable_investment_gallery_blocks_init() {

	$blocks = [
		'investment-block',
		'filterable-gallery-block',
	];

	foreach ($blocks as $block) {
		register_block_type( __DIR__ . "/build/{$block}" );
	}
}
add_action( 'init', 'cfig_custom_filterable_investment_gallery_blocks_init' );

// Enqueue gallery block frontend js.
function cfig_enqueue_gallery_js(){
    $id = get_the_ID();
    
		if ( ! is_admin() && has_block( 'cfig/custom-filterable-investments-gallery', $id ) ) {
      wp_enqueue_script( 'filterable-gallery-script', plugins_url( 'cfig-gallery.js', __FILE__ ), null, null, true);
  }
}
add_action( 'enqueue_block_assets','cfig_enqueue_gallery_js' );
