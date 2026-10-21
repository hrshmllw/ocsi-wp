<?php
/**
 * Site header.
 *
 * @package OCSI
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
	<div class="site-header__bar">
		<?php if ( has_custom_logo() ) : ?>
			<div class="wordmark"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<a class="wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<span class="wordmark__mark">OCSI</span>
				<span class="wordmark__name">Optimized Customer Solutions, Inc.</span>
			</a>
		<?php endif; ?>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-navigation">Menu</button>
		<nav id="site-navigation" class="site-nav" aria-label="Primary">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'site-nav__list',
					'fallback_cb'    => 'ocsi_primary_menu_fallback',
					'depth'          => 1,
				)
			);
			?>
			<a class="header-contact" href="<?php echo esc_url( ocsi_page_url( 'contact-us' ) ); ?>">Contact Us</a>
		</nav>
	</div>
</header>
