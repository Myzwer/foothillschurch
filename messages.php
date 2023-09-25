<?php
/**
 * Template Name: Messages Main
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

    <!-- ******** THE FEATURED MESSAGE ******** -->
    <div class="bg-white-gradient">
        <div class="md:w-6/12 mx-auto grid grid-cols-12 p-5">

            <!-- "Latest sermon" text -->
            <div class="col-span-12 text-left mt-10">
                <h3 class="text-2xl md:text-3xl mb-3 font-bold">Latest Message</h3>
            </div>

            <!-- Start the actual card -->
            <?php
            //Drop into php to call the latest post title and link
            $recent_posts = wp_get_recent_posts(array(
                'post_type' => 'message',
                'numberposts' => 1,
                'post_status' => 'publish',
            ));


            foreach (
                $recent_posts

                as $post) : ?>
                <div class="col-span-12 text-center pt-3 relative">
                    <a href="<?php echo get_permalink($post['ID']) ?>">
                        <img class="rounded-xl shadow-xl"
                             src="<?php echo get_the_post_thumbnail_url($post['ID'], 'post-thumbnail'); ?>" alt="">
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="bg-black/[.5] rounded-full py-8 px-10">
                                <i class="fa-regular fa-play text-6xl text-white"></i>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-span-12 text-center my-8">
                    <button class="elevated-blue mt-3 mr-3">
                        <a href="<?php echo get_permalink($post['ID']) ?>">
                            <i class="fa-solid fa-arrow-right"></i> Watch Now
                        </a>
                    </button>

                    <button class="ghost-paired mt-3">
                        <!-- acf field, get the post ID of last post, "false false" strips formatting and provides raw URL -->
                        <a href="<?php the_field('youtube_link', $post['ID'], false, false); ?>" target="_blank">
                            View on YouTube
                        </a>
                    </button>
                </div>
            <?php endforeach;
            wp_reset_query(); ?>
            <!-- End Featured Sermon -->
        </div>
    </div>

    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
            <!-- "Popular Messages" text -->
            <div class="col-span-12 text-left mt-10">
                <h3 class="text-2xl md:text-3xl mb-3 font-bold">Popular Messages</h3>
            </div>
            <?php

            // Check rows exists.
            if (have_rows('popular_messages')):

                // Loop through rows.
                while (have_rows('popular_messages')) : the_row();
                    ?>
                    <div class="col-span-12 lg:col-span-4">

                        <?php
                        $featured_posts = get_sub_field('message');
                        if ($featured_posts): ?>

                            <?php foreach ($featured_posts as $post):

                                // Setup this post for WP functions (variable must be named $post).
                                setup_postdata($post); ?>

                                <div class="relative">
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="rounded-xl shadow-xl" src="<?php the_post_thumbnail_url(); ?>"
                                             alt="Sermon Thumbnail">

                                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                            <div class="bg-black/[.5] rounded-full py-5 px-7">
                                                <i class="fa-regular fa-play text-3xl text-white"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="font-bold capitalize text-xl pt-3"><?php the_title(); ?></h3>

                                    <p class=" capitalize text-lg">
                                        <?php
                                        // DISPLAY SERIES NAME
                                        $taxonomy = 'series';
                                        // Get the terms associated with the current post
                                        $terms = get_the_terms(get_the_ID(), $taxonomy);
                                        if ($terms && !is_wp_error($terms)) {
                                            // Loop through the terms and display them
                                            foreach ($terms as $term) {
                                                echo 'Series: <a href="' . get_term_link($term, $taxonomy) . '">' . esc_html($term->name) . '</a>';
                                            }
                                        }
                                        ?>
                                    </p>
                                    <p class=" capitalize text-sm"><?php the_date(); ?></p>
                                </a>
                            <?php endforeach; ?>

                            <?php
                            // Reset the global post object so that the rest of the page works correctly.
                            wp_reset_postdata(); ?>
                        <?php endif; ?>

                    </div>
                <?php

                    // End loop.
                endwhile;

            endif;
            ?>

            <div class="col-span-12 text-center my-5">
                <a href="<?php the_field("archive_link"); ?>">
                    <button class="fab-main mt-3">
                        <i class="fa-solid fa-circle-arrow-right"></i> See All Messages
                    </button>
                </a>
            </div>
        </div>
    </div>


    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
            <!-- "Recent Message" text -->
            <div class="col-span-12 text-left mt-10">
                <h3 class="text-2xl md:text-3xl mb-3 font-bold">Recent Messages</h3>
            </div>

            <?php
            // WP_Query arguments
            $args = array(
                'post_type' => array('message'),
                'post_status' => array('publish'),
                'posts_per_page' => 8,
                'nopaging' => false,
                'offset' => 1,
                'order' => 'DESC',
                'orderby' => 'date',
                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
            );

            // The Query
            $recents = new WP_Query($args);

            // The Loop
            if ($recents->have_posts()) {
                while ($recents->have_posts()) {
                    $recents->the_post();

                    ?>

                    <div class="col-span-6 lg:col-span-3 shadow-lg rounded-lg bg-blue-gradient height-lock-message">
                        <a href="<?php the_permalink(); ?>">
                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <img class="rounded-t-xl" src="<?php the_post_thumbnail_url() ?>"
                                         alt="Sermon Thumbnail">
                                </div>
                                <div class="col-span-12 p-3">
                                    <h3 class="text-md font-bold"><?php echo get_the_title(); ?></h3>
                                    <p class="text-sm"><?php echo get_the_date(); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>


                <?php
            } else {
                echo 'there are no posts.'; // no posts found
            }
            // Restore original Post Data
            wp_reset_postdata();
            ?>

            <div class="col-span-12 text-center my-5">
                <a href="<?php the_field("archive_link"); ?>">
                    <button class="ghost mt-3">
                        See All Messages
                    </button>
                </a>
            </div>
        </div>
    </div>


<?php get_footer();