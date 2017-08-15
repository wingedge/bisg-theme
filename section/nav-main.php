 <nav id="main-navmenu" class="navbar navbar navbar-top" role="navigation">
  <div class="container"> 
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    
    
	<?php
	    wp_nav_menu( array(
	        'menu'              => 'main',
	        'theme_location'    => 'main',                    
	        'container'         => 'div',
	        'container_class'   => 'collapse navbar-collapse',
			'container_id'      => 'main-navbar-collapse',
	        'menu_class'        => 'nav navbar-nav')
	    );
	?>
   
  </div>
</nav> 