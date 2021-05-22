/* GLOBAL VARIABLES */

// Used to add a numeric id on slide creation to let us target the element later
var slideIndex = 0;
// Tells us which slide we are on
var currentSlideIndex = 0;
// An Array to hold all the slides
var slideArray = [];

/* THE TEMPLATE */
// Template for creating a custom Slide object
function Slide(background) {
  this.background = background;
  // we need an id to target later using getElementById
  this.id = "slide" + slideIndex;
  // Add one to the index for the next slide number
  slideIndex++;
  // Add this Slide to our array
  slideArray.push(this);
}

/* SLIDE CREATION */
// Creating our slide objects, you can make as many as you want

var slide1 = new Slide("assets/img/slideshow-pic1.jpg");

var slide1 = new Slide("assets/img/slideshow-pic2.jpg");

var slide2 = new Slide("assets/img/slideshow-pic3.jpg");

var slide3 = new Slide("assets/img/slideshow-pic4.jpg");

/* ADD TO WEB PAGE */
function buildSlider() {
  // A variable to hold all our HTML
  var myHTML;

  // Go through the Array and add the code to our HTML
  for (var i = 0; i < slideArray.length; i++) {
    myHTML +=
      "<div id='" +
      slideArray[i].id +
      "' class='singleSlide' style='background-image:url(" +
      slideArray[i].background +
      ");'></div>";
  }

  // Print our HTML to the web page
  document.getElementById("mySlider").innerHTML = myHTML;

  // Display the first slide
  document.getElementById("slide" + currentSlideIndex).style.left = 0;
}

// Create our slider
buildSlider();

/* SLIDER CONTROLS */
// Navigates to the previous slide in the list
function prevSlide() {
  // Figure out what the previous slide is
  var nextSlideIndex;
  // If we are at zero go to the last slide in the list
  if (currentSlideIndex === 0) {
    nextSlideIndex = slideArray.length - 1;
  } else {
    // Otherwise the next one is this slide minus 1
    nextSlideIndex = currentSlideIndex - 1;
  }

  // Setup the next slide and current slide for animations
  document.getElementById("slide" + nextSlideIndex).style.left = "-100%";
  document.getElementById("slide" + currentSlideIndex).style.left = 0;

  // Add the appropriate animation class to the slide
  document
    .getElementById("slide" + nextSlideIndex)
    .setAttribute("class", "singleSlide slideInLeft");
  document
    .getElementById("slide" + currentSlideIndex)
    .setAttribute("class", "singleSlide slideOutRight");

  // Set current slide to the new current slide
  currentSlideIndex = nextSlideIndex;
}

// Navigates to the next slide in the list
function nextSlide() {
  // Figure out what the next slide is
  var nextSlideIndex;
  // If we are at the last slide the next one is the first (zero based)
  if (currentSlideIndex === slideArray.length - 1) {
    nextSlideIndex = 0;
  } else {
    // Otherwise the next slide is the current one plus 1
    nextSlideIndex = currentSlideIndex + 1;
  }

  // Setup the next slide and current slide for animations
  document.getElementById("slide" + nextSlideIndex).style.left = "100%";
  document.getElementById("slide" + currentSlideIndex).style.left = 0;

  // Add the appropriate animation class to the slide
  document
    .getElementById("slide" + nextSlideIndex)
    .setAttribute("class", "singleSlide slideInRight");
  document
    .getElementById("slide" + currentSlideIndex)
    .setAttribute("class", "singleSlide slideOutLeft");

  // Set current slide to the new current slide
  currentSlideIndex = nextSlideIndex;
}
