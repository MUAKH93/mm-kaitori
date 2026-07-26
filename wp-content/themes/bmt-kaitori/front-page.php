<?php
/**
 * Front page template.
 *
 * @package BMT_Kaitori
 */

get_header();

get_template_part( 'template-parts/section', 'hero' );
get_template_part( 'template-parts/section', 'news' );
get_template_part( 'template-parts/section', 'strengths' );
get_template_part( 'template-parts/section', 'flow' );
get_template_part( 'template-parts/section', 'faq' );
get_template_part( 'template-parts/section', 'about' );
get_template_part( 'template-parts/section', 'outline' );
get_template_part( 'template-parts/section', 'map' );
get_template_part( 'template-parts/section', 'quote-form' );
get_template_part( 'template-parts/section', 'contact' );

get_footer();
