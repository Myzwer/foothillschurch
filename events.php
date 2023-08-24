<?php
/**
 * Template Name: Events Main
 *
 * The Frontpage of the Bootcamp II Theme
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
    <div class="bg-blue-gradient pb-5">
    <div class="xl:w-9/12 mx-auto grid grid-cols-12 p-5 gap-4 gap-4 xl:gap-10">
        <div class="col-span-12 xl:col-span-4 xl:col-span-4 mx-5">
            <div class="bg-white">
                <h3>Filter Events</h3>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-8">
            <div class="grid grid-cols-12 gap-4 md:gap-4">

                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => array('event'),
                    'post_status' => array('publish'),
                    'nopaging' => false,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                );

                // The Query
                $events = new WP_Query($args);

                // The Loop
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        get_template_part('components/cards/event-card');
                    }
                } else { ?>
                    <h3 class="text-center font-bold">There are no upcoming events.</h3>
                    <?php
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>



<?php get_footer();