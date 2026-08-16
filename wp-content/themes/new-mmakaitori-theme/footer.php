<?php
/**
 * Footer.
 *
 * @package MMA_Kaitori
 */

$c = mma_contact();
?>
</main>

<footer class="site-footer">
	<div class="footer-cta" id="contact-cta">
		<div class="container footer-cta-inner">
			<p class="footer-cta-title"><?php echo esc_html( mma_content( 'cta_title', '無料見積もりはこちらから' ) ); ?></p>
			<p class="footer-cta-meta"><?php echo esc_html( $c['hours'] ); ?> · <?php echo esc_html( $c['closed'] ); ?></p>
			<a class="footer-cta-phone" href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>"><?php echo esc_html( $c['phone'] ); ?></a>
			<div class="footer-cta-actions">
				<a class="btn btn-cta-yellow" href="<?php echo esc_url( mma_page_url( 'quote' ) ); ?>">WEBで無料査定</a>
				<a class="btn btn-cta-green" href="<?php echo esc_url( $c['line_url'] ); ?>" target="_blank" rel="noopener noreferrer">LINEで無料査定</a>
			</div>
		</div>
	</div>

	<div class="container footer-main">
		<div class="footer-brand">
			<strong><?php echo esc_html( $c['brand'] ); ?></strong>
			<p><?php echo esc_html( $c['company'] ); ?></p>
			<p><?php echo esc_html( $c['address'] ); ?></p>
			<p>携帯: <a href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>"><?php echo esc_html( $c['phone'] ); ?></a></p>
			<p>TEL/FAX: <?php echo esc_html( $c['phone_landline'] ); ?></p>
			<p>メール: <a href="mailto:<?php echo esc_attr( $c['email'] ); ?>"><?php echo esc_html( $c['email'] ); ?></a></p>
		</div>

		<nav class="footer-nav" aria-label="フッターメニュー">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'menu_class'     => 'footer-menu',
					'fallback_cb'    => 'mma_fallback_menu',
				)
			);
			?>
			<ul class="footer-menu">
				<li><a href="<?php echo esc_url( get_post_type_archive_link( 'area' ) ); ?>">対応エリア</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'sitemap' ) ); ?>">サイトマップ</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'privacy' ) ); ?>">プライバシーポリシー</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'company' ) ); ?>">運営会社</a></li>
				<li><a href="<?php echo esc_url( mma_page_url( 'quote' ) ); ?>">無料査定</a></li>
			</ul>
		</nav>
	</div>

	<div class="footer-copy">
		<div class="container">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $c['company'] ); ?> / <?php echo esc_html( $c['brand'] ); ?></p>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/sticky', 'cta' ); ?>
<?php wp_footer(); ?>
</body>
</html>
