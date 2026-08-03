<?php
/**
 * メタディスクリプション / OGP の出力。
 * Yoast SEO 等の SEO プラグインが有効な場合は出力しない。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'wp_head',
	function () {
		// SEO プラグインが入っている場合は二重出力を避ける。
		if ( defined( 'WPSEO_VERSION' ) || class_exists( 'RankMath' ) || defined( 'SEOPRESS_VERSION' ) ) {
			return;
		}

		$description = get_bloginfo( 'description' );

		if ( is_front_page() ) {
			$description = wp_strip_all_tags( office_rk_get( 'hero_lead_1' ) . office_rk_get( 'hero_lead_2' ) );
		} elseif ( is_singular() ) {
			$excerpt = wp_strip_all_tags( get_the_excerpt() );
			if ( '' !== $excerpt ) {
				$description = $excerpt;
			}
		}

		$description = mb_substr( trim( $description ), 0, 160 );
		$title       = wp_get_document_title();
		$og_image    = office_rk_get( 'hero_image' );

		if ( is_singular() && has_post_thumbnail() ) {
			$og_image = get_the_post_thumbnail_url( null, 'full' );
		}
		?>
		<meta name="description" content="<?php echo esc_attr( $description ); ?>">
		<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
		<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
		<meta property="og:type" content="<?php echo is_front_page() ? 'website' : 'article'; ?>">
		<meta property="og:url" content="<?php echo esc_url( office_rk_current_url() ); ?>">
		<?php if ( $og_image ) : ?>
			<meta property="og:image" content="<?php echo esc_url( $og_image ); ?>">
			<meta name="twitter:card" content="summary_large_image">
		<?php endif; ?>
		<?php
	},
	5
);

/**
 * 現在の URL を安全に組み立てて返す。
 *
 * @return string
 */
function office_rk_current_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}

	if ( is_singular() ) {
		$permalink = get_permalink();
		if ( $permalink ) {
			return $permalink;
		}
	}

	return home_url( add_query_arg( [] ) );
}
