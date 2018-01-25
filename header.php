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
<div id="page" class="page-container">



	<header id="masthead" class="site-header" role="banner">

		<div class="header-img">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-bg.jpg" class="header-bg mw-100" />
				<div class="header-logo">
					<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-logo.png" /> -->
				</div>
			</a>
		</div>

		<?php if ( has_nav_menu( 'main' ) ) : ?>
			<?php get_template_part( 'template-parts/main-menu', 'main' ); ?>
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="featured-image-header mw-100">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'tascc-featured-image',array('class'=>'mw-100') );
		echo tascc_custom_header_title();
		echo '</div><!-- .single-featured-image-header -->';
	endif;

	echo tascc_donate_bar();
	?>
