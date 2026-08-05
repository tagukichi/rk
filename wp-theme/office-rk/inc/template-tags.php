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
 * 表示する値を取得する。
 *
 * 優先順位:
 *   1. ACF（固定ページ「フロントページ」のカスタムフィールド）
 *   2. カスタマイザー（外観 > カスタマイズ）
 *   3. テーマ初期値
 *
 * @param string $key 項目キー。
 * @return string
 */
function office_rk_get( $key ) {
	$acf_value = office_rk_acf_value( $key );

	if ( null !== $acf_value ) {
		return $acf_value;
	}

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
 * サイトロゴを出力する。
 *
 * ヘッダー：カスタムロゴ（未設定時はテキストロゴ）
 * フッター：フッター専用ロゴ（未設定時はテキストロゴ）
 *   ※フッターは背景が濃紺のため、白抜き加工はせず専用画像で差し替える方式にしている。
 *
 * @param string $context 'header' または 'footer'。
 */
function office_rk_site_logo( $context = 'header' ) {
	if ( 'footer' === $context ) {
		$footer_logo = office_rk_get( 'footer_logo' );

		if ( $footer_logo ) {
			printf(
				'<a href="%1$s" class="site-logo"><img src="%2$s" alt="%3$s" class="footer-logo-image" loading="lazy" decoding="async"></a>',
				esc_url( home_url( '/' ) ),
				esc_url( $footer_logo ),
				esc_attr( office_rk_get( 'company_name' ) )
			);
			return;
		}

		// フッターは会社名のみ（「RK」マークは表示しない）。
		office_rk_text_logo( false );
		return;
	}

	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}

	office_rk_text_logo();
}

/**
 * テキストロゴを出力する。
 *
 * @param bool $show_mark 「RK」マークを表示するか（フッターでは非表示）。
 */
function office_rk_text_logo( $show_mark = true ) {
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
		<?php if ( $show_mark ) : ?>
			<span class="logo-mark">RK</span>
		<?php endif; ?>
		<span class="logo-text"><?php echo esc_html( office_rk_get( 'company_name' ) ); ?></span>
	</a>
	<?php
}
