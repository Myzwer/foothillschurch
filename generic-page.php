<?php
/**
 * Template Name: Generic Page Builder
 *
 * This page is a template that allows end users to create a variety of pages using template partials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

<?php
// Check value exists.
if (have_rows('header_select')) :

    // used for alternating colors
    $counter = 0;

    // Loop through rows.
    while (have_rows('header_select')) : the_row();

        switch (get_row_layout()) {
            case 'simple_header':
                echo "<div class='col-span-12'>";
                get_template_part('components/headers/generic-page/simple-header-build');
                echo "</div>";
                break;

            case 'button_header':
                echo "<div class='col-span-12'>";
                get_template_part('components/headers/generic-page/button-header-build');
                echo "</div>";
                break;

            case 'image_header':
                echo "<div class='col-span-12'>";
                get_template_part('components/headers/generic-page/image-header-build');
                echo "</div>";
                break;


            // FIXME: Only for building/debugging, shouldn't be left in for production
            default:
                echo "Unhandled content block: " . get_row_layout();
                break;
        }
        echo "</div>";
        echo "</div>";
        $counter++;

        // End loop.
    endwhile;

// No value.
else :
// Do something...
endif;
?>
    </div>

<?php get_footer();
