<?php

get_header();
?>
<div class="portfolio-content page-content">

	<?php

	$playerList = [];

	

	if(have_posts() ):
	?>

	<div id="portfolio">

		<?php $terms = get_terms( 'videos-category', array('hide_empty' => true) ); ?>
	
		<div class="section limited" id="cat-list">

			<div class="container-fluid" >
				<div class="row">
					
					<div class="col-12 text-right">
						
						<?php if(count($terms) > 0): ?>

							<ul class="videos-categories">

								<li><a href="/portfolio">Tous nos films</a></li>
							
							<?php foreach($terms as $term): ?>

								<li><a href="/videos-category/<?php echo $term->slug ;?>"><?php echo $term->name; ?></a></li>

							<?php endforeach;  ?>

							</ul>

						<?php endif; ?>

					</div><!-- .col-12 container-cat-list -->

				</div>

			</div><!-- .container-fluid -->

		</div><!-- #cat-list -->
		
		<script> let playerInfoList = []; </script>

		<div class="container-fluid">
			
			<div class="videos-container">
				
				<?php 

				// creating the array of posts in the loop
				$count = 0;

				while(have_posts()): the_post(); 

					$id = "player".$count;
					$video_id = get_field('video_id_portfolio_video');
					$playerList[$count]["title"] = get_the_title();
					$playerList[$count]["paragraphe"] = get_field('paragraphe_portfolio_video', get_the_ID());
					$playerList[$count]['poster'] = get_field('poster_portfolio_video' , get_the_ID()); 
					$playerList[$count]['cover'] = get_field('cover_video_portfolio_video' , get_the_ID());
					?>
					<script>
						//transfer the videos id in a js array for Youtube API
						playerInfoList.push({id: '<?php echo $id ?>' , videoId: '<?php echo $video_id; ?>'});
					</script>

				  <?php	$count++;



				 endwhile; 
				 /*********************************/
				?>	

				<div class="section limited">
					<div class="container-fluid">
						<div class="row" id="videos-list">	

							<?php  
							// Display the videos	
							$count = 0; 

							foreach($playerList as $player): ?>

								<?php if($count == 0 || $count == 3): ?><div class="col-md-6 col-12 column"><?php endif; ?>
				 	
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
									</div><!-- .video-item -->

								<?php if($count == 2 || $count == 5): ?></div><!-- .column --><?php endif; ?>
			
							<?php $count++; endforeach; 
							/*************************************/
							?>

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

						</div><!-- #videos-list -->
					</div><!-- .container-fluid -->

					<div class="pagination">
			    <?php 
			    	global $wp_query;
			       echo paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'total'        => $wp_query->max_num_pages,
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
				</div><!-- .pagination -->
				</div><!-- .section -->

				

			</div><!-- .videos-container -->


		</div><!-- .container-fluid-->


	<?php endif; ?>

	</div><!-- #portfolio -->

<?php get_footer(); ?>

