<?php
/**
 * Header.
 *
 * @package MMA_Kaitori
 */

$c = mma_contact();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> lang="ja">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main-content">本文へスキップ</a>

<header class="site-header">
	<div class="header-top">
		<div class="container header-top-inner">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php endif; ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $c['brand'] ); ?></a>
			</div>

			<div class="header-actions">
				<a class="header-phone" href="<?php echo esc_url( mma_tel_href( $c['phone'] ) ); ?>">
					<span class="header-phone__num"><?php echo esc_html( $c['phone'] ); ?></span>
					<span class="header-phone__meta"><?php echo esc_html( $c['hours'] ); ?> · <?php echo esc_html( $c['closed'] ); ?></span>
				</a>
				<a class="btn btn-cta-yellow" href="<?php echo esc_url( mma_page_url( 'quote', 'quote' ) ); ?>">WEBで査定(無料)</a>
				<a class="btn btn-cta-green" href="<?php echo esc_url( $c['line_url'] ); ?>" target="_blank" rel="noopener noreferrer">LINEで査定(無料)</a>
			</div>

			<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="メニューを開く">
				<span class="nav-toggle-bars" aria-hidden="true">
					<span></span><span></span><span></span>
				</span>
			</button>
		</div>
	</div>

	<nav id="primary-nav" class="primary-nav" aria-label="メインメニュー">
		<div class="container">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'menu',
					'fallback_cb'    => 'mma_fallback_menu',
				)
			);
			?>
		</div>
	</nav>
</header>

<main id="main-content" tabindex="-1">
