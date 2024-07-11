<?php if(!empty('text_left') && !empty('text_right')): ?>
	<div class="container my-5">
		<div class="row">
			<div class="col-sm-5 col-12 p-4" style="background: #750D37;color:white;">
				<?php the_field('text_left'); ?>
			</div>
			<div class="col-1"></div>
			<div class="col-sm-5 col-12 p-4" style="background: white;color:#750D37;">
				<?php the_field('text_right'); ?>
			</div>
		</div>
	</div>
<?php endif; ?>