<?php
/**
 * MMA Kaitori theme functions.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MMA_KAITORI_VERSION', '1.4.5' );
define( 'MMA_KAITORI_DIR', get_template_directory() );
define( 'MMA_KAITORI_URI', get_template_directory_uri() );

require MMA_KAITORI_DIR . '/inc/helpers.php';
require MMA_KAITORI_DIR . '/inc/admin-content.php';
require MMA_KAITORI_DIR . '/inc/content-data.php';
require MMA_KAITORI_DIR . '/inc/customizer.php';
require MMA_KAITORI_DIR . '/inc/forms.php';
require MMA_KAITORI_DIR . '/inc/cpt.php';
require MMA_KAITORI_DIR . '/inc/areas.php';
require MMA_KAITORI_DIR . '/inc/schema.php';
require MMA_KAITORI_DIR . '/inc/setup.php';
