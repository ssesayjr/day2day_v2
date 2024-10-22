$(document).ready(function() {
  // Initialize Isotope on the grid container
  var $grid = $('.grid').isotope({
      // options
      itemSelector: '.grid-item', // Selects the items to be arranged
      layoutMode: 'fitRows',      // Layout mode (e.g., fitRows, masonry, etc.)
      percentPosition: true,      // Ensures the grid adjusts based on container size
      masonry: {
          columnWidth: '.grid-item' // Define column width for masonry layout (optional)
      }
  });

  // Filtering items on button click
  $('.filter-button-group').on('click', 'button', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue }); // Apply the filter
  });

  // Optional: Add active class to the clicked filter button
  $('.filter-button-group button').on('click', function() {
      $('.filter-button-group button').removeClass('is-checked');
      $(this).addClass('is-checked');
  });
});
