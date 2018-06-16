<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>


<?php 
		$cl = null;
		if(is_home() || is_archive()){
			$cl = 'tascc-news-item';
		}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($cl); ?>>
	
		<?php if (is_single() || is_page()) : ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php else: ?>
				<p class="news-date"><?php the_time('M j Y'); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		
	
	<div class="entry-content">
		<?php if (is_single() || is_page()) : ?>
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
						'after'  => '</div>',
					) );
				?>
		<?php else: ?>
				<?php if ( has_post_thumbnail() ) : ?>
	    				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	        				<?php the_post_thumbnail('thumb',array( 'class'  => 'mw-100 float-left' )); ?>
	    				</a>
				<?php endif; ?>
				<?php the_excerpt(); ?>
		<?php endif; ?>
	</div><!-- .entry-content -->

	<?php 
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"></span>', 'twentyseventeen' )
			),
			'<span class="edit-link">',
			'</span>'
		);

	?>
</article><!-- #post-## -->
