<?php
/**
 * Office RK theme bootstrap.
 *
 * @package office-rk
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'OFFICE_RK_VERSION', '1.1.0' );
define( 'OFFICE_RK_DIR', get_template_directory() );
define( 'OFFICE_RK_URI', get_template_directory_uri() );

require_once OFFICE_RK_DIR . '/inc/setup.php';
require_once OFFICE_RK_DIR . '/inc/enqueue.php';
require_once OFFICE_RK_DIR . '/inc/customizer.php';
require_once OFFICE_RK_DIR . '/inc/acf-fields.php';
require_once OFFICE_RK_DIR . '/inc/template-tags.php';
require_once OFFICE_RK_DIR . '/inc/seo.php';
