<?php
/**
 * Area archive — 対応地域一覧.
 *
 * @package MMA_Kaitori
 */

get_header();

$regions = mma_area_regions();
$grouped = mma_areas_by_region();
?>
<section class="page-hero">
	<div class="container">
		<h1>対応地域一覧</h1>
		<p>年中無休で全国対応。ご自宅・修理工場など指定場所での引き取りも可能です（一部離島を除く）。</p>
	</div>
</section>

<section class="section section-area-index">
	<div class="container">
		<ul class="area-promise">
			<li>全国どこでもお引き取り対応</li>
			<li>お客様負担0円（レッカー・手続き込み）</li>
			<li>電話・WEB・LINEで無料査定</li>
			<li>廃車手続きも代行可能</li>
		</ul>

		<?php foreach ( $regions as $key => $label ) : ?>
			<?php if ( empty( $grouped[ $key ] ) ) : ?>
				<?php continue; ?>
			<?php endif; ?>
			<div class="area-region-block" id="region-<?php echo esc_attr( $key ); ?>">
				<h2><?php echo esc_html( $label ); ?></h2>
				<ul class="area-pref-list">
					<?php foreach ( $grouped[ $key ] as $area ) : ?>
						<li>
							<a href="<?php echo esc_url( get_permalink( $area ) ); ?>">
								<?php echo esc_html( mma_area_pref_name( $area->ID ) ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<?php
get_footer();
