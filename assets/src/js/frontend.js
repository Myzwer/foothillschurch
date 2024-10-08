import $ from "jquery";
import "../sass/frontend.scss";
import "./glide-control";
import "./accordion";
import "./map-launcher";

$(document).ready(function () {
  // If a link has a dropdown, add sub menu toggle.
  $("nav ul li a:not(:only-child)").on("click", function (e) {
    e.preventDefault(); // Prevent the default action of the event

    // Remove "active-dropdown" class from other anchor elements
    $("nav ul li a").not(this).removeClass("active-dropdown");

    // Toggle the "active-dropdown" class on the clicked anchor element
    $(this).toggleClass("active-dropdown");

    // Toggle the visibility of the sibling dropdown
    const mediaQuery = window.matchMedia("(max-width: 64em)");

    // Check the screen size using the media query
    if (mediaQuery.matches) {
      // Mobile: Use slideToggle()
      $(this).siblings(".nav-dropdown").slideToggle();
    } else {
      // Desktop: Use toggle()
      $(this).siblings(".nav-dropdown").toggle();
    }

    // Close one dropdown when selecting another
    $(".nav-dropdown").not($(this).siblings()).hide();

    e.stopPropagation();
  });

  // Clicking away from dropdown will remove the dropdown class and active-dropdown class
  $("html").on("click", function () {
    $(".nav-dropdown").hide();
    $("nav ul li a:not(:only-child)").removeClass("active-dropdown");
  });

  // Toggle open and close nav styles and hamburger to X toggle on click
  $("#nav-toggle").on("click", function () {
    $("nav ul").slideToggle();
    this.classList.toggle("active");
  });
});
