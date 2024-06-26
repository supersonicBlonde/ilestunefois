<?php 
	
	/*
		This is the template for the footer
		
		@package ilestunefois
	*/
	
?>
			<footer class="section limited">
				<div class="menu-footer">
					<div>
						<div class="footer-col-container">
							<div class="col-footer">
								<?php dynamic_sidebar( "sidebar-1" ); ?>
							</div>
							<div class="col-footer">
								<?php dynamic_sidebar( "sidebar-2" ); ?>
							</div>
							<div class="col-footer">
								<?php dynamic_sidebar( "sidebar-3" ); ?>
							</div>
							<div class="col-footer">
								<?php dynamic_sidebar( "sidebar-4" ); ?>

							</div>
							<div class="col-footer">
								<div>
									<svg id="logo" data-name="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.28 194.7"><defs></defs><polygon class="cls-1" points="337.35 35.68 337.35 0 0 0 0 35.68 9.92 35.68 9.92 9.92 327.43 9.92 327.43 35.68 337.35 35.68"/><polygon class="cls-1" points="0 162.12 0 194.7 337.35 194.7 337.35 162.12 327.43 162.12 327.43 184.78 9.92 184.78 9.92 162.12 0 162.12"/><polygon class="cls-1" points="265.53 95.43 299.66 48.06 286.8 48.06 259.1 86.58 231.09 48.06 218.27 48.06 252.66 95.52 214.57 148.47 227.32 148.47 259.09 104.38 291.04 148.47 304.1 148.47 265.53 95.43"/><polygon class="cls-1" points="36.45 130.73 36.45 148.81 46.53 148.81 46.53 130.73 46.53 45.89 36.45 45.89 36.45 130.73"/><polygon class="cls-1" points="174.55 130.73 174.55 148.81 184.63 148.81 184.63 130.73 184.63 45.89 174.55 45.89 174.55 130.73"/><polygon class="cls-1" points="81.26 88.22 81.26 98.3 91.55 98.3 139.82 98.3 139.82 88.22 91.55 88.22 81.26 88.22"/><polygon class="cls-1" points="91.55 138.69 81.26 138.69 81.26 148.81 139.82 148.81 139.82 138.74 91.55 138.74 91.55 138.69"/><polygon class="cls-1" points="81.26 55.97 91.55 55.97 140.24 55.97 140.24 45.89 81.26 45.89 81.26 55.97"/><path class="cls-2" d="M435.82,141.93a5.23,5.23,0,0,0-2.39-4.4l-48.7-31.59a5.22,5.22,0,0,0-5.36-.21,5.25,5.25,0,0,0-2.75,4.61v63.17a5.23,5.23,0,0,0,2.75,4.61,5.18,5.18,0,0,0,5.34-.21l48.72-31.58A5.25,5.25,0,0,0,435.82,141.93Zm-48.7,21.93V120l33.82,21.93Z" transform="translate(-49.54 -44.58)"/></svg>
								</div>
								<div class="contact">

									<?php dynamic_sidebar( "sidebar-5" ); ?>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section limitedext mt-3">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="socials">
									<ul>
										<a href="https://www.youtube.com/channel/UCkD08Da4V6vS1q_BC6-oHrA" target="_blank" class="text-center">
										<li class="youtube">Youtube</li>
										</a>
										<a href="https://www.instagram.com/ilestunefoisproduction/?hl=en" target="_blank" class="text-center"><li class="instagram">Instagram</li></a>
										<a href="https://www.facebook.com/ilestunefois" target="_blank" class="text-center"><li class="facebook">Facebook</li></a>
									<!-- 	<li class="twitter"><a href="https://twitter.com/davidbaudry?lang=en" target="_blank">Twitter</a></li> -->
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section limitedext">
					<div class="container-fluid">
						<div id="credits">
							<div class="row">
								<div class="col-12 text-center">
									<!-- <div class="text-center"><span>DESIGN </span><a href="http://cgwebdesign.org" target="_blank"><img src="<?php echo get_template_directory_uri()."/img/ciaran.svg" ?>"></a>--><span>CODE </span> <a href="http://ninapresotto.com" target="_blank">ninapresotto.com</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div> <!-- .content-container -->
		<div id="overlay"></div>
	</div><!-- .scale -->
	<!-- <div class="pipedriveWebForms" style="display:none" data-pd-webforms="https://pipedrivewebforms.com/form/18d5fb1e12f1aca782d531ea63b922ae7431708"><script src="https://cdn.eu-central-1.pipedriveassets.com/web-form-assets/webforms.min.js"></script></div> -->
	
<?php wp_footer(); ?>
</body>
</html>