<?php
/**
* Template Name: Home
*
* @package ilestunefois
*/

get_header();
?>
<div class="home-content">

	<div id="first-section" class="section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-6">
					<h2>Consectur adipiscing elit sed do eiusmod</h2>
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
					</p>
					<div class="read-more">
					<a href="">Lorem ipsum dolor sit amet</a>
					</div>
				</div>
				<div class="col-6 text-center position-relative">
					<div class="bg">
						<img src="<?php echo get_template_directory_uri().'/img/illustr.png'; ?>" class="position-absolute">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="second-section">
		<div>
			<div style="display: flex;">
				<div style="width:70%;margin-left: -200px;">
					<div class="slider">
						<div><img src="https://via.placeholder.com/150"></div>
						<div><img src="https://via.placeholder.com/150"></div>
						<div><img src="https://via.placeholder.com/150"></div>
						<div><img src="https://via.placeholder.com/150"></div>
						<div><img src="https://via.placeholder.com/150"></div>
						<div><img src="https://via.placeholder.com/150"></div>
					</div>
				</div>
				<div></div>
			</div>
		</div>
	</div>

</div>


<?php get_footer(); ?>