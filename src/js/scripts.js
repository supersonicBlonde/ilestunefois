window.addEventListener("load", function() {

	jQuery('.testimonial-slider').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  appendArrows: jQuery('#slider-section')
	});


	if(document.querySelectorAll(".poster")) {
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
	}
 



	let connect_btn = document.querySelector('.menu-btn');
	let body = document.querySelector('body');

	connect_btn.addEventListener('click' , function(event) {

		event.preventDefault();
		let modal = addModalElement();
		let close_btn = addCloseElement();
		let shape = addShapeElement();
		animateModal(modal);
		animateClose(close_btn);
		animateShape(shape);

	}); 

});




function addCloseElement () { 
	
	let close_btn = document.createElement('div');
	close_btn.classList.add('close-btn');
	close_btn.setAttribute('id', 'close-btn');
	let parent = document.getElementById('modal-container');
	parent.appendChild(close_btn);

	return close_btn;
	
}

function addShapeElement() { 
	let button = document.getElementById('close-btn');
	let myshape = document.createElement('div');
	myshape.classList.add('close-shape');
	//myshape.innerHTML= '<i class="fi flaticon-close"></i>';
	button.append(myshape);

	return myshape;
	
}


function addModalElement() { 
	let modal = document.createElement('div');
	modal.setAttribute('id', 'modal-container');
	modal.classList.add('modal-connect');
	let parent = document.getElementById('header-container');
	
	parent.appendChild(modal);

	return modal;
	
}

function animateModal(modal) {
	let animationModal = modal.animate([
	  // keyframes
	  { width: 0 }, 
  	  { width: '50vw' }

	], { 
	  // timing options
	  duration: 1000,
	  iterations: 1,
	  easing: 'ease-out',
	  fill: "forwards"
	});
	
}


function animateClose(element){
let animation = element.animate([
	  // keyframes
	  { left: 0 }, 
  	  { left: '-100px' }

	], { 
	  // timing options
	  duration: 1000,
	  iterations: 1,
	  delay: 1000,
	  easing: 'ease-out',
	  fill: "forwards"
	});

}


function animateShape(element){
	
	let animation = element.animate([
	  // keyframes
	  { opacity: 0 }, 
  	  { opacity: 1 }

	], { 
	  // timing options
	  duration: 1000,
	  iterations: 1,
	  delay: 2000,
	  easing: 'ease-out',
	  fill: "forwards"
	});

}