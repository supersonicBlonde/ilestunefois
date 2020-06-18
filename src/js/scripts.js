jQuery('.testimonial-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  appendArrows: jQuery('#slider-section')
});

 


let stop = document.getElementById('stop');

stop.addEventListener("click", myFunction);

function myFunction() {
  console.log('ok');
  players.forEach(function (el) {
    el.stopVideo();
  });
}



