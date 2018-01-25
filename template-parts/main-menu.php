<?php
/**
 * Displays main menu
 *
 */

?>





		<div class="large-nav main-menu d-none d-md-block d-lg-block d-xl-block">
			<?php wp_nav_menu( array(
				'container'		 => false,
				'theme_location' => 'main',
				'menu_class'	 => 'nav justify-content-center',
				'walker' 		 => new wp_bootstrap_navwalker()
			) ); ?>
		</div>

		


		<div class="small-nav navbar navbar-light d-none d-sm-block d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
	      		<span class="navbar-toggler-icon"></span>
	    	</button>
    	

	    	<div class="collapse" id="navbarToggleExternalContent">
	    		<?php wp_nav_menu( array(
					'container'		 => false,
					'theme_location' => 'main',
					'menu_class'	 => 'nav flex-column',
					'walker' 		 => new wp_bootstrap_navwalker()
				) ); ?>

			</div>
		</div>

    	
