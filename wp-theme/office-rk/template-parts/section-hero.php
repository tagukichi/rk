<?php
/**
 * ファーストビュー。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$office_rk_hero_image = office_rk_get( 'hero_image' );
$office_rk_btn_url    = office_rk_get( 'hero_btn_url' );
?>
<section class="hero">
	<div class="hero-grid-bg" aria-hidden="true"></div>
	<div class="hero-accent-orb" aria-hidden="true"></div>

	<?php if ( $office_rk_hero_image ) : ?>
		<div class="hero-skyline" aria-hidden="true">
			<img src="<?php echo esc_url( $office_rk_hero_image ); ?>" alt="" fetchpriority="high" decoding="async">
		</div>
	<?php endif; ?>

	<div class="container hero-inner">
		<?php if ( office_rk_has( 'hero_label' ) ) : ?>
			<p class="hero-label"><?php office_rk_the( 'hero_label' ); ?></p>
		<?php endif; ?>

		<h1 class="hero-title">
			<?php office_rk_the( 'hero_title_1' ); ?><br>
			<span class="accent"><?php office_rk_the( 'hero_title_accent' ); ?></span><?php office_rk_the( 'hero_title_2' ); ?>
		</h1>

		<?php if ( office_rk_has( 'hero_lead_1' ) ) : ?>
			<p class="hero-lead"><?php office_rk_the( 'hero_lead_1' ); ?></p>
		<?php endif; ?>

		<?php if ( office_rk_has( 'hero_lead_2' ) ) : ?>
			<p class="hero-lead"><?php office_rk_the( 'hero_lead_2' ); ?></p>
		<?php endif; ?>

		<?php if ( office_rk_has( 'hero_btn_label' ) && $office_rk_btn_url ) : ?>
			<div class="hero-actions">
				<a href="<?php echo esc_url( office_rk_anchor( $office_rk_btn_url ) ); ?>" class="btn btn-primary">
					<?php office_rk_the( 'hero_btn_label' ); ?> <span class="arrow">&rarr;</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
