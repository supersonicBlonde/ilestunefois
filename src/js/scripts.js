jQuery('.testimonial-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  appendArrows: jQuery('#slider-section')
});

 
let poster = document.querySelectorAll(".poster");

poster.forEach(function (elem) {



	 elem.addEventListener("mouseover", function(event) {
       let video = event.target.querySelector('video');
		if(video.paused) {
			video.play();
		}
    }, false);

	 elem.addEventListener("mouseout", function(event) {
       let video = event.target.querySelector('video');

			video.load();
			video.currentTime = 0;

    }, false);

	elem.addEventListener("click", function(event) {
       let video = event.target.querySelector('video');
        elem.style.display = 'none';
		let embed = elem.previousElementSibling;
		embed.style.display = "block";
		let iframe = embed.querySelector('iframe');
		 iframe.src += "&autoplay=1";
    	event.preventDefault();

    }, false);
	
});

/*for (let i = 0; i < poster.length; i++) {
     poster[i].addEventListener("mouseover", function(event) {
       console.log(event.target.querySelector('video'))
     });
 }
*/


/*function playPause() { 
  if (myVideo.paused) 
    myVideo.play(); 
  else 
    myVideo.pause(); 
} 

function makeBig() { 
    myVideo.width = 560; 
} 

function makeSmall() { 
    myVideo.width = 320; 
} 

function makeNormal() { 
    myVideo.width = 420; 
} */

/*var poster = document.getElementById("poster"); 
*/
/*poster.addEventListener("mouseover", function( event ) {   
	console.log(event.target.querySelector('video'))
  if (myVideo.paused) 
    myVideo.play(); 
  else 
    myVideo.pause(); 
}, false);*/