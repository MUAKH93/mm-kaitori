<?php
/**
 * Header template.
 *
 * @package BMT_Kaitori
 */

$contact = bmt_kaitori_contact_info();
$lang    = bmt_kaitori_get_lang();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> lang="<?php echo esc_attr( $lang ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'lang-' . $lang ); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		</div>

		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">
			<span class="nav-toggle-bar"></span>
			<span class="nav-toggle-bar"></span>
			<span class="nav-toggle-bar"></span>
			<span class="screen-reader-text">Menu</span>
		</button>

		<nav id="primary-nav" class="primary-nav" aria-label="Primary">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'fallback_cb'    => 'bmt_kaitori_fallback_menu',
			) );
			?>
		</nav>

		<div class="header-actions">
			<div class="lang-switcher" aria-label="Language">
				<a class="lang-link <?php echo 'ja' === $lang ? 'is-active' : ''; ?>" href="<?php echo esc_url( bmt_kaitori_lang_url( 'ja' ) ); ?>">JP</a>
				<span class="lang-divider">|</span>
				<a class="lang-link <?php echo 'en' === $lang ? 'is-active' : ''; ?>" href="<?php echo esc_url( bmt_kaitori_lang_url( 'en' ) ); ?>">EN</a>
			</div>
			<a class="btn btn-outline btn-sm header-phone" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $contact['phone'] ) ); ?>">
				<?php echo esc_html( $contact['phone'] ); ?>
			</a>
		</div>
	</div>
</header>

<main id="main-content">
