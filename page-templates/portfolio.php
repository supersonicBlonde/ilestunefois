<?php
/**
* Template Name: Portfolio
*
* @package ilestunefois
*/

get_header();
?>
<div class="portfolio-content">

	<div id="first-section" class="section limited background-image" style="background:url(<?php echo get_field('background_image_header_standard'); ?>)">

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

	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 6,
		'paged' => $paged
	);

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$portfolio = new WP_Query($args);

	if($portfolio->have_posts() ):
	?>

	<div id="portfolio" class="section limited">

		<?php $terms = get_terms( 'videos-category', array('hide_empty' => true) ); ?>

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


	<style type="text/css">
		.wrapper {
			display: flex;
			align-content: center;
			justify-content: space-around;
			margin-bottom: 3vw;
		}

		iframe {
			width: 30vw;
			height: 16.5vw;
		}
	</style>

	
<script>
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var playerInfoList = [{
  id: 'player1',
  videoId: 'dOy7vPwEtCw'
}, {
  id: 'player2',
  videoId: 'QWtsV50_-p4'
}, {
  id: 'player3',
  videoId: 'y-JqH1M4Ya8'
}, {
  id: 'player4',
  videoId: 'gH7dMBcg-gE'
}, {
  id: 'player5',
  videoId: '7wL9NUZRZ4I'
}, {
  id: 'player6',
  videoId: 'S4R8HTIgHUU'
}];

function onYouTubeIframeAPIReady() {
  if (typeof playerInfoList === 'undefined') return;

  for (var i = 0; i < playerInfoList.length; i++) {
    var curplayer = createPlayer(playerInfoList[i]);
    players[i] = curplayer;
  }
}

var players = new Array();

function createPlayer(playerInfo) {
  return new YT.Player(playerInfo.id, {
  	events: { 
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

function getEvent(event, playerInfo) {       
    /*if(event.data === 0) {            
        alert('done');
    }*/
}

function onPlayerStateChange(event, player) { 
  if(event.data === 0) {            
        console.log(event.target);
        console.log(player);
        let playerid = document.getElementById(player);
        console.log(playerid);
        playerid.style.display = "none";
        
    }
}
</script>
		<div>
		    <button id="stop">Stop All Videos</button>
		</div>
		<div class="wrapper">
		    <div id="player1"></div>
		    <div id="player2"></div>
		    <div id="player3"></div>
		</div>

		<div class="wrapper">
		    <div id="player4"></div>
		    <div id="player5"></div>
		    <div id="player6"></div>
		</div>

	</div>


	<?php endif; ?>

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
	            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
	            'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
	            'add_args'     => false,
	            'add_fragment' => '',
	        ) );
	    ?>
	</div>

</div>


<?php get_footer(); ?>