<?php
/**
 * フォールバックテンプレート（必須）。
 *
 * 本テーマは1ページ完結型のため、投稿一覧は基本的に使用しない。
 * 万一このテンプレートが呼ばれた場合は、コンテンツがあれば表示し、
 * なければトップページへの導線を出す。
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
		<h1>
			<?php
			if ( is_search() ) {
				/* translators: %s: 検索キーワード */
				printf( esc_html__( '「%s」の検索結果', 'office-rk' ), esc_html( get_search_query() ) );
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				esc_html_e( '記事一覧', 'office-rk' );
			}
			?>
		</h1>
	</div>
</div>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="works-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article <?php post_class( 'work-card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="work-thumb">
								<?php the_post_thumbnail( 'large', [ 'loading' => 'lazy', 'decoding' => 'async' ] ); ?>
							</div>
						<?php endif; ?>
						<div class="work-body">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						</div>
					</article>
					<?php
				endwhile;
				?>
			</div>

			<div class="section-more">
				<?php the_posts_pagination(); ?>
			</div>
		<?php else : ?>
			<p style="text-align:center;"><?php esc_html_e( '表示できるコンテンツがありません。', 'office-rk' ); ?></p>
			<div class="section-more">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
					<?php esc_html_e( 'トップページへ', 'office-rk' ); ?> <span class="arrow">&rarr;</span>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
