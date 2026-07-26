</main>

<footer class="site-footer">
	<div class="container footer-inner">
		<div class="footer-brand">
			<strong><?php bloginfo( 'name' ); ?></strong>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer', 'bmt-kaitori' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => false,
					'depth'          => 1,
				) );
				?>
			</nav>
		<?php endif; ?>

		<p class="footer-copy">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
