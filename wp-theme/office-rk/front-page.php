<?php
/**
 * トップページ（1ページ完結）。
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part( 'template-parts/section', 'hero' );
get_template_part( 'template-parts/section', 'about' );
get_template_part( 'template-parts/section', 'service' );
get_template_part( 'template-parts/section', 'works' );
get_template_part( 'template-parts/section', 'company' );
get_template_part( 'template-parts/section', 'contact' );

get_footer();
