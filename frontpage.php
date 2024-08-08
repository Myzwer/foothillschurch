<?php
/**
 * Template Name: Custom - Front Page
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

<?php // START Header ?>
    <video class="header-video" src="<?php the_field( "video_background" ); ?>" autoplay loop playsinline muted></video>
    <div class="viewport-header">
        <div class="head-container">
			<?php
			// select which text to use for the banner
			if ( check_live_status() ) {
				$top_line              = get_field( "live_top_line_text" );
				$main_line             = get_field( "live_main_text" );
				$primary_button_text   = get_field( "button_text_live" );
				$primary_button_link   = get_field( "live_button_link" );
				$secondExists          = true; //confirm we need the second button
				$secondary_button_text = get_field( "normal_button_text" );
				$secondary_button_link = get_field( "normal_button_link" );
			} else {
				$top_line            = get_field( "header_subtitle" );
				$main_line           = get_field( "header_main_title" );
				$primary_button_text = get_field( "normal_button_text" );
				$primary_button_link = get_field( "normal_button_link" );
				$secondExists        = false; //confirm we don't need the second button
			}
			?>

            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-3xl lb-2 font-bold"><?php echo $top_line; ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php echo $main_line; ?></h1>


            <div class="mt-3">
                <a href="<?php echo $primary_button_link; ?>" class="fab-main">
                    <i class="fa-solid fa-circle-arrow-right"></i> <?php echo $primary_button_text; ?>
                </a>


				<?php
				if ( $secondExists ) { ?>
                    <a href="<?php echo $secondary_button_link; ?>" class="ghost-white mt-3">
						<?php echo $secondary_button_text; ?>
                    </a>
				<?php } ?>
            </div>

        </div>
    </div>
<?php // END Header ?>


<?php
// Show announcement banner if there's content
if ( get_field( "announcement_block" ) ) { ?>
    <div class="bg-salty-gradient">
        <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
            <div class="grid grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12 py-5 prose max-w-none announcement-block">
					<?php the_field( "announcement_block" ); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php // START Recent Sermon ?>
    <div class="bg-white-gradient">
        <div class="lg:max-w-5xl mx-auto grid grid-cols-12 p-5 py-10 gap-4 md:gap-10">
			<?php
			// Start the actual card
			// Drop into PHP to call the latest post title and link
			$recent_posts = wp_get_recent_posts( array(
				'post_type'   => 'message',
				'numberposts' => 1,
				'post_status' => 'publish',
			) );

			foreach ( $recent_posts as $post ) : ?>
                <div class="col-span-12 md:col-span-6 text-center relative">
                    <a href="<?php echo get_permalink( $post['ID'] ) ?>">
                        <img class="rounded-xl shadow-xl"
                             src="<?php echo get_the_post_thumbnail_url( $post['ID'], 'post-thumbnail' ); ?>" alt="">
                    </a>
                </div>

                <div class="col-span-12 md:col-span-6 my-8">
                    <h3 class="text-md uppercase">Latest Message</h3>
                    <h2 class="text-3xl font-bold capitalize"><?php echo get_the_title( $post['ID'] ) ?></h2>
                    <div class="block">
						<?php
						function display_taxonomy_terms( $post_id, $taxonomy, $label, $new_line = false ): void {
							// Retrieve the terms associated with the post for the specified taxonomy
							$terms = get_the_terms( $post_id, $taxonomy );

							if ( $terms && ! is_wp_error( $terms ) ) {
								echo '<div class="">';
								echo '<h3 class="text-xl capitalize font-bold inline">' . esc_html( $label ) . '</h3>';

								// Create an array to hold term names
								$term_names = [];

								// Loop through the terms and add them to the array
								foreach ( $terms as $term ) {
									$term_names[] = esc_html( $term->name );
								}

								// Display the terms separated by a comma and a space
								echo '<h3 class="text-xl capitalize inline">' . implode( ', ', $term_names ) . '</h3>';

								if ( $new_line ) {
									echo '<br>';
								}

								echo '</div>';
							}
						}

						// Get the ID of the most recent message post from the $recent_posts array
						$latest_message_id = $post['ID'];

						// Display Speaker
						$taxonomy_speaker = 'speaker';
						$label_speaker    = 'Speaker: ';
						display_taxonomy_terms( $latest_message_id, $taxonomy_speaker, $label_speaker, true );

						// Display Series
						$taxonomy_series = 'series';
						$label_series    = 'Series: ';
						display_taxonomy_terms( $latest_message_id, $taxonomy_series, $label_series );
						?>


                        <div class="mt-5">
                            <a href="<?php echo get_permalink( $post['ID'] ); ?>" class="elevated-blue mr-3">
                                <i class="fa-solid fa-arrow-right"></i> Watch Now
                            </a>

							<?php // ACF field, get the post ID of the last post, "false false" strips formatting and provides a raw URL ?>
                            <a href="<?php the_field( 'youtube_link', $post['ID'], false, false ); ?>" target="_blank"
                               class="ghost-paired mt-3">
                                View on YouTube
                            </a>
                        </div>
                    </div>
                </div>
			<?php endforeach;
			wp_reset_query(); ?>
        </div>
    </div>
<?php // END Recent Sermon ?>

<?php // START Resource Giveaway  ?>
    <div class="bg-blue-gradient py-10">
        <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-6 md:order-2">
                    <img src="<?php the_field( "resource_image" ); ?>" alt="Resource Image">
                </div>


                <div class="col-span-12 md:col-span-6 md:order-1 relative">
                    <div class="content-middle-medium">
                        <div class="text-left mb-1">
                            <h2 class=" text-xl md:text-3xl lb-2 font-bold capitalize"><?php the_field( "resource_title" ); ?></h2>
                            <div class="pb-10 md:pb-3 prose"><?php the_field( "resource_paragraph" ); ?></div>
							<?php
							// Gravity Forms Shortcode
							$formid = get_field( "form_id" );
							echo do_shortcode( "[gravityform id='$formid']" );
							?>
                            <p class="opacity-60 text-xs pt-3">This site is protected by reCAPTCHA and the Google
                                <a class="underline" href="https://policies.google.com/privacy">Privacy Policy</a> and
                                <a class="underline" href="https://policies.google.com/terms">Terms of Service</a>
                                apply.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php // END Resource Giveaway ?>


<?php // START Gallery / Events  ?>
    <div class="bg-white-gradient">
        <div class="bg-no-repeat bg-scroll bg-cover relative pb-8"
             style="background: linear-gradient(
                     rgba(245, 235, 232, 0.45),
                     rgba(245, 235, 232, 0.45)
                     ), url('<?php the_field( 'topography', 'option' ) ?>') center center;">

            <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
                <div class="grid grid-cols-12 gap-1">

                    <div class="col-span-6 md:col-span-4 md:order-1">
                        <img src="<?php the_field( "g1" ); ?>" alt="">
                    </div>
                    <div class="col-span-6 md:col-span-4 md:order-2">
                        <img src="<?php the_field( "g2" ); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-3">
                        <img src="<?php the_field( "g3" ); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-5">
                        <img src="<?php the_field( "g4" ); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-4 bg-blue-gradient relative shadow-xl">
                        <div class="absolute bottom-2 left-2 md:bottom-5 md:left-5">
                            <h2 class=" text-xl md:text-3xl font-bold uppercase text-left md:pb-2"><?php the_field( "gallery_card_title" ); ?></h2>
							<?php if ( have_rows( 'gallery_cta' ) ): ?>
								<?php while ( have_rows( 'gallery_cta' ) ): the_row(); ?>
                                    <a href="<?php the_sub_field( 'button_link' ); ?>" class="gallery-ghost">
                                        <i class="fa-solid fa-arrow-right"></i> <?php the_sub_field( 'button_text' ); ?>
                                    </a>
								<?php endwhile;
							endif; ?>
                        </div>
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-6">
                        <img src="<?php the_field( "g5" ); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php // END Gallery / Events ?>


<?php
// START Next Step Slider
if ( have_rows( 'slider_content' ) ): ?>
    <div class="bg-darkblue md:p-10">
        <div class=" lg:max-w-5xl lg:mx-auto">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-4 relative pt-10 px-5">
                    <div class="content-middle-medium">
                        <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php the_field( "giant_title" ); ?></h1>
                    </div>
                </div>

                <div class="col-span-12 md:col-start-6 md:col-span-7 pb-10 md:pb-0">
					<?php // Start Glider ?>
                    <div class="glide relative">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
								<?php
								if ( have_rows( 'slider_content' ) ):
									while ( have_rows( 'slider_content' ) ) : the_row(); ?>
                                        <li class="glide__slide">
                                            <div class="slide-card p-6 md:p-10 rounded-xl shadow-xl">
                                                <h3 class="text-2xl md:text-3xl pb-3 font-bold capitalize"><?php the_sub_field( "step_title" ); ?></h3>
                                                <p class="pb-3"><?php the_sub_field( "step_content" ); ?></p>
                                                <a href="<?php the_sub_field( 'button_link' ); ?>" class="ghost-black">
                                                    <i class="fa-solid fa-arrow-right"></i> <?php the_sub_field( 'button_text' ); ?>
                                                </a>
                                            </div>
                                        </li>
									<?php endwhile;
								endif;
								?>

                            </ul>

                        </div>
                        <div class="glide__bullets" data-glide-el="controls[nav]">
                        </div>
						<?php // Start Arrows ?>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <i class="fa-regular fa-angle-left"></i>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <i class="fa-regular fa-angle-right"></i>
                            </button>
                        </div>
						<?php // End Arrows ?>
                    </div>
					<?php // End Glider ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;
// END Next Step Slider
?>


    <div class="bg-white-gradient md:py-10">
        <div class=" lg:max-w-5xl lg:mx-auto">
			<?php get_template_part( 'components/layouts/junk-drawer' ); ?>
        </div>
    </div>


<?php
get_footer();