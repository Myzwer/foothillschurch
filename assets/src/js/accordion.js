import $ from "jquery";

// Accordion
const action = "click";
const speed = "500";

$(function () {
  // Question handler
  $(".tab-title").on(action, function () {
    // Get next element
    $(this).next().slideToggle(speed).siblings(".tab-content").slideUp();
    // Get arrow for active dropdown
    const arrow = $(this).children(".fa");
    // Remove the 'rotate' class for all images except the active.
    $(".fa").not(arrow).removeClass("rotate");
    // Toggle rotate class
    arrow.toggleClass("rotate");
  });
});
