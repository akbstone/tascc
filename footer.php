<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		
		<?php
		$queryObject = new WP_Query( 'post_type=events&posts_per_page=1' );
		// The Loop!
		if ($queryObject->have_posts()) {
		    ?>
		    <div class="highlight-bg-1 coming-event">
		    <?php
		    while ($queryObject->have_posts()) {
		        $queryObject->the_post();
		        ?>
		        <a href="<?php the_permalink(); ?>">
		        <h4><?php the_title(); ?></h4>
		        <?php the_excerpt(); ?>
		        </a>
		    <?php
		    }
		    ?>
		    </div>
		    <?php
		}
		?>
		


		</div><!-- #content -->

		<footer id="colophon" class="site-footer highlight-bg-2" role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 logo-block footer-block">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-logo.png" class="footer-logo mw-100" />
						</a>
						&copy; <?php echo date('Y'); ?>
					</div>
					<div class="col-lg-4 contact-block footer-block">
						<h4>Contact</h4>
						<p>
							PO Box 142<br />
							Old Harbor, AK 99643<br />
							Phone: 907-286-2377 or<br />
							Toll Free: 800.474.4362 (Alaska only)<br />
							Fax: 888.409.0477<br />
							<a href="mailt:tassc.wm@seaotter-sealion.org">tassc.wm@seaotter-sealion.org</a>
						</p>
					</div>
					<div class="col-lg-4 mission-block footer-block">
						<h4>Mission</h4>	
						<p>To develop and protect Alaska Natives’ rights in Sea Otter and Steller Sea Lion customary and traditional uses through comanagement, conservation, research, education and artistic development.</p>

					</div>

				</div>
			</div>
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
    	jQuery(".sticky").sticky({topSpacing:0});
  	});
</script>

</body>
</html>
