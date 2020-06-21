<?php
/**
* Template Name: Portfolio
*
* @package ilestunefois
*/

get_header();
?>
<div class="portfolio-content">

	<div id="first-section" class="section limited background-image" style="background-image:url(<?php echo get_field('background_image_header_standard'); ?>)">

	</div>


	<?php
	$title = get_field('main_title_portfolio');
	$paragraphe = get_field('paragraphe_introduction_portfolio');
	?>
	<div id="second-section" class="section limited">
		<div class="container-fluid">
			<div class="row">
				<div class="col-8 offset-4">
					<?php if(!empty($title)): ?>
						<h2><?php echo $title; ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-6 offset-6">
					<?php if(!empty($paragraphe)): ?>
						<p><?php echo $paragraphe; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php

	$playerList = [];

	$args = array(
		'post_type' => 'portfoliovideo',
		'posts_per_page' => 6,
		'paged' => $paged
	);

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$portfolio = new WP_Query($args);

	if($portfolio->have_posts() ):
	?>

	<div id="portfolio">

		<?php $terms = get_terms( 'videos-category', array('hide_empty' => true) ); ?>

		<div class="section limited">

			<div class="container-fluid">
				
				<div class="row">
					
					<div class="col-12 text-right">
						
						<?php if(count($terms) > 0): ?>

							<ul class="videos-categories">
							
							<?php foreach($terms as $term): ?>

								<li><a href=""><?php echo $term->name; ?></a></li>

							<?php endforeach;  ?>

							</ul>

						<?php endif; ?>

					</div>

				</div>

			</div>

		</div>

		<script> let playerInfoList = []; </script>

		<div class="container-fluid">
			
			<div class="videos-container">
				
				<?php 
				$count = 0;

				while($portfolio->have_posts()): $portfolio->the_post(); 

					$id = "player".$count;
					$video_id = get_field('video_id_portfolio_video');
					$playerList[$count]["title"] = get_the_title();
					$playerList[$count]["paragraphe"] = get_field('paragraphe_portfolio_video');
					$playerList[$count]['poster'] = get_field('poster_portfolio_video'); 
					$playerList[$count]['cover'] = get_field('cover_video_portfolio_video');
					?>
					 <script>

					 	playerInfoList.push({id: '<?php echo $id ?>' , videoId: '<?php echo $video_id; ?>'});

				 	 </script>

				  <?php	$count++;



				 endwhile; ?>	


				<div class="section limited">
					<div class="container-fluid">
						<div class="row">	

							<?php  $count = 0; foreach($playerList as $player): ?>

									<?php if($count == 0 || $count == 3): ?><div class="col-6 column"><?php endif; ?>
						 	
										<div class="video-item">
											<div class="embed-container">
												<div id="<?php echo "player".$count; ?>"></div>
												<div class="poster" data-position="<?php echo $count; ?>"><video id="video1" loop="" muted="" playsinline="" poster="<?php echo $player['poster']; ?>"> <source src="<?php echo $player['cover']['url']; ?>" type="video/mp4"> </video></div>
											</div>
											<h3><?php echo $player['title']; ?></h3>
											<p><?php echo $player['paragraphe']; ?></p>
											<div class="post-cat">
											<?php 
												echo ilesunefois_echo_cpt_taxonomies(get_the_ID(), array('videos-category')); 
											?>
											</div>
										</div>

									<?php if($count == 2 || $count == 5): ?></div><?php endif; ?>
					
							<?php $count++; endforeach; ?>

										 <script>
				 	

				 	var tag = document.createElement('script');
					tag.src = "https://www.youtube.com/iframe_api";
					var firstScriptTag = document.getElementsByTagName('script')[0];
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

					var players = new Array();

					function onPlayerReady(event) {
					  var embedCode = event.target.getVideoEmbedCode();
					  event.target.playVideo();
					  if (document.getElementById('embed-code')) {
					    document.getElementById('embed-code').innerHTML = embedCode;
					  }
					}

					function onYouTubeIframeAPIReady() {
					  if (typeof playerInfoList === 'undefined') return;
					
					  for (var i = 0; i < playerInfoList.length; i++) {
					  	console.log(playerInfoList[i]);
					    var curplayer = createPlayer(playerInfoList[i]);
					    console.log(curplayer);
					    players[i] = curplayer;	

					  }
					}


					function createPlayer(playerInfo) {

					  return new YT.Player(playerInfo.id, {
					  	events: { 
					  		'onReady': function(event) {
					  			onPlayerReady(event, playerInfo.id);
					  		},
					    	 'onStateChange': function(event){
					          onPlayerStateChange(event, playerInfo.id);
					        }
					     },

					    videoId: playerInfo.videoId,
					    playerVars: {
					      showinfo: 0,
					    }
					  });
					}


					function onPlayerReady(event, player) { 
						        
							let playerid = document.getElementById(player);
							let poster = playerid.nextElementSibling;
					        poster.style.display = "block";
					        playerid.display = "block";
					    
					}

					function onPlayerStateChange(event, player) { 
					   
					  if(event.data === 0) {            
							let playerid = document.getElementById(player);
							let poster = playerid.nextElementSibling;
					        poster.style.display = "block";
					    }

					}



				 </script>
						</div>
					</div>
				</div>

				<div class="pagination">
			    <?php 
			        echo paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'total'        => $portfolio->max_num_pages,
			            'current'      => max( 1, get_query_var( 'paged' ) ),
			            'format'       => '?paged=%#%',
			            'show_all'     => false,
			            'type'         => 'plain',
			            'end_size'     => 2,
			            'mid_size'     => 1,
			            'prev_next'    => true,
			            'prev_text'    => sprintf( '<i></i> %1$s', __( '', 'text-domain' ) ),
			            'next_text'    => sprintf( '%1$s <i></i>', __( '', 'text-domain' ) ),
			            'add_args'     => false,
			            'add_fragment' => '',
			        ) );
			    ?>
				</div>

		</div><!-- .videos-container -->


		</div><!-- .container-fluid-->


	<?php endif; ?>


</div>


<?php get_footer(); ?>