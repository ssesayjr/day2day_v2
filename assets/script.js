
const heroContent = document.querySelector('.hero-content');

window.addEventListener('scroll', () => {
    let scrollPos = window.scrollY;

    // Fades content as you scroll down
    heroContent.style.opacity = 1 - (scrollPos / 500);
});

// JavaScript to handle the scroll event and show the menu
function showStickyMenu() {
  var topMenu = document.getElementById("nav-bar");
  // Show the menu after scrolling 100px
  if (window.pageYOffset > 50) {
      topMenu.classList.add("visible");
  } else {
      topMenu.classList.remove("visible");
  }
}

$(function() {
  var selectedClass = "";
  $(".fil-cat").click(function(){ 
  selectedClass = $(this).attr("data-rel"); 
   $("#portfolio_custom").fadeTo(100, 0.1);
  $("#portfolio_custom div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
  setTimeout(function() {
    $("."+selectedClass).fadeIn().addClass('scale-anm');
    $("#portfolio_custom").fadeTo(300, 1);
  }, 300); 
  
});
});



$(document).ready(function(){


     //Initialize Lightcase 
    $('a[data-rel^=lightcase]').lightcase();


    $(".owl-carousel").owlCarousel({
      loop: true, // Enable looping
      margin: 5, // Space between items
      nav: false, // Display navigation arrows
      autoplay: true, // Enable auto slide
      dots: false,
      autoplayTimeout: 3000, // 3 seconds before next slide
      responsive: {
        0: {
          items: 1 // Show 1 item for screens smaller than 600px
        },
        600: {
          items: 2 // Show 2 items for screens between 600px and 1000px
        },
        1000: {
          items: 3 // Show 3 items for larger screens
        }
      }
    });

    $('.owl-prev, .owl-next').css({
      'background-color': '#00a1fb',  // Change button background color
      'color': 'white',               // Change button text/icon color
      'border-radius': '50%',         // Optional: Round the button
      'border': '2px solid white'     // Optional: Add a border
  });

  });
  


