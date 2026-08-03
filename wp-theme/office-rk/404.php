<?php
/**
 * 404 ページ。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="page-hero">
	<div class="hero-grid-bg" aria-hidden="true"></div>
	<div class="container page-hero-inner">
		<span class="page-label">404</span>
		<h1><?php esc_html_e( 'ページが見つかりません', 'office-rk' ); ?></h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<p style="text-align:center;">
			<?php esc_html_e( 'お探しのページは削除されたか、URLが変更された可能性があります。', 'office-rk' ); ?>
		</p>
		<div class="section-more">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
				<?php esc_html_e( 'トップページへ', 'office-rk' ); ?> <span class="arrow">&rarr;</span>
			</a>
		</div>
	</div>
</section>

<?php
get_footer();
