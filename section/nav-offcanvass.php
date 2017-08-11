 <?php /* this is the menu for mobile only */?> 
 <nav id="main-navmenu-offcanvass" class="navbar" role="navigation">
	<?php
	    wp_nav_menu( array(	        
	        'theme_location'    => 'main', 
	        'menu'				=> 'offcanvass-main',	        
	        'container'         => 'div',
	        'container_class'   => 'collapse in navbar-collapse',			
	        'menu_class'        => 'nav navbar-nav',
	        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	        'walker'            => new wp_bootstrap_navwalker(),
	    ));
		
		wp_nav_menu( array(
			'theme_location' 	=> 'top',
			'menu'				=> 'offcanvass-top',		
			'container'         => 'div',
	        'container_class'   => 'collapse in navbar-collapse',			
	        'menu_class'        => 'nav navbar-nav',
	        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	        'walker'            => new wp_bootstrap_navwalker(),
		)); 
	?>
</nav>