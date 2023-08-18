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

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function cfig_custom_filterable_post_gallery_blocks_init() {

	$blocks = [
		'filterable-post-block',
		'filterable-gallery-block'
	];

	foreach ($blocks as $block) {
		register_block_type( __DIR__ . "/build/{$block}" );
	}
}
add_action( 'init', 'cfig_custom_filterable_post_gallery_blocks_init' );
