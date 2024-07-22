import $ from "jquery";

// Accordion
const action = "click";
const speed = "500";

$(function () {
  // Question handler
  $(".tab-title").on(action, function (event) {
    // Get the clicked element
    const clickedElement = event.currentTarget;
    // Get next element
    $(clickedElement)
      .next()
      .slideToggle(speed)
      .siblings(".tab-content")
      .slideUp();
    // Get arrow for active dropdown
    const arrow = $(clickedElement).children(".tab-icon"); // Updated selector to be more specific
    // Remove the 'rotate' class for all images except the active.
    $(".tab-icon").not(arrow).removeClass("rotate");
    // Toggle rotate class
    arrow.toggleClass("rotate");
  });
});
