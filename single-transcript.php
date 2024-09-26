<?php
/**
 * Template Name: Post Type - Transcripts (Single)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <div class="bg-salty-gradient">
        <div class="bg-no-repeat bg-scroll bg-cover relative"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;
                     height: 20vh;">
            <div class="content-middle text-center">
                <h1 class="text-white text-3xl md:text-5xl font-bold uppercase">
                    Transcript Archive
                </h1>
            </div>
        </div>
    </div>


    <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:pb-2">
        <div class="grid grid-cols-12 gap-4 md:gap-4">
            <div class="col-span-12 md:col-span-8 prose max-w-none">
                <div class="rounded-xl shadow-xl">
					<?php the_post_thumbnail(); ?>
                </div>
            </div>

            <div class="col-span-12 md:col-span-8">
                <!-- Display Title -->
                <h3 class="font-bold capitalize text-3xl"><?php the_title(); ?></h3>

                <!-- Function to display terms -->
				<?php
				// Display Speaker
				bootcamp_display_message_terms( get_the_ID(), 'speaker', 'Speaker: ', 'div', 'capitalize text-lg', true );

				// Display Date
				echo '<p class="capitalize text-lg"><span class="font-bold">Date:</span> ' . get_the_date() . '</p>';

				// Display Series
				bootcamp_display_message_terms( get_the_ID(), 'series', 'Series: ', 'div', 'capitalize text-lg', true );

				// Display Topic
				bootcamp_display_message_terms( get_the_ID(), 'topic', 'Topics: ', 'div', 'capitalize text-lg', true );
				?>
            </div>


            <div class="col-span-12 md:col-span-8 py-5 prose max-w-none">
				<?php the_content(); ?>
            </div>

        </div>
    </div>

    <div class="bg-blue-gradient">
        <div class=" mx-auto p-5 xl:pb-2">
            <div class="col-span-12 md:col-span-8 py-5 max-w-none">
				<?php
				// Pass the word you want the "next and previous" buttons to use, and the relative URL
				set_query_var( 'more_text', 'Transcript' );
				set_query_var( 'link', 'transcripts' );
				get_template_part( 'components/posts/pagination' );
				?>
            </div>
        </div>
    </div>


<?php get_footer();