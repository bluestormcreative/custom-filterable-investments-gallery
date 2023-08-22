<?php
/**
 * Filterable Investment Gallery Block Template.
 *
 * @param array $attributes - A clean associative array of block attributes.
 * @param array $block - All the block settings and attributes.
 * @param string $content - The block inner HTML (usually empty unless using inner blocks).
 *
 * @package Cfig
 */

	// Query investment posts.
		$args              = array(
			'post_type'      => 'investment',
			'posts_per_page' => -1,
		);
		$investments_query = new WP_Query( $args );

		// Get investment category terms for filter bar.
		$cats = get_terms(
			array(
				'taxonomy'   => 'investment-category',
				'orderby'    => 'count',
				'order'      => 'ASC',
				'hide_empty' => false,
			)
		);
		?>
<div <?php echo wp_kses_data( get_block_wrapper_attributes() ); ?>>
	<div class="filter-bar">
		<?php if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) : ?>
			<ul class="filter-items-list" role="listbox" title="<?php esc_html( 'Filter by investment category', 'cfig' ); ?>" tabindex="0">
			<?php
			foreach ( $cats as $invest_cat ) {
				echo '<li class="filter-item" role="option" data-filter="' . esc_html( $invest_cat->slug ) . '">' . esc_html( $invest_cat->name ) . '</li>';
			}
			?>
			</ul>
			<div class="filter-items-select select-wrapper">
				<select>
					<?php
					foreach ( $cats as $invest_cat ) {
						echo '<option value="' . esc_html( $invest_cat->slug ) . '">' . esc_html( $invest_cat->name ) . '</option>';
					}
					?>
				</select>
			</div>

		<?php endif; ?>
	</div>
	<div class="gallery-cards">
		<?php if ( $investments_query->have_posts() ) : ?>
			<?php
			while ( $investments_query->have_posts() ) :
				$investments_query->the_post();
				$invest_id   = get_the_ID();
				$terms       = get_the_terms( $invest_id, 'investment-category' );
				$slugs       = array_column( $terms, 'slug' );
				$terms_data  = implode( ' ', $slugs );
				$logo_url    = get_post_meta( $invest_id, 'logoUrl', true );
				$logo_alt    = get_post_meta( $invest_id, 'logoAlt', true );
				$business    = get_post_meta( $invest_id, 'business', true );
				$sector      = get_post_meta( $invest_id, 'sector', true );
				$years       = get_post_meta( $invest_id, 'years', true );
				$invest_type = get_post_meta( $invest_id, 'type', true );
				?>
				<div class="investment-card" data-investment-categories="<?php echo esc_html( $terms_data ); ?>">
					<div class="investment-logo">
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_html( $logo_alt ); ?>" />
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
