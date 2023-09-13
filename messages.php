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
    <div class="bg-white-gradient">
    <div class="md:w-6/12 mx-auto grid grid-cols-12 p-5">

        <!-- ******** THE FEATURED MESSAGE ******** -->
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

                <!-- I NEED AN ACF FIELD TO BE ASSIGNED TO MEEEEEEE -->
                <button class="ghost-paired mt-3">
                    View on YouTube
                </button>
            </div>
        <?php endforeach;
        wp_reset_query(); ?>
        <!-- End Featured Sermon -->
    </div>


<?php get_footer();
