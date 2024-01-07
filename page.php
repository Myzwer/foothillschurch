<?php
/**
 * The Default template file - Page Builder
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
                get_template_part('components/headers/default/_simple');
                break;

            case 'button_header':
                get_template_part('components/headers/default/_button');
                break;

            case 'image_header':
                get_template_part('components/headers/default/_image');
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
?>
    </div>

<?php get_footer();

