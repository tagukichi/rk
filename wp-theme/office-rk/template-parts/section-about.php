<?php
/**
 * 私たちについて。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$office_rk_about_image = office_rk_get( 'about_image' );
?>
<section class="section" id="about">
	<div class="container">
		<div class="about-grid">
			<?php if ( $office_rk_about_image ) : ?>
				<div class="about-visual reveal">
					<img src="<?php echo esc_url( $office_rk_about_image ); ?>"
						alt="<?php echo esc_attr( sprintf( __( '%s のオフィス', 'office-rk' ), office_rk_get( 'company_name' ) ) ); ?>"
						loading="lazy" decoding="async">
				</div>
			<?php endif; ?>

			<div class="about-text reveal reveal-delay-1">
				<div class="section-head" style="margin-bottom: 24px;">
					<span class="section-label">About Us</span>
					<h2 class="section-title"><?php esc_html_e( '私たちについて', 'office-rk' ); ?></h2>
				</div>

				<?php if ( office_rk_has( 'about_catch' ) ) : ?>
					<p class="about-catch"><?php office_rk_the( 'about_catch' ); ?></p>
				<?php endif; ?>

				<?php foreach ( [ 'about_text_1', 'about_text_2', 'about_text_3' ] as $office_rk_key ) : ?>
					<?php if ( office_rk_has( $office_rk_key ) ) : ?>
						<p><?php office_rk_the( $office_rk_key ); ?></p>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
