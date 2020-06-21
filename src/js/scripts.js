jQuery('.testimonial-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  appendArrows: jQuery('#slider-section')
});

 


let poster = document.querySelectorAll(".poster");

poster.forEach(function (elem) {

	 elem.addEventListener("mouseover", function(event) {
	 	
       let video = event.target;
     
		if(video.paused) {
			video.play();
		}
    }, false);

	 elem.addEventListener("mouseout", function(event) {
       let video = event.target;

			video.load();
			video.currentTime = 0;

    }, false);

	elem.addEventListener("click", function(event) {

		players.forEach(function (el) {
		    el.stopVideo();
		  });
	    poster.forEach(function (el) {
	    	el.style.display = "block";
	    });
       let video = event.target;
        elem.style.display = 'none';

       let  position = elem.dataset.position;
       players[position].playVideo();
	
    	event.preventDefault();

    }, false);
	
});


