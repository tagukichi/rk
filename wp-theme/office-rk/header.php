<?php
/**
 * 共通ヘッダー。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'メインコンテンツへスキップ', 'office-rk' ); ?></a>

<header class="site-header">
	<div class="header-inner">
		<?php office_rk_site_logo(); ?>

		<button class="nav-toggle" type="button" aria-label="<?php esc_attr_e( 'メニューを開く', 'office-rk' ); ?>" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>

		<nav class="global-nav" aria-label="<?php esc_attr_e( 'グローバルナビゲーション', 'office-rk' ); ?>">
			<?php office_rk_nav_menu(); ?>
		</nav>
	</div>
</header>

<main id="main-content">
