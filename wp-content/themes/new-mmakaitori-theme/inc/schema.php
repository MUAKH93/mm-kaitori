<?php
/**
 * Structured data + refund calculator helpers.
 *
 * @package MMA_Kaitori
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Annual automobile tax bands (ordinary private passenger, yen).
 *
 * @return array<string, int>
 */
function mma_refund_tax_bands() {
	return array(
		'1000以下'     => 29500,
		'1000超〜1500' => 34500,
		'1500超〜2000' => 39500,
		'2000超〜2500' => 45000,
		'2500超〜3000' => 51000,
		'3000超〜3500' => 58000,
		'3500超〜4000' => 66500,
		'4000超〜4500' => 76500,
		'4500超〜6000' => 88000,
		'6000超'       => 111000,
	);
}

/**
 * Output LocalBusiness + FAQ JSON-LD.
 */
function mma_output_schema() {
	$c = mma_contact();

	$business = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'LocalBusiness',
		'name'        => $c['brand'],
		'legalName'   => $c['company'],
		'url'         => home_url( '/' ),
		'telephone'   => $c['phone'],
		'email'       => $c['email'],
		'address'     => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => '長尾1370-4',
			'addressLocality' => '飯塚市',
			'addressRegion'   => '福岡県',
			'postalCode'      => '820-0701',
			'addressCountry'  => 'JP',
		),
		'openingHours'=> 'Mo-Su 00:00-23:59',
		'priceRange'  => '¥¥',
		'description' => '中古車・廃車・重機の買取・販売。全国対応・お客様負担0円の無料査定。',
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";

	if ( is_front_page() || is_page_template( 'page-templates/page-faq.php' ) ) {
		$faqs = mma_faq_items();
		if ( $faqs ) {
			$entities = array();
			foreach ( $faqs as $faq ) {
				if ( empty( $faq['q'] ) || empty( $faq['a'] ) ) {
					continue;
				}
				$entities[] = array(
					'@type'          => 'Question',
					'name'           => $faq['q'],
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $faq['a'],
					),
				);
			}
			if ( $entities ) {
				$faq_schema = array(
					'@context'   => 'https://schema.org',
					'@type'      => 'FAQPage',
					'mainEntity' => $entities,
				);
				echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
			}
		}
	}

	if ( is_singular( 'area' ) ) {
		$pref = mma_area_pref_name();
		$service = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => $pref . 'の廃車買取',
			'provider'    => array(
				'@type' => 'LocalBusiness',
				'name'  => $c['brand'],
			),
			'areaServed'  => $pref,
			'description' => get_the_excerpt() ?: ( $pref . 'の廃車・不動車買取。全国対応・負担0円。' ),
			'url'         => get_permalink(),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $service, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'mma_output_schema', 20 );
