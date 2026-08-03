<?php
/**
 * お問い合わせ（フォームなし・メール／電話への導線のみ）。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$office_rk_email = office_rk_get( 'contact_email' );
$office_rk_tel   = office_rk_get( 'contact_tel' );
?>
<section class="cta-band" id="contact">
	<div class="container cta-inner">
		<span class="section-label">Contact</span>

		<h2><?php office_rk_the( 'contact_heading' ); ?></h2>

		<?php foreach ( [ 'contact_text_1', 'contact_text_2', 'contact_text_3' ] as $office_rk_key ) : ?>
			<?php if ( office_rk_has( $office_rk_key ) ) : ?>
				<p><?php office_rk_the( $office_rk_key ); ?></p>
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="cta-actions">
			<?php if ( $office_rk_email ) : ?>
				<p class="cta-contact">
					<?php esc_html_e( 'メール：', 'office-rk' ); ?><a href="mailto:<?php echo esc_attr( $office_rk_email ); ?>"><?php echo esc_html( $office_rk_email ); ?></a>
				</p>
			<?php endif; ?>

			<?php if ( $office_rk_tel ) : ?>
				<p class="cta-tel">
					<?php esc_html_e( 'お電話でのお問い合わせ', 'office-rk' ); ?>&#12288;<a href="<?php echo esc_attr( office_rk_tel_href( $office_rk_tel ) ); ?>"><strong><?php echo esc_html( $office_rk_tel ); ?></strong></a><?php office_rk_the( 'contact_hours' ); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>
