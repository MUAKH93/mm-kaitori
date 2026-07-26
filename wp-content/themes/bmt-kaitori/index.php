<?php
/**
 * Default index / news archive.
 *
 * @package BMT_Kaitori
 */

get_header();
?>

<section class="section page-header">
	<div class="container">
		<h1><span class="section-label-en">NEWS</span>お知らせ</h1>
	</div>
</section>

<section class="section">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="news-list">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'news-card' );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>お知らせはまだありません。</p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
