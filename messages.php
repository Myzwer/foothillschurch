<?php
/**
 * Template Name: Post Type - Messages
 *
 * This page is the main "home" of messages, has the most recent message, and links to the archive of all prev messages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <!-- Simple Header-->
<?php get_template_part( 'components/headers/simple-header' ); ?>
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
			$recent_posts = wp_get_recent_posts( array(
				'post_type'   => 'message',
				'numberposts' => 1,
				'post_status' => 'publish',
			) );


			foreach (
				$recent_posts

				as $post
			) : ?>
                <div class="col-span-12 text-center pt-3 relative">
                    <a href="<?php echo get_permalink( $post['ID'] ) ?>">
                        <img class="rounded-xl shadow-xl"
                             src="<?php echo get_the_post_thumbnail_url( $post['ID'], 'post-thumbnail' ); ?>"
                             alt="Latest Sermon Thumbnail">
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            <div class="bg-black/[.5] rounded-full py-8 px-10">
                                <i class="fa-regular fa-play text-6xl text-white"></i>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-span-12 text-center my-8">

                    <a class="elevated-blue mt-3 mr-3 button-link" href="<?php echo get_permalink( $post['ID'] ) ?>">
                        <i class="fa-solid fa-arrow-right"></i> Watch Now
                    </a>

                    <div class="block md:inline mt-6 md:mt-0">
                        <a class="ghost-paired mt-3 button-link"
                           href="<?php the_field( 'youtube_link', $post['ID'], false, false ); ?>" target="_blank">
                            <!-- ACF field, get the post ID of last post, "false false" strips formatting and provides raw URL -->
                            View on YouTube
                        </a>
                    </div>


                </div>
			<?php endforeach;
			wp_reset_query(); ?>
            <!-- End Featured Sermon -->
        </div>
    </div>

    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
			<?php get_template_part( 'components/layouts/popular-messages' ); ?>
        </div>
    </div>


<?php
// WP_Query arguments
$args = array(
	'post_type'      => array( 'message' ),
	'post_status'    => array( 'publish' ),
	'posts_per_page' => 8,
	'nopaging'       => false,
	'offset'         => 1,
	'order'          => 'DESC',
	'orderby'        => 'date',
	'paged'          => get_query_var( 'paged' ) ?? 1,
);

// The Query
$recents = new WP_Query( $args );

// Check if there are any posts
if ( $recents->have_posts() ) { ?>

    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
            <!-- "Recent Message" text -->
            <div class="col-span-12 text-left mt-10">
                <h3 class="text-2xl md:text-3xl mb-3 font-bold">Recent Messages</h3>
            </div>

			<?php
			// The Loop
			while ( $recents->have_posts() ) {
				$recents->the_post(); ?>

                <div class="col-span-6 lg:col-span-3 shadow-lg rounded-lg bg-blue-gradient height-lock-message">
                    <a href="<?php the_permalink(); ?>">
                        <div class="grid grid-cols-12">
                            <div class="col-span-12">
                                <img class="rounded-t-xl" src="<?php the_post_thumbnail_url(); ?>"
                                     alt="Recent Sermon Thumbnail">
                            </div>
                            <div class="col-span-12 p-3">
                                <h3 class="text-md font-bold"><?php echo get_the_title(); ?></h3>
                                <p class="text-sm"><?php echo get_the_date(); ?></p>
                            </div>
                        </div>
                    </a>
                </div>

			<?php } ?>

            <div class="col-span-12 text-center my-5">
                <a class="ghost-black mt-3 button-link" href="/all-messages">
                    See All Messages
                </a>
            </div>

        </div>
    </div>

<?php }
// Restore original Post Data
wp_reset_postdata();
?>


<?php get_footer();