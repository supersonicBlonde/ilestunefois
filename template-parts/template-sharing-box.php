<?php 
/* Social Share Buttons template for Wordpress
 * By Daan van den Bergh 
 */ 

?>

<div class="gk-social-buttons">
	<ul>
		<li>          
			<a class="icon-twitter" href="http://twitter.com/share?text=<?php echo get_the_title();?>&url=<?php echo get_the_permalink();?>"
	    onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
	    	<i class="fi flaticon-twitter"></i>
		</a>
		</li>   
	    <li>
	     	<a class="icon-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink();?>"
	     onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
	    	<i class="fi flaticon-facebook"></i>
		</a>
		</li>
		<li>
			<a class="icon-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>"
	     onclick="window.open(this.href, 'linkedin-share','width=580,height=296');return false;">
	    	<i class="fi flaticon-linkedin"></i>
		</a>
		</li>
	</ul>
</div>