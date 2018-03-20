<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


		<div class="header-img">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-bg.jpg?v=2" class="header-bg mw-100" />
				<div class="header-logo">
					<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-logo.png" /> -->
				</div>
			</a>
		</div>

		<?php if ( has_nav_menu( 'main' ) ) : ?>
			<?php get_template_part( 'template-parts/main-menu', 'main' ); ?>
		<?php endif; ?>

<div id="page" class="page-container">



	<header id="masthead" class="site-header" role="banner">



	</header><!-- #masthead -->


