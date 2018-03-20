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


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 

		if ( ( is_single() || ( is_page() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
			echo '<div class="featured-image-commission mw-100 alignleft">';
			echo get_the_post_thumbnail( get_queried_object_id(), 'tascc-featured-image',array('class'=>'mw-100') );
			echo '</div><!-- .single-featured-image-header -->';
		endif;

	?>

	<header class="entry-header">
		<h1>
		<?php
			$cats = get_the_category();
			if(!empty($cats)){
				foreach($cats as $key=>$cat){
					echo '<span class="commission-region"><!--<a href="' . get_term_link($cat) . '">-->'. $cat->name . '<!--</a>--></span><br />';
				}
			}
		?>
		<?php the_title(); ?>
		<?php 
			$position = get_post_custom_values('commission-member-position');
			if(!empty($position)){
				echo '<br /><em>' . $position[0] . '</em>';
			}
		?></h1>
		
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php 
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

	?>
</article><!-- #post-## -->
