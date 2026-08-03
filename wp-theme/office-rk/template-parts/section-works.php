<?php
/**
 * 実績事例（3項目）。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section" id="works">
	<div class="container">
		<div class="section-head is-center reveal">
			<span class="section-label">Works</span>
			<h2 class="section-title"><?php esc_html_e( '実績事例', 'office-rk' ); ?></h2>

			<?php if ( office_rk_has( 'works_catch' ) ) : ?>
				<p class="section-catch"><?php office_rk_the( 'works_catch' ); ?></p>
			<?php endif; ?>
		</div>

		<div class="works-grid">
			<?php
			for ( $office_rk_i = 1; $office_rk_i <= 3; $office_rk_i++ ) :
				$office_rk_title = 'works_' . $office_rk_i . '_title';

				if ( ! office_rk_has( $office_rk_title ) ) {
					continue;
				}

				$office_rk_image = office_rk_get( 'works_' . $office_rk_i . '_image' );
				$office_rk_tag   = 'works_' . $office_rk_i . '_tag';
				$office_rk_text  = 'works_' . $office_rk_i . '_text';
				$office_rk_delay = ( $office_rk_i > 1 ) ? ' reveal-delay-' . ( $office_rk_i - 1 ) : '';
				?>
				<article class="work-card reveal<?php echo esc_attr( $office_rk_delay ); ?>">
					<?php if ( $office_rk_image ) : ?>
						<div class="work-thumb">
							<img src="<?php echo esc_url( $office_rk_image ); ?>"
								alt="<?php echo esc_attr( wp_strip_all_tags( office_rk_get( $office_rk_title ) ) ); ?>"
								loading="lazy" decoding="async">
						</div>
					<?php endif; ?>

					<div class="work-body">
						<?php if ( office_rk_has( $office_rk_tag ) ) : ?>
							<span class="work-tag"><?php office_rk_the( $office_rk_tag ); ?></span>
						<?php endif; ?>

						<h3><?php office_rk_the( $office_rk_title ); ?></h3>

						<?php if ( office_rk_has( $office_rk_text ) ) : ?>
							<p><?php office_rk_the( $office_rk_text ); ?></p>
						<?php endif; ?>
					</div>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
