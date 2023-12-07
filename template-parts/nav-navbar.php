<nav class="navbar navbar-expand-lg navbar-dark" id="navbarNav-container">
	
	<div class="connect-mobile"><i class="fi flaticon-send"></i></div>
	
	<a class="navbar-brand" href="/"><svg id="logo" data-name="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.28 194.7"><defs></defs><polygon class="cls-1" points="337.35 35.68 337.35 0 0 0 0 35.68 9.92 35.68 9.92 9.92 327.43 9.92 327.43 35.68 337.35 35.68"/><polygon class="cls-1" points="0 162.12 0 194.7 337.35 194.7 337.35 162.12 327.43 162.12 327.43 184.78 9.92 184.78 9.92 162.12 0 162.12"/><polygon class="cls-1" points="265.53 95.43 299.66 48.06 286.8 48.06 259.1 86.58 231.09 48.06 218.27 48.06 252.66 95.52 214.57 148.47 227.32 148.47 259.09 104.38 291.04 148.47 304.1 148.47 265.53 95.43"/><polygon class="cls-1" points="36.45 130.73 36.45 148.81 46.53 148.81 46.53 130.73 46.53 45.89 36.45 45.89 36.45 130.73"/><polygon class="cls-1" points="174.55 130.73 174.55 148.81 184.63 148.81 184.63 130.73 184.63 45.89 174.55 45.89 174.55 130.73"/><polygon class="cls-1" points="81.26 88.22 81.26 98.3 91.55 98.3 139.82 98.3 139.82 88.22 91.55 88.22 81.26 88.22"/><polygon class="cls-1" points="91.55 138.69 81.26 138.69 81.26 148.81 139.82 148.81 139.82 138.74 91.55 138.74 91.55 138.69"/><polygon class="cls-1" points="81.26 55.97 91.55 55.97 140.24 55.97 140.24 45.89 81.26 45.89 81.26 55.97"/><path class="cls-2" d="M435.82,141.93a5.23,5.23,0,0,0-2.39-4.4l-48.7-31.59a5.22,5.22,0,0,0-5.36-.21,5.25,5.25,0,0,0-2.75,4.61v63.17a5.23,5.23,0,0,0,2.75,4.61,5.18,5.18,0,0,0,5.34-.21l48.72-31.58A5.25,5.25,0,0,0,435.82,141.93Zm-48.7,21.93V120l33.82,21.93Z" transform="translate(-49.54 -44.58)"/></svg>
	<div class="sub-logo d-none d-lg-block">IL EST UNE FOIS</div>
</a>
	
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<i class="fi flaticon-text-edit"></i>
	</button>
	
	<div class="collapse navbar-collapse navbar-ilestunefois" id="navbarNav">
		<?php wp_nav_menu( array(
		'theme_location'  => 'primary',
		'container'       => false,
		'menu_class'      => 'navbar-nav ml-lg-auto menu-main',
		'walker'          => new wp_bootstrap_navwalker(),
		) ); ?>
	</div>

</nav>