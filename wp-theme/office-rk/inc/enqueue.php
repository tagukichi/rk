<?php
/**
 * CSS / JS の読み込み。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_enqueue_scripts',
	function () {
		// Google Fonts（静的版と同じ Noto Sans JP + Inter）。
		wp_enqueue_style(
			'office-rk-fonts',
			'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Noto+Sans+JP:wght@400;500;700&display=swap',
			[],
			null
		);

		wp_enqueue_style(
			'office-rk-style',
			OFFICE_RK_URI . '/assets/css/style.css',
			[ 'office-rk-fonts' ],
			OFFICE_RK_VERSION
		);

		wp_enqueue_script(
			'office-rk-script',
			OFFICE_RK_URI . '/assets/js/main.js',
			[],
			OFFICE_RK_VERSION,
			true
		);
	}
);

/**
 * Google Fonts の事前接続（表示速度対策）。
 */
add_filter(
	'wp_resource_hints',
	function ( $urls, $relation_type ) {
		if ( 'preconnect' === $relation_type ) {
			$urls[] = [
				'href'        => 'https://fonts.gstatic.com',
				'crossorigin' => 'anonymous',
			];
		}
		return $urls;
	},
	10,
	2
);
