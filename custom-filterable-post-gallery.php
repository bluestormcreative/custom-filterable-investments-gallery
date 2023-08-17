<?php
/**
 * Plugin Name:       Custom Filterable Post Gallery
 * Description:       Add a filterable gallery of custom posts. Scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Blue Storm Creative
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cfpg
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_custom_filterable_post_gallery_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_custom_filterable_post_gallery_block_init' );