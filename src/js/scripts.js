class Modal {

	constructor(parent) {
		this.parent = document.getElementById('header-container');
		this.modal_container = document.createElement('div');
		this.close_btn = document.createElement('div');
		this.close_shape = document.createElement('div');
		this.createElements();
	}


	close() {
		let parent = this.parentElement;
		document.getElementById("form-connect").classList.add('hide');
		let close_btn = this;
		this.children[0].style.display = "none"
		this.classList.add('hide');
		let anim = parent.animate([
		// keyframes
			{ width: '60%', opacity: 1}, 
			{ width: 0, opacity:0.5 }

			], { 
		// timing options
			duration: 500,
			iterations: 1,
			delay: 300,
			easing: 'ease-out',
			fill: "forwards"
		});
		anim.onfinish = function() {
			parent.remove();
		}
	}


	createElements() {

		this.parent.appendChild(this.modal_container);
		this.modal_container.appendChild(this.close_btn);
		this.close_btn.appendChild(this.close_shape);

		this.modal_container.classList.add('modal-connect');
		this.modal_container.setAttribute('id', 'modal-container');

		this.close_btn.classList.add('close-btn');
		this.close_btn.setAttribute('id', 'close-btn');

		this.close_shape.classList.add('close-shape');
	}

	animate() {
		this.modal_container.classList.add('animate');
		this.close_btn.classList.add('animate');
		this.close_shape.classList.add('animate');
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

	/*	fetch(ajax_js_obj.ajax_url , {
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
		}*/


		jQuery.ajax({
			url : ajax_js_obj.ajax_url,
			type : 'post',
			data : {
				action : 'load_form', 
				submitted_nonce : ajax_js_obj.the_nonce,
			},
			
			success : function( response ) { 
				document.getElementById('form-connect').innerHTML =  response.data;
			},
			complete:function(data){
		    	document.getElementById('preloader').classList.add('hide');
		   },
			error : function( response ) {
				console.log('Error retrieving the information: ' + response.status + ' ' + response.statusText);
				console.log( response );
			}
		});
	}

}

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
	         MODAL
			******************************************/

	let connect_btn = document.querySelector('.menu-btn');

	connect_btn.addEventListener('click' , function(event) {

		event.preventDefault();
		let modal = new Modal();
		modal.load_template();
		modal.animate();
		modal.close_btn.addEventListener('click', modal.close);
	}); 

});


