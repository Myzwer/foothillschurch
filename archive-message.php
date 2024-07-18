<?php
/**
 * Template Name: Post Type - Messages (Archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>


    <!-- Simple Header-->
<?php get_template_part('components/headers/simple-header'); ?>
    <!-- End Header -->

    <!-- Start Body Section -->
    <div class="bg-blue-gradient">
    <div class="2xl:w-9/12 max-w-screen-2xl mx-auto grid grid-cols-12 pt-5 xl:p-5 gap-4 xl:gap-10">
        <div class="col-span-12 xl:col-span-4 xl:col-span-4 mx-5">
            <div class="bg-white p-5 rounded-xl shadow-xl">
                <h3 class="capitalize font-bold text-3xl pb-3">Filter Messages</h3>
                <?php
                // Filter Everything plugin shortcode
                // Configured in WP Admin - Location as well. Use plugin settings to adjust.
                echo do_shortcode('[fe_widget]');
                ?>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-8">
            <div id="primary" class="grid grid-cols-12 gap-4 md:gap-4">
                <?php
                // Get the current page number for pagination
                $paged = absint( $wp_query->get( 'paged',  1 ) );

                // Define query arguments for retrieving custom post type 'message'
                $args = array(
                    'post_type' => 'message',
                    'posts_per_page' => 10, // Display 10 messages per page
                    'paged' => $paged // Set the current page for pagination
                );

                // Create a new WP_Query object with the defined arguments
                $loop = new WP_Query($args);

                // Loop through the retrieved messages
                while ($loop->have_posts()) : $loop->the_post();
                    // Include template partial to display the message card
                    get_template_part('components/cards/message-card');
                endwhile;
                ?>

                <div class="col-span-12 p-5 mb-8 pagination text-center">
                    <?php
                    // Define pagination parameters and display pagination links
                    $big = 999999999;
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total' => $loop->max_num_pages, // Total number of pages
                        'current' => max(1, get_query_var('paged')), // Current page
                        'format' => '?paged=%#%', // Page URL format
                        'show_all' => false,
                        'type' => 'list',
                        'end_size' => 2, // Number of pages to display at the beginning and end
                        'mid_size' => 1, // Number of pages to display on either side of the current page
                        'prev_next' => true, // Display "Previous" and "Next" links
                        'prev_text' => sprintf('<i></i> %1$s', __('Newer Messages', 'text-domain')), // Text for the "Previous" link
                        'next_text' => sprintf('%1$s <i></i>', __('Older Messages', 'text-domain')), // Text for the "Next" link
                        'add_args' => false,
                        'add_fragment' => '',
                    ));
                    ?>
                </div>
                <?php wp_reset_postdata(); // Reset post data after the loop ?>
            </div>
        </div>

    </div>




<?php get_footer();