class Modal {

	constructor(parent) {
		this.parent = document.getElementById('header-container');
		this.modal_wrapper = document.createElement('div');
		this.modal_container = document.createElement('div');
		this.close_btn = document.createElement('div');
		this.close_shape = document.createElement('div');
		this.overlay = document.getElementById('overlay');
		this.scale = document.querySelector('.scale');
		this.createElements();   
	} 

	set_overlay(state) {
		if(state === true) { 
			this.overlay.classList.add('show');
			this.overlay.classList.remove('hide');
			this.scale.classList.add('scaleOut');
			this.scale.classList.remove('scaleIn');
		} 
		else {
			this.overlay.classList.remove('show');
			this.overlay.classList.add('hide');
			this.scale.classList.add('scaleIn');
			this.scale.classList.remove('scaleOut');
		}
	}


	close() {
		let parent = this.parentElement.parentElement;
		document.getElementById("form-connect").classList.add('hide');
		document.getElementById('overlay').classList.add('hide');
		document.getElementById('overlay').classList.remove('show');
		document.querySelector('.scale').classList.remove('scaleOut');
		let close_btn = this;
		this.children[0].style.display = "none"
		this.classList.add('hide');
		let anim = parent.animate([
		// keyframes
			{ width: '60%', opacity: 1}, 
			{ width: '30%', opacity: 0}, 
			{ width: 0, opacity:0 }

			], { 
		// timing options
			duration: 300,
			iterations: 1,
			//delay: 300,
			easing: 'ease-out',
			fill: "forwards"
		});
		anim.onfinish = function() {
			parent.remove();
		}
	}




	createElements() {

		//this.parent.appendChild(this.modal_container);
		document.body.appendChild(this.modal_wrapper);
		this.modal_wrapper.appendChild(this.modal_container);
		this.modal_container.appendChild(this.close_btn);
		this.close_btn.appendChild(this.close_shape);

		this.modal_wrapper.classList.add('modal-connect');
		this.modal_container.classList.add('modal-wrapper');
		this.modal_wrapper.setAttribute('id', 'modal-wrapper');
		this.modal_container.setAttribute('id', 'modal-container');

		this.close_btn.classList.add('close-btn');
		this.close_btn.setAttribute('id', 'close-btn');

		this.close_shape.classList.add('close-shape');

		this.overlay.setAttribute('id' , 'overlay'); 
	}
	animate() {
		//this.modal_container.classList.add('animate');
		this.modal_wrapper.classList.add('animate');
		this.close_btn.classList.add('animate');
		this.close_shape.classList.add('animate');
	}

	animate_mobile() {
		this.modal_container.classList.add('animate');
		//this.close_btn.classList.add('animate');
		this.close_shape.classList.add('animate'); 
	}

	initContactForm() {
		jQuery('.wpcf7 > form').each(function () {
			wpcf7.init(jQuery(this)[0]);        
			});
	 }

	load_template() {
		
		let form = document.createElement('div');
		form.setAttribute('id' , "form-connect");
		let parent = document.getElementById('modal-container');
		parent.appendChild(form);

		let preloader = document.createElement('div');
		preloader.setAttribute('id', 'preloader');
		preloader.innerHTML = '<img src="/wp-content/themes/ilestunefois/img/preloader.svg">';
		parent.appendChild(preloader);

		const thisClass = this;

		jQuery.ajax({
			url : ajax_js_obj.ajax_url,
			type : 'post',
			data : {
				action : 'load_form', 
				submitted_nonce : ajax_js_obj.the_nonce,
			},
			
			success : function( response ) { 
				document.getElementById('form-connect').innerHTML =  response.data;
				thisClass.initContactForm();
			},
			complete:function(data){
		    	document.getElementById('preloader').classList.add('hide');
				  
		   },
			error : function( response ) {
				console.log('Error retrieving the information: ' + response.status + ' ' + response.statusText);
				//console.log( response );
			}
		});
	}

}


function navbarAnimate(el) {
	el.animate([
	  // keyframes
	  /*{ height: 0, 'opacity': 0 }, 
	  { height: '80vh', 'opacity': 1 }*/
	  {  'opacity': 0 }, 
	  { 'opacity': 1 }
	], { 
	  // timing options
	  duration:800,
	  easing: 'ease-out',
	  iterations: 1 
	});
}

jQuery( document ).ready(function($) {
  // Handler for .ready() called.
  $('.mh').matchHeight(); 
});



