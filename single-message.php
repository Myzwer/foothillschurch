<?php
/**
 * Template Name: Messages Single
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <!-- start outer color -->
    <!-- ******** THE FEATURED MESSAGE ******** -->
    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 pb-10 relative">
            <div class="col-span-12 pt-10">
                <div class="video-container">
                    <?php the_field("youtube_link"); ?>
                </div>
            </div>
            <div class="col-span-12">
                <h3 class="font-bold capitalize text-3xl pt-3"><?php the_title(); ?></h3>

                <p class=" capitalize text-lg">
                    <?php
                    // DISPLAY SERIES NAME
                    $taxonomy = 'speaker';
                    // Get the terms associated with the current post
                    $terms = get_the_terms(get_the_ID(), $taxonomy);
                    if ($terms && !is_wp_error($terms)) {
                        // Loop through the terms and display them
                        foreach ($terms as $term) {
                            echo '<span class = "font-bold">Speaker:</span> <a href="' . get_term_link($term, $taxonomy) . '">' . esc_html($term->name) . '</a>';
                        }
                    }
                    ?>
                </p>
                <p class="capitalize text-lg"><span class="font-bold">Date:</span> <?php echo get_the_date(); ?></p>

                <p class=" capitalize text-lg">
                    <?php
                    // DISPLAY SERIES NAME
                    $taxonomy = 'series';
                    // Get the terms associated with the current post
                    $terms = get_the_terms(get_the_ID(), $taxonomy);
                    if ($terms && !is_wp_error($terms)) {
                        // Loop through the terms and display them
                        foreach ($terms as $term) {
                            echo '<span class = "font-bold">Series:</span> <a href="' . get_term_link($term, $taxonomy) . '">' . esc_html($term->name) . '</a>';
                        }
                    }
                    ?>
                </p>

                <p class="capitalize text-lg">
                    <?php
                    // DISPLAY SERIES NAME
                    $taxonomy = 'topic';

                    // Get the terms associated with the current post
                    $terms = get_the_terms(get_the_ID(), $taxonomy);

                    if ($terms && !is_wp_error($terms)) {
                        // Extract term names into an array
                        $term_names = wp_list_pluck($terms, 'name');

                        // Join the term names with commas
                        $term_list = implode(', ', $term_names);

                        echo '<span class="font-bold">Topics:</span> ' . esc_html($term_list);
                    }
                    ?>
                </p>

                <p class=" capitalize text-lg"><span class="font-bold">Notes:</span> <a href="#">View On Subsplash <i
                                class="fa-regular fa-arrow-up-right-from-square"></i></a>
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 py-10 relative">
            <div class="col-span-12 md:text-center">
                <h3 class="text-xl md:text-3xl mb-3 font-bold">Prefer to Read The Message?</h3>
                <p>All of our sermons are transcribed into blog format for you to read!</p>
                <p>Blog format is typically available the following Wednesday.</p>
                <div class="col-span-12 text-center">
                    <button class="elevated-blue mt-3 mr-8">
                        <a href="#">
                            <i class="fa-solid fa-arrow-right"></i> Read Now
                        </a>
                    </button>

                    <button class="ghost-paired mt-3">
                        <a href="#" target="_blank">
                            View All Blogs
                        </a>
                    </button>
                </div>
            </div>
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
            if (have_rows('popular_messages', 84)):

                // Loop through rows.
                while (have_rows('popular_messages', 84)) : the_row();
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
                    <button class="ghost mt-3">
                        See All Messages
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">

            <div class="col-span-12 md:col-span-6 text-left mt-10">
                <img src="<?php the_field('app_promo', 'options'); ?>" alt="">
            </div>

            <div class="col-span-12 md:col-span-6 text-left mt-10 relative">
                <div class="content-middle-medium">
                    <h3 class="text-2xl md:text-3xl mb-3 font-bold capitalize">Download our App!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores fuga perspiciatis quas
                        reprehenderit ullam vero vitae voluptatum? A dolores error, facilis harum quis reprehenderit,
                        sapiente tempore vel velit vero voluptas!</p>

                    <a href="<?php the_field("archive_link"); ?>">
                        <button class="ghost mt-3 mr-8">
                            Download IOS
                        </button>
                    </a>
                    <a href="<?php the_field("archive_link"); ?>">
                        <button class="ghost mt-3">
                            Download Android
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    </div>

    </div>


<?php get_footer();