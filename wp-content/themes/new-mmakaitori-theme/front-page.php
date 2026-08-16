<?php
/**
 * Front page — Phase 1 + Phase 2 sections.
 *
 * @package MMA_Kaitori
 */

get_header();

get_template_part( 'template-parts/section', 'hero' );
get_template_part( 'template-parts/section', 'trust' );
get_template_part( 'template-parts/section', 'results' );
get_template_part( 'template-parts/section', 'refund' );
get_template_part( 'template-parts/section', 'refund-calc' );
get_template_part( 'template-parts/section', 'reasons' );
get_template_part( 'template-parts/section', 'worries' );
get_template_part( 'template-parts/section', 'strengths' );
get_template_part( 'template-parts/section', 'flow' );
get_template_part( 'template-parts/section', 'documents' );
get_template_part( 'template-parts/section', 'areas' );
get_template_part( 'template-parts/section', 'faq' );
get_template_part( 'template-parts/section', 'voices' );
get_template_part( 'template-parts/section', 'news' );
get_template_part( 'template-parts/section', 'cancel' );

get_footer();
