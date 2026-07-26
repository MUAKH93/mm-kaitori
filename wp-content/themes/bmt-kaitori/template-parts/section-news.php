<?php
/**
 * Latest news section.
 *
 * @package BMT_Kaitori
 */

$news_query = new WP_Query( array(
	'posts_per_page' => 3,
	'post_status'    => 'publish',
) );

$posts_page = get_option( 'page_for_posts' );
$news_url   = $posts_page ? get_permalink( $posts_page ) : home_url( '/news/' );
?>

<section class="section section-news" id="news">
	<div class="container">
		<div class="section-heading">
			<h2><span class="section-label-en">NEWS</span><?php echo esc_html( bmt_t( 'news_title' ) ); ?></h2>
			<a class="text-link" href="<?php echo esc_url( $news_url ); ?>"><?php echo esc_html( bmt_t( 'news_view_all' ) ); ?></a>
		</div>

		<?php if ( $news_query->have_posts() ) : ?>
			<div class="news-grid">
				<?php
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
					get_template_part( 'template-parts/content', 'news-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p><?php echo esc_html( bmt_t( 'news_empty' ) ); ?></p>
		<?php endif; ?>
	</div>
</section>
