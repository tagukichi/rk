<?php
/**
 * 固定ページ汎用テンプレート（プライバシーポリシー等）。
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
		<h1><?php the_title(); ?></h1>
		<nav class="breadcrumb" aria-label="<?php esc_attr_e( 'パンくずリスト', 'office-rk' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'ホーム', 'office-rk' ); ?></a>
			<span>/</span><span><?php the_title(); ?></span>
		</nav>
	</div>
</div>

<section class="section">
	<div class="container">
		<div class="entry-content">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();

				wp_link_pages(
					[
						'before' => '<div class="page-links">',
						'after'  => '</div>',
					]
				);
			endwhile;
			?>
		</div>
	</div>
</section>

<?php
get_footer();
