<?php
/**
 * Template Name: Messages Archive
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
                echo do_shortcode('[fe_widget]');
                ?>
            </div>
        </div>


        <div class="col-span-12 xl:col-span-8">
            <div id="primary" class="grid grid-cols-12 gap-4 md:gap-4">

                <?php
                // WP_Query arguments
                $args = array(
                    'post_type' => array('message'),
                    'post_status' => array('publish'),
                    'nopaging' => false,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                    'posts_per_page' => 6,
                );

                // The Query
                $events = new WP_Query($args);

                // The Loop
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        get_template_part('components/cards/message-card');
                    }
                } else { ?>
                    <h3 class="text-center font-bold">There are no upcoming events.</h3>
                    <?php
                }

                // Pagination function


                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>




<?php get_footer();