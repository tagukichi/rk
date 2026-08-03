<?php
/**
 * テンプレートから使うヘルパー関数。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 全項目の初期値を一次元配列で返す（内部キャッシュ付き）。
 *
 * @return array<string, string>
 */
function office_rk_defaults() {
	static $defaults = null;

	if ( null !== $defaults ) {
		return $defaults;
	}

	$defaults = [];
	foreach ( office_rk_customizer_map() as $section ) {
		foreach ( $section['fields'] as $key => $field ) {
			$defaults[ $key ] = ( 'image' === $field['type'] )
				? office_rk_default_image_url( $field['default'] )
				: $field['default'];
		}
	}

	return $defaults;
}

/**
 * カスタマイザーの値を取得する（未設定なら初期値）。
 *
 * @param string $key 項目キー。
 * @return string
 */
function office_rk_get( $key ) {
	$defaults = office_rk_defaults();
	$default  = $defaults[ $key ] ?? '';

	return (string) get_theme_mod( $key, $default );
}

/**
 * テキストを出力する（改行タグなど限定 HTML を許可）。
 *
 * @param string $key 項目キー。
 */
function office_rk_the( $key ) {
	echo wp_kses( office_rk_get( $key ), office_rk_allowed_html() );
}

/**
 * 値が空でないか判定する。
 *
 * @param string $key 項目キー。
 * @return bool
 */
function office_rk_has( $key ) {
	return '' !== trim( wp_strip_all_tags( office_rk_get( $key ) ) );
}

/**
 * 電話番号を tel: リンク用に整形する。
 *
 * @param string $tel 電話番号。
 * @return string
 */
function office_rk_tel_href( $tel ) {
	return 'tel:' . preg_replace( '/[^0-9+]/', '', $tel );
}

/**
 * ページ内アンカーのリンク先を返す。
 * トップページ以外からはトップページ + アンカーへ遷移させる。
 *
 * @param string $anchor 例: '#about'
 * @return string
 */
function office_rk_anchor( $anchor ) {
	// '#' 始まり以外（外部URL・固定ページURL等）はそのまま返す。
	if ( '' === $anchor || '#' !== substr( $anchor, 0, 1 ) ) {
		return $anchor;
	}

	if ( is_front_page() ) {
		return $anchor;
	}

	return home_url( '/' ) . $anchor;
}

/**
 * ナビゲーションを出力する。
 * メニュー未設定時は固定のアンカーリンクを表示する。
 */
function office_rk_nav_menu() {
	if ( has_nav_menu( 'primary' ) ) {
		wp_nav_menu(
			[
				'theme_location' => 'primary',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => false,
			]
		);
		return;
	}

	office_rk_nav_fallback();
}

/**
 * メニュー未設定時の既定ナビゲーション。
 */
function office_rk_nav_fallback() {
	$items = [
		'#about'   => __( '私たちについて', 'office-rk' ),
		'#service' => __( '事業内容', 'office-rk' ),
		'#works'   => __( '実績事例', 'office-rk' ),
		'#company' => __( '会社概要', 'office-rk' ),
	];

	echo '<ul>';
	foreach ( $items as $anchor => $label ) {
		printf(
			'<li><a href="%1$s">%2$s</a></li>',
			esc_url( office_rk_anchor( $anchor ) ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * フッターナビを出力する。
 * メニュー未設定時は既定の2カラム（Menu / Company）を表示する。
 */
function office_rk_footer_nav() {
	if ( has_nav_menu( 'footer' ) ) {
		echo '<div class="footer-nav-col">';
		wp_nav_menu(
			[
				'theme_location' => 'footer',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => false,
			]
		);
		echo '</div>';
		return;
	}

	$columns = [
		'Menu'    => [
			'#about'   => __( '私たちについて', 'office-rk' ),
			'#service' => __( '事業内容', 'office-rk' ),
			'#works'   => __( '実績事例', 'office-rk' ),
		],
		'Company' => [
			'#company' => __( '会社概要', 'office-rk' ),
		],
	];

	foreach ( $columns as $heading => $items ) {
		echo '<div class="footer-nav-col">';
		printf( '<h4>%s</h4>', esc_html( $heading ) );
		echo '<ul>';
		foreach ( $items as $anchor => $label ) {
			printf(
				'<li><a href="%1$s">%2$s</a></li>',
				esc_url( office_rk_anchor( $anchor ) ),
				esc_html( $label )
			);
		}
		echo '</ul>';
		echo '</div>';
	}
}

/**
 * サイトロゴ（カスタムロゴ or テキスト）を出力する。
 */
function office_rk_site_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
		<span class="logo-mark">RK</span>
		<span class="logo-text"><?php echo esc_html( office_rk_get( 'company_name' ) ); ?></span>
	</a>
	<?php
}
