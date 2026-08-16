<?php
/**
 * Homepage areas teaser (Kyushu-first + nationwide link).
 *
 * @package MMA_Kaitori
 */

$kyushu = new WP_Query(
	array(
		'post_type'      => 'area',
		'posts_per_page' => 8,
		'post_status'    => 'publish',
		'meta_key'       => '_mma_region',
		'meta_value'     => 'kyushu',
		'orderby'        => 'title',
		'order'          => 'ASC',
	)
);
?>
<section class="section section-areas" id="areas">
	<div class="container">
		<h2>対応エリア</h2>
		<p class="section-lead">九州を中心に、日本全国どこでもお引き取り対応。まずはお近くのエリアページをご覧ください。</p>

		<?php if ( $kyushu->have_posts() ) : ?>
			<ul class="area-pref-list area-pref-list--home">
				<?php while ( $kyushu->have_posts() ) : ?>
					<?php $kyushu->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php echo esc_html( mma_area_pref_name() ); ?></a></li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		<?php endif; ?>

		<p class="section-more">
			<a class="btn btn-outline" href="<?php echo esc_url( get_post_type_archive_link( 'area' ) ); ?>">47都道府県の対応地域一覧</a>
		</p>
	</div>
</section>
