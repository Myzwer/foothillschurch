<?php
/**
 * Template Name: Location (Single)
 *
 * NOTE: You MUST name location_title the same as your taxonomy term for the location or filtering won't work.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <video class="header-video"
           src="<?php the_field("background_video"); ?>" autoplay loop
           playsinline muted></video>

    <div class="viewport-header">
        <div class="head-container">
            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-3xl lb-2 font-bold"><?php the_field("top_line"); ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold">
                <?php the_field("location_title"); //see note in doc block ?>
            </h1>
        </div>
    </div>

    <div class="bg-white-gradient pb-10">
        <div class="lg:max-w-5xl lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-6">
                    <hr class="h-1 rounded-xl bg-black">
                    <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field("info_block_title"); ?></h2>
                    <?php
                    // Check rows exists.
                    if (have_rows('info_block')):
                        while (have_rows('info_block')) : the_row();
                            ?>
                            <div class="block pb-4">
                                <h3 class="capitalize text-xl font-bold"><?php the_sub_field("subtitle"); ?></h3>
                                <p class="prose"><?php the_sub_field("subtext"); ?></p>
                            </div>
                        <?php
                        endwhile;
                    endif; ?>
                </div>


                <div class="col-span-12 md:col-span-6">
                    <hr class="h-1 rounded-xl bg-black">
                    <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field("pastor_title"); ?></h2>
                    <div class="grid grid-cols-12 gap-4 md:gap-10">
                        <div class="col-span-12 md:col-span-4">
                            <img class="rounded-xl shadow-xl" src="<?php the_field("headshot"); ?>" alt="">
                        </div>
                        <div class="col-span-12 md:col-span-8">
                            <h3 class="capitalize text-xl font-bold"><?php the_field("pastor_name"); ?></h3>
                            <div class="prose"><?php the_field("pastor_bio"); ?></div>
                        </div>


                    </div>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <hr class="h-1 rounded-xl bg-black">
                    <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field("info_block_title_2"); ?></h2>

                    <?php
                    // Check rows exists.
                    if (have_rows('info_block_2')):
                        while (have_rows('info_block_2')) : the_row();
                            ?>
                            <div class="block pb-4">
                                <h3 class="capitalize text-xl font-bold"><?php the_sub_field("subtitle"); ?></h3>
                                <p class="prose"><?php the_sub_field("subtext"); ?></p>
                            </div>
                        <?php
                        endwhile;
                    endif; ?>

                    <?php if (have_rows('prayer_button')): ?>
                        <?php while (have_rows('prayer_button')): the_row(); ?>
                            <a href="<?php the_sub_field("button_link"); ?>">
                                <button class="ghost mt-3">
                                    <?php the_sub_field("button_text"); ?>
                                </button>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Body Section -->
    <div class="bg-blue-gradient">
        <div class="xl:w-9/12 max-w-screen-2xl mx-auto pt-5 xl:p-5">
            <div class="grid grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12">
                    <h2 class="text-2xl py-2 font-bold capitalize text-center">Upcoming Events
                        in <?php the_field("location_title"); ?></h2>
                </div>

                <?php
                $location = get_field("location_title");
                // WP_Query arguments
                $args = array(
                    'post_type' => array('event'),
                    'post_status' => array('publish'),
                    'nopaging' => false,
                    'order' => 'DESC',
                    'orderby' => 'date',
                    'posts_per_page' => 3, // Use 'posts_per_page' instead of 'numberposts'
                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'event_location',
                            'field' => 'slug', // You can use 'slug' or 'term_id' based on your needs
                            'terms' => $location, // Use the term ID of the current term
                        ),
                    ),
                );

                // The Query
                $events = new WP_Query($args);

                // The Loop
                if ($events->have_posts()) {
                    while ($events->have_posts()) {
                        $events->the_post();
                        $size_select = array(
                            'column_span_class' => 'lg:col-span-4'
                        );
                        get_template_part('components/cards/event-card', null, $size_select);
                    }
                } else { ?>
                    <div class="col-span-12">
                        <h3 class="text-center font-bold">This location has no upcoming events.</h3>
                    </div>
                    <?php
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>


<?php get_footer();
