<?php
/**
 * Template Name: Post Type - Messages (Single)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <!-- ******** THE MAIN MESSAGE ******** -->
    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 pb-10 relative">
            <div class="col-span-12 pt-10">
                <div class="video-container">
					<?php the_field( "youtube_link" ); ?>
                </div>
            </div>

            <div class="col-span-12">
                <!-- Display Title -->
                <h3 class="font-bold capitalize text-3xl pt-3"><?php the_title(); ?></h3>

                <!-- Display Speaker -->
				<?php bootcamp_display_message_terms( get_the_ID(), 'speaker', 'Speaker: ', 'p', 'capitalize text-lg' ); ?>

                <!-- Display Date -->
                <p class="capitalize text-lg">
                    <span class="font-bold">Date:</span> <?php echo get_the_date(); ?>
                </p>

                <!-- Display Series -->
				<?php bootcamp_display_message_terms( get_the_ID(), 'series', 'Series: ', 'p', 'capitalize text-lg' ); ?>

                <!-- Display Topics -->
				<?php bootcamp_display_message_terms( get_the_ID(), 'topic', 'Topics: ', 'p', 'capitalize text-lg' ); ?>

                <!-- Subsplash Link -->
				<?php if ( get_field( 'subsplash_link' ) ): ?>
                    <p class="capitalize text-lg">
                        <span class="font-bold">Notes:</span>
                        <a href="<?php the_field( 'subsplash_link' ); ?>" target="_blank">
                            View On Subsplash <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </p>
				<?php endif; ?>
            </div>

        </div>
    </div>


    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 py-10 relative">
            <div class="col-span-12 md:text-center">
                <h3 class="text-xl md:text-3xl mb-3 font-bold">Prefer to Read The Message?</h3>
                <p>All of our messages are transcribed into blog format for you to read!</p>
                <p>Blog format is typically available by the following Tuesday.</p>
                <div class="col-span-12 text-center mt-5">
					<?php if ( get_field( 'blog_link' ) ): ?>
                        <a href="<?php the_field( 'blog_link' ); ?>" class="elevated-blue mr-3">
                            <i class="fa-solid fa-arrow-right"></i> Read Now
                        </a>
					<?php endif; ?>

                    <a href="<?php the_field( 'transcripts', 'options' ); ?>" class="ghost-paired">
                        View All Transcripts
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--END MAIN MESSAGE -->


    <!-- START POPULAR MESSAGES -->
    <div class="bg-blue-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">
			<?php get_template_part( 'components/layouts/popular-messages' ); ?>
        </div>
    </div>
    <!-- END POPULAR MESSAGES -->


    <!-- START APP CTA -->
    <div class="bg-white-gradient">
        <div class="md:w-8/12 mx-auto grid grid-cols-12 p-5 gap-4">

            <div class="col-span-12 md:col-span-6 text-left mt-10">
				<?php
				// App Mockup Image
				$appPromoImage = get_field( 'app_promo', 'options' );
				if ( ! empty( $appPromoImage ) ): ?>
                    <img class="block mx-auto md:w-fit pt-5" src="<?php echo esc_url( $appPromoImage['url'] ); ?>"
                         alt="<?php echo esc_attr( $appPromoImage['alt'] ); ?>">
				<?php endif; ?>
            </div>

            <div class="col-span-12 md:col-span-6 text-left mt-10 relative">
                <div class="content-middle-medium">
                    <h3 class="text-2xl md:text-3xl mb-3 font-bold capitalize"><?php the_field( 'messages_app_title', 'options' ); ?></h3>
                    <p><?php the_field( 'messages_app_description', 'options' ); ?></p>

                    <div class="pt-5">
                        <a class="pr-2" href="<?php the_field( "app_store_link", 'options' ); ?>" target="_blank">
                            <button class="ghost-black">
                                <i class="fa-brands fa-apple"></i> App Store
                            </button>
                        </a>

                        <a href="<?php the_field( "play_store_link", 'options' ); ?>" target="_blank">
                            <button class="ghost-black">
                                <i class="fa-brands fa-google-play"></i> Play Store
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END POPULAR MESSAGES -->
        </div>
    </div>


<?php get_footer();