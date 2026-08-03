<?php
/**
 * テーマの基本設定。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', [
			'height'      => 40,
			'width'       => 160,
			'flex-height' => true,
			'flex-width'  => true,
		] );
		add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'automatic-feed-links' );

		register_nav_menus( [
			'primary' => __( 'メインナビゲーション', 'office-rk' ),
			'footer'  => __( 'フッターナビゲーション', 'office-rk' ),
		] );

		load_theme_textdomain( 'office-rk', OFFICE_RK_DIR . '/languages' );
	}
);

/**
 * 本テーマは1ページ完結型のため、コメント欄は使用しない。
 */
add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open', '__return_false', 20 );
