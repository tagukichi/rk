<?php
/**
 * 会社概要。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$office_rk_rows = [
	'company_name'    => __( '会社名', 'office-rk' ),
	'company_ceo'     => __( '代表者', 'office-rk' ),
	'company_address' => __( '所在地', 'office-rk' ),
	'company_tel'     => __( '電話番号', 'office-rk' ),
	'company_founded' => __( '設立', 'office-rk' ),
	'company_biz'     => __( '事業内容', 'office-rk' ),
	'company_license' => __( '宅地建物取引業免許', 'office-rk' ),
];
?>
<section class="section section-sub" id="company">
	<div class="container">
		<div class="section-head is-center reveal">
			<span class="section-label">Company</span>
			<h2 class="section-title"><?php esc_html_e( '会社概要', 'office-rk' ); ?></h2>
		</div>

		<table class="company-table reveal">
			<tbody>
				<?php foreach ( $office_rk_rows as $office_rk_key => $office_rk_label ) : ?>
					<?php if ( ! office_rk_has( $office_rk_key ) ) { continue; } ?>
					<tr>
						<th><?php echo esc_html( $office_rk_label ); ?></th>
						<td><?php office_rk_the( $office_rk_key ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