window.addEventListener("load", function() {

	let toggler = document.querySelector('.navbar-toggler');
	let collapse = document.getElementById('navbarNav');


	toggler.addEventListener('click' , function(event) {
		if (collapse.classList.contains('show')) {
    		collapse.classList.remove('show');
    		document.getElementById('header-container').classList.remove('open');
		}
		else {
			collapse.classList.add('show');
			document.getElementById('header-container').classList.add('open');
			navbarAnimate(collapse);
		}
	})

if(jQuery('.testimonial-slider')) {
	jQuery('.testimonial-slider').slick({
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  mobileFirst:true,
	  responsive: [
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	      }
	    },
	    {
	      breakpoint: 991,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	      }
	    },
	    {
	      breakpoint: 1199,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        appendArrows: jQuery('.left-2')
	      }
	    },
	    {
	      breakpoint: 1919,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        appendArrows: jQuery('.left-2')
	      }
	    }
	  ],
	  cssEase: 'ease-out',
	  useTransform: true,
	 
	});
}

	jQuery('#slider-projects').slick({
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  mobileFirst:true,
		responsive: [
	    {
	      breakpoint: 767,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	      }
	    },
	    {
	      breakpoint: 991,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	      }
	    },
	    {
	      breakpoint: 1199,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1,
	        appendArrows: jQuery('.left-2')
	      }
	    },
	    {
	      breakpoint: 1919,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        appendArrows: jQuery('.left-2')
	      }
	    }
	  ],
	  cssEase: 'ease-out',
	  useTransform: true,
	});

	jQuery('.poster-slider').slick({
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  mobileFirst:true,
	  cssEase: 'ease-out',
	});

	jQuery('.slider-logos').slick({
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  mobileFirst:true,
	  useTransform: true,
	   responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        //appendArrows: jQuery('.hideonmobile')
	      }
	    }
	  ],
	  cssEase: 'ease-out',
	 //appendArrows: jQuery('.hideondesktop')
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
		       		
					//video.load();
					video.currentTime = 0;
					video.pause();
					//alert(video.currentTime);


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
	         MODAL
			******************************************/

	let connect_btn = document.querySelector('.menu-btn');
	let cta_btn = document.querySelectorAll('.cta-btn');

	let connect_mobile = document.querySelector('.connect-mobile');

	connect_btn.addEventListener('click' , function(event) {

		console.log("ok");

		event.preventDefault();
		
		let modal = new Modal();
		modal.load_template();
		modal.animate();
		modal.set_overlay(true);
		modal.close_btn.addEventListener('click', modal.close);
	}); 

	cta_btn.forEach(function (elem) {
	
	elem.addEventListener("click", function(event) {

			event.preventDefault();
			
			let modal = new Modal();
			modal.load_template();
			modal.animate();
			modal.set_overlay(true);
			modal.close_btn.addEventListener('click', modal.close);
		}) 
	
	});

/* 	cta_btn.EventListener('click' , function(event) {

		console.log("cat");

		event.preventDefault();
		
		let modal = new Modal();
		modal.load_template();
		modal.animate();
		modal.set_overlay(true);
		modal.close_btn.addEventListener('click', modal.close);
	});  */

	connect_mobile.addEventListener('touchstart' , function(event) {


		event.preventDefault();
		
		let modal = new Modal();
		modal.load_template();
		modal.animate_mobile();
		modal.set_overlay(true);
		modal.close_btn.addEventListener('click', modal.close);
	}); 


// When the user scrolls the page, execute myFunction
	window.onscroll = function() {
		makeSticky();
	};

	// Get the header
	let navbar = document.getElementById("navbarNav-container");
	let bg = document.querySelector(".bg-sticky");

	// Get the offset position of the navbar
	var sticky = navbar.offsetTop;

	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function makeSticky() {
	  if (window.pageYOffset > sticky) {
	    navbar.classList.add("sticky");
	 
	  } else {
	    navbar.classList.remove("sticky");
	     
	  }
	}

});



jQuery(window).bind('scroll', function () {
    if (jQuery(this).scrollTop() > 200) {

      jQuery('.page-template-chooseus .sub_header').addClass('grow');
    } else {
      jQuery('.page-template-chooseus .sub_header').removeClass('grow');
    }
});


// REDIRECT AFTER CONNECT FORM IS SUBMITTED
document.addEventListener( 'wpcf7submit', function( event ) {
	//jQuery('#modal-wrapper').hide();
	//window.location.href = "/message-sent";
}, false );