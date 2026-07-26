<?php
/**
 * Location / map section.
 *
 * @package BMT_Kaitori
 */

$location = bmt_kaitori_location_info();
?>

<section class="section section-map" id="access">
	<div class="container">
		<h2><span class="section-label-en">ACCESS</span><?php echo esc_html( bmt_t( 'map_title' ) ); ?></h2>

		<div class="map-grid">
			<div class="map-info">
				<h3><?php echo esc_html( bmt_t( 'hero_title' ) ); ?></h3>
				<p class="map-address">
					<strong>〒<?php echo esc_html( preg_replace( '/^〒\s*/', '', $location['address'] ) ); ?></strong>
				</p>
				<p class="map-actions">
					<a class="btn btn-outline btn-sm" href="<?php echo esc_url( $location['maps_url'] ); ?>" target="_blank" rel="noopener noreferrer">
						<?php echo esc_html( bmt_t( 'map_open' ) ); ?>
					</a>
				</p>
			</div>

			<div class="map-embed-wrap">
				<iframe
					class="map-embed"
					src="<?php echo esc_url( $location['embed_url'] ); ?>"
					width="600"
					height="450"
					style="border:0;"
					allowfullscreen=""
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"
					title="MMA Trading location map"
				></iframe>
			</div>
		</div>
	</div>
</section>
