<?php echo do_shortcode('[contact-form-7 html_id="ilestunefois-connect-form" title="Connect"]'); ?>

<!-- <form id="ilestunefois-connect-form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">

	<div class="field-container">
		<input type="text" class="field-input" placeholder="<?php echo __('Full Name*' , 'ilestunefois'); ?>" id="name" name="name" required>
		<small class="field-msg error" data-error="invalidName"><?php echo __('Your Name is Required' , 'ilestunefois'); ?></small>
	</div>

	<div class="field-container">
		<input type="email" class="field-input" placeholder="<?php echo __('Email address*', 'ilestunefois') ?>" id="email" name="email" required>
		<small class="field-msg error" data-error="invalidEmail"><?php echo __('The Email address is not valid' , 'ilestunefois'); ?></small>
	</div>

	<div class="field-container">
		<textarea name="message" id="message" class="field-input" placeholder="Your Message" required></textarea>
		<small class="field-msg error" data-error="invalidMessage"><?php echo __('A Message is Required' , 'ilestunefois'); ?></small>
	</div>
	
	<div class="field-container">
		<div>
            <button type="submit" class="btn btn-primary btn-submit"><?php echo __('Send' , 'ilestunefois'); ?></button>
        </div>
		<small class="field-msg js-form-submission"><?php echo __('Submission in process, please wait&hellip;' , 'ilestunefois'); ?></small>
		<small class="field-msg success js-form-success"><?php echo __('Message Successfully submitted, thank you!' , 'ilestunefois'); ?></small>
		<small class="field-msg error js-form-error"><?php echo __('There was a problem with the Contact Form, please try again!' , 'ilestunefois'); ?></small>
	</div>

	<input type="hidden" name="action" value="submit_testimonial">
	<input type="hidden" name="nonce" value="<?php //echo wp_create_nonce("testimonial-nonce") ?>">-->