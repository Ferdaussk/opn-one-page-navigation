const slides = document.querySelectorAll('.slides');

// set the first slide as the current slide
let currentSlide = 0;

// listen for wheel event on the module_3_wrapper element
document.querySelector('.module_3_wrapper').addEventListener('wheel', event => {
  // disable default scroll behavior
  event.preventDefault();

  // check if the wheel event is scrolled up or down
  const direction = event.deltaY > 0 ? 1 : -1;

  // update the current slide based on the scroll direction
  currentSlide += direction;

  // make sure the current slide is within the bounds of the available slides
  if (currentSlide < 0) {
    currentSlide = 0;
  } else if (currentSlide > slides.length - 1) {
    currentSlide = slides.length - 1;
  }

  // set the transform property of the module_3 element to slide the current slide into view
  document.querySelector('.module_3').style.transform = `translateX(-${currentSlide * 100}vw)`;
});
