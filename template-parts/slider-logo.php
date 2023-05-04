<?php
$slides = [];
$slides_second_set = [];
$count = count(get_field('logos'));
if(have_rows('logos')): 
;
	while(have_rows('logos')): the_row(); 
		$image = get_sub_field('logo_');
		$size = 'thumbnail'; 
		if( $image ):
			$slides[] = wp_get_attachment_image_url( $image, $size );
		endif; 
	 endwhile; wp_reset_postdata();
 endif; 
$slides_second_set = $slides;

$scroll_iterations = $count;

if(have_rows('logos')): 
?>
<style>
  :root {
    --scroll-iterations: <?php echo $scroll_iterations; ?>;
  }
</style>
<div id="logos-slider-container">
  <div class="slider">
    <div class="slide-track">
      <?php foreach($slides as $slide): ?>
        <div class="slide">
          <img class="skip-lazy noresp" src="<?php echo $slide; ?>" alt="">
        </div>
      <?php	endforeach; ?>
      <?php foreach($slides_second_set as $slide): ?>
        <div class="slide">
          <img class="skip-lazy noresp" src="<?php echo $slide; ?>" alt="">
        </div>
      <?php	endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>