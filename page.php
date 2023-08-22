<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * Because of the way this template was built, this page will rarely ever be seen.
 * Frontpage will be what users see first, not this.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header();

// Check value exists.
if (have_rows('build_your_page')) :

  // used for alternating colors
  $counter = 0;

  // Loop through rows.
  while (have_rows('build_your_page')) : the_row();

    if (0 === $counter % 2) {
      $class = 'even';
    } else {
      $class = 'odd';
    }

    switch (get_row_layout()) {
      case 'hero':
        get_template_part('layouts/hero');
        break;

      case 'section_heading':
        get_template_part('layouts/section-heading');
        break;

      case 'cta':
        get_template_part('layouts/cta');
        break;

        // FIXME: Only for building/debugging, shouldn't be left in for production
      default:
        echo "Unhandled content block: " . get_row_layout();
        break;
    }

    $counter++;

  // End loop.
  endwhile;

// No value.
else :
// Do something...
endif;

get_template_part('components/button');

get_footer();
