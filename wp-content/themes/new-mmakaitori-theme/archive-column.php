<?php
/**
 * Column archive.
 *
 * @package MMA_Kaitori
 */

get_header();
?>
<section class="page-hero">
	<div class="container">
		<h1>コラム</h1>
		<p>廃車・買取に役立つ豆知識をお届けします。</p>
	</div>
</section>

<section class="section">
	<div class="container narrow">
		<?php if ( have_posts() ) : ?>
			<ul class="teaser-list teaser-list--large">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<li>
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y/m/d' ) ); ?></time>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<?php if ( has_excerpt() ) : ?>
							<p><?php echo esc_html( get_the_excerpt() ); ?></p>
						<?php endif; ?>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>コラムは準備中です。</p>
		<?php endif; ?>
	</div>
</section>
<?php
get_footer();
