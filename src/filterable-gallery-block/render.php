<?php
/**
* Filterable Investment Gallery Block Template.
*	@param   array $attributes - A clean associative array of block attributes.
* @param   array $block - All the block settings and attributes.
* @param   string $content - The block inner HTML (usually empty unless using inner blocks).
*/

// Query investment posts.
	$args = array(
		'post_type' => 'investment',
	);
	$investments_query = new WP_Query($args);
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php if ( $investments_query->have_posts() ) : ?>

		<?php while ( $investments_query->have_posts() ) : $investments_query->the_post(); ?>
				post
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php endif; ?>
</div>