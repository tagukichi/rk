<?php
/**
 * 共通フッター。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$office_rk_footer_tel   = office_rk_get( 'footer_tel' );
$office_rk_footer_fax   = office_rk_get( 'footer_fax' );
$office_rk_footer_email = office_rk_get( 'footer_email' );
?>
</main>

<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div class="footer-brand">
				<?php office_rk_site_logo(); ?>
				<address>
					<?php office_rk_the( 'footer_address_1' ); ?><br>
					<?php office_rk_the( 'footer_address_2' ); ?><br>
					<?php if ( $office_rk_footer_tel ) : ?>
						TEL: <?php echo esc_html( $office_rk_footer_tel ); ?>
					<?php endif; ?>
					<?php if ( $office_rk_footer_fax ) : ?>
						&#12288;FAX: <?php echo esc_html( $office_rk_footer_fax ); ?>
					<?php endif; ?>
					<?php if ( $office_rk_footer_email ) : ?>
						&#12288;MAIL: <a href="mailto:<?php echo esc_attr( $office_rk_footer_email ); ?>"><?php echo esc_html( $office_rk_footer_email ); ?></a>
					<?php endif; ?>
				</address>
			</div>

			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'フッターナビゲーション', 'office-rk' ); ?>">
				<?php office_rk_footer_nav(); ?>
			</nav>
		</div>

		<div class="footer-bottom">
			<small><?php office_rk_the( 'footer_copyright' ); ?></small>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
