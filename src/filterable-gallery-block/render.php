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
	$investments_query = new WP_Query( $args );

// Get investment category terms for filter bar.
$terms = get_terms( array(
    'taxonomy'   => 'investment-category',
		'orderby'  => 'count',
		'order'    => 'DESC',
		'hide_empty' => false,
) );
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<div class="filter-bar">
		<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
			<ul class="filter-items-list" role="listbox" tabindex="0">
			<?php foreach ( $terms as $term ) {
				echo '<li class="filter-item" role="option" data-filter="' . $term->slug . '">' . $term->name . '</li>';
				} ?>
			</ul>
			<div class="filter-items-select select-wrapper">
				<select>
					<?php foreach ( $terms as $term ) {
						echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
					} ?>
				</select>
			</div>

		<?php endif; ?>
	</div>
	<div class="gallery-cards">
		<?php if ( $investments_query->have_posts() ) : ?>
			<?php while ( $investments_query->have_posts() ) : $investments_query->the_post();
				$id					= get_the_ID();
				$terms			= get_the_terms( $id, 'investment-category' );
				$slugs 			= array_column($terms, 'slug');
				$terms_data = implode(" ", $slugs);
				$logoUrl  	= get_post_meta( $id, 'logoUrl', true );
				$logoAlt  	= get_post_meta( $id, 'logoAlt', true );
				$business 	= get_post_meta( $id, 'business', true );
				$sector   	= get_post_meta( $id, 'sector', true );
				$years    	= get_post_meta( $id, 'years', true );
				$type     	= get_post_meta( $id, 'type', true );
			?>
				<div class="investment-card" data-investment-categories="<?php echo esc_html( $terms_data ); ?>">
					<div class="investment-logo">
						<img src="<?php echo esc_url( $logoUrl ); ?>" alt="<?php echo esc_html( $alt ) ?>" />
					</div>
					<div class="investment-details">
						<ul>
							<li>
								<div class="investment-detail">
									<strong><?php esc_html_e( 'Business: ', 'cfig' ); ?></strong>
									<span><?php echo esc_html( $business ); ?></span>
								</div>
							</li>
							<li>
								<div class="investment-detail">
									<strong><?php esc_html_e( 'Sector: ', 'cfig' ); ?></strong>
									<span><?php echo esc_html( $sector ); ?></span>
								</div>
							</li>
							<li>
								<div class="investment-detail">
									<strong><?php esc_html_e( 'Years: ', 'cfig' ); ?></strong>
									<span><?php echo esc_html( $years ); ?></span>
								</div>
							</li>
							<li>
								<div class="investment-detail">
									<strong><?php esc_html_e( 'Type: ', 'cfig' ); ?></strong>
									<span><?php echo esc_html( $type ); ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

		<?php endif; ?>
	</div>
</div>