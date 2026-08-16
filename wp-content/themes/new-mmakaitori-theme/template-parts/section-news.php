<?php
/**
 * News + column teasers.
 *
 * @package MMA_Kaitori
 */

$news = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
	)
);

$columns = new WP_Query(
	array(
		'post_type'      => 'column',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
	)
);
?>
<section class="section section-news-columns" id="news">
	<div class="container news-columns-grid">
		<div class="news-block">
			<h2><?php echo esc_html( mma_content( 'news_title' ) ); ?></h2>
			<ul class="teaser-list">
				<?php if ( $news->have_posts() ) : ?>
					<?php while ( $news->have_posts() ) : ?>
						<?php $news->the_post(); ?>
						<li>
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y/m/d' ) ); ?></time>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<li><time>2026/08/11</time><span>ホームページを公開しました</span></li>
				<?php endif; ?>
			</ul>
			<p class="section-more"><a class="text-link" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/blog/' ) ); ?>">お知らせ一覧へ</a></p>
		</div>

		<div class="news-block">
			<h2><?php echo esc_html( mma_content( 'column_title' ) ); ?></h2>
			<ul class="teaser-list">
				<?php if ( $columns->have_posts() ) : ?>
					<?php while ( $columns->have_posts() ) : ?>
						<?php $columns->the_post(); ?>
						<li>
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y/m/d' ) ); ?></time>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<li><time>—</time><span>コラム準備中</span></li>
				<?php endif; ?>
			</ul>
			<p class="section-more"><a class="text-link" href="<?php echo esc_url( get_post_type_archive_link( 'column' ) ); ?>">コラム一覧へ</a></p>
		</div>
	</div>
</section>
