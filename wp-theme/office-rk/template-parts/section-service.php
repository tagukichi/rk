<?php
/**
 * 事業内容（4項目）。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 各項目のアイコン（装飾のため固定）。
 */
$office_rk_service_icons = [
	1 => '<path d="M8 26 28 10l20 16"/><path d="M13 22v24h30V22"/><path d="M23 46V32h10v14"/>',
	2 => '<path d="M8 24 22 12l14 12"/><path d="M12 21v21h20V21"/><circle cx="41" cy="38" r="10"/><path d="M37 34l4 5 4-5M41 39v6M38 42h6"/>',
	3 => '<path d="M10 46h36"/><path d="M14 46V30l10-8 10 6 8-10v28"/><circle cx="24" cy="22" r="2.5"/><circle cx="34" cy="28" r="2.5"/><circle cx="42" cy="18" r="2.5"/>',
	4 => '<rect x="8" y="18" width="40" height="28" rx="3"/><path d="M22 18v-4a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3v4"/><path d="M17 39l7-7 5 4 8-9"/><path d="M33 27h4.5v4.5"/>',
];

$office_rk_svg_allowed = [
	'svg'     => [ 'viewbox' => [], 'fill' => [], 'stroke' => [], 'stroke-width' => [], 'stroke-linecap' => [], 'stroke-linejoin' => [], 'xmlns' => [] ],
	'path'    => [ 'd' => [] ],
	'rect'    => [ 'x' => [], 'y' => [], 'width' => [], 'height' => [], 'rx' => [] ],
	'circle'  => [ 'cx' => [], 'cy' => [], 'r' => [] ],
	'polygon' => [ 'points' => [] ],
];
?>
<section class="section section-sub" id="service">
	<div class="container">
		<div class="section-head is-center reveal">
			<span class="section-label">Our Services</span>
			<h2 class="section-title"><?php esc_html_e( '事業内容', 'office-rk' ); ?></h2>

			<?php if ( office_rk_has( 'service_catch' ) ) : ?>
				<p class="section-catch"><?php office_rk_the( 'service_catch' ); ?></p>
			<?php endif; ?>

			<?php if ( office_rk_has( 'service_lead' ) ) : ?>
				<p class="section-lead"><?php office_rk_the( 'service_lead' ); ?></p>
			<?php endif; ?>
		</div>

		<div class="service-grid">
			<?php
			for ( $office_rk_i = 1; $office_rk_i <= 4; $office_rk_i++ ) :
				$office_rk_title = 'service_' . $office_rk_i . '_title';

				if ( ! office_rk_has( $office_rk_title ) ) {
					continue;
				}

				$office_rk_delay = ( $office_rk_i > 1 ) ? ' reveal-delay-' . ( $office_rk_i - 1 ) : '';
				?>
				<article class="service-card reveal<?php echo esc_attr( $office_rk_delay ); ?>">
					<span class="service-num"><?php echo esc_html( sprintf( '%02d', $office_rk_i ) ); ?></span>

					<div class="service-icon" aria-hidden="true">
						<svg viewBox="0 0 56 56" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<?php echo wp_kses( $office_rk_service_icons[ $office_rk_i ], $office_rk_svg_allowed ); ?>
						</svg>
					</div>

					<h3><?php office_rk_the( $office_rk_title ); ?></h3>

					<?php foreach ( [ 'text1', 'text2' ] as $office_rk_slot ) : ?>
						<?php $office_rk_key = 'service_' . $office_rk_i . '_' . $office_rk_slot; ?>
						<?php if ( office_rk_has( $office_rk_key ) ) : ?>
							<p><?php office_rk_the( $office_rk_key ); ?></p>
						<?php endif; ?>
					<?php endforeach; ?>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
