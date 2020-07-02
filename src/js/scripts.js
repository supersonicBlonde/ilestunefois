window.addEventListener("load", function() {

	jQuery('.testimonial-slider').slick({
	  infinite: true,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  appendArrows: jQuery('#slider-section')
	});

	/*********************************************************
			VIDEO SYSTEM PORTFOLIO
			***************************************************/
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
 

	/************************************************
	         CLASS
			******************************************/
	let connect_btn = document.querySelector('.menu-btn');

	connect_btn.addEventListener('click' , function(event) {

		event.preventDefault();
		let modal = addModalElement();
		//let close_btn = addCloseElement();
		//let shape = addShapeElement();
		animateModal(modal);
		//animateClose(close_btn);
		//animateShape(shape);

		load_template();

	}); 

});


function load_template() {

	jQuery.ajax({
            url : ajax_js_obj.ajax_url,
            type : 'post',
            data : {
                action : 'load_form',  // Note that this is part of the add_action() call.
                submitted_nonce : ajax_js_obj.the_nonce,
                //post_type : post_type
            },
            success : function( response ) {
				// Display both pieces of returned data in different alert boxes.
				console.log( "success" );
				let form = document.createElement('div');
				console.log(form);
				let parent = document.getElementById('modal-container');
				parent.appendChild(form);
				form.innerHTML =  response.data;
            },
            error : function( response ) {
                console.log('Error retrieving the information: ' + response.status + ' ' + response.statusText);
                console.log( response );
            }
        });

    
   /* fetch(ajax_js_obj.ajax_url , {
			method: "POST",
			body: 'action=load_form&submitted_nonce='+ajax_js_obj.the_nonce
		}).then(res => res.json())
			.catch(error => {
				console.log("error");
			})
			.then(response => {

				if (response === 0 || response.status === 'error') {
					console.log( response );
					return;
				}
				let form = document.createElement('div');
				console.log(form);
				let parent = document.getElementById('modal-container');
				parent.appendChild(form);
				form.innerHTML =  response.data;
			});
*/
}


function addCloseElement () { 
	
	let close_btn = document.createElement('div');
	close_btn.classList.add('close-btn');
	close_btn.setAttribute('id', 'close-btn');
	let parent = document.getElementById('modal-container');
	parent.appendChild(close_btn);
	animateClose(close_btn);
	close_btn.addEventListener('click' , function(e) {
		document.querySelector('.close-shape').animate([
		  // keyframes
		  { opacity: 1 }, 
	  	  { opacity: 0 }

		], { 
		  // timing options
		  duration: 300,
		  iterations: 1,
		  easing: 'ease-out',
		  fill: "forwards"
		});
		this.animate([
		  // keyframes
		  { left: '-100px' }, 
	  	  { left: 0 }

		], { 
		  // timing options
		  duration: 300,
		  delay: 200,
		  iterations: 1,
		  easing: 'ease-out',
		  fill: "forwards"
		});
		let animation = parent.animate([
		  // keyframes
		  { width: '50vw' }, 
	  	  { width: 0 }

		], { 
		  // timing options
		  duration: 300,
		  iterations: 1,
		  delay: 500,
		  easing: 'ease-out',
		  fill: "forwards"
		});

		animation.onfinish = removeModal;
	})
	return close_btn;
	
}
function removeModal() {
 document.getElementById("modal-container").remove();
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
	  { width: 0}, 
  	  { width: '60%' }

	], { 
	  // timing options
	  duration: 1000,
	  iterations: 1,
	  easing: 'ease-out',
	  fill: "forwards"
	});
	
	//animationModal.onfinish = addCloseElement;
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

let header_main = document.querySelector('header-container');

if(!document.getElementById('modal-container')) console.log('not exists');

let last_known_scroll_position = 0;
let ticking = false;

function doSomething(scroll_pos) {
	  //console.log(scroll_pos);
	  if(scroll_pos > 200) {
	  	console.log('bas');
	  	if(document.getElementById('modal-container')) {
		   if(document.getElementById('modal-container')) {
		      	document.querySelector('.modal-connect').classList.remove('show');
		      	document.querySelector('.modal-connect').classList.add('hide');

		  }
	  	}
	  } else if (scroll_pos < 50)  {
	  	console.log('haut');
	  	if(document.getElementById('modal-container')) {
	      	document.querySelector('.modal-connect').classList.add('show');
	      	document.querySelector('.modal-connect').classList.remove('hide');

	  }
	}
}

window.addEventListener('scroll', function(e) {
  last_known_scroll_position = window.scrollY;

  if (!ticking) {
    window.requestAnimationFrame(function() {
      doSomething(last_known_scroll_position);
      ticking = false;
    });

    ticking = true;
  }
});