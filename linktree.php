<?php
/**
 * Template Name: Custom - Linktree
 *
 * This page generates a "Linktree" style page so we can keep all of our page views in house.
 *
 * Usage: Create a new page, select "Custom - Linktree" in the template and then build it out.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>

<?php
// Get the logo from acf or fall back to default logo if left blank / null
$logo = get_field( 'logo' ) ?: get_template_directory_uri() . '/assets/src/img/circle-brand.png';

// Get the title from acf or fall back to default title if left blank / null
$title = get_field( 'title' ) ?: 'Foothills Church';

// Get the subtitle from acf or fall back to default subtitle if left blank / null
$subtitle = get_field( 'subtitle' ) ?: 'You Belong here ❤️';

?>

    <div class="bg-blue-gradient relative">
        <div class="bg-no-repeat bg-scroll bg-cover relative pb-20"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography-salty.png') center center; ">

            <div class="lg:max-w-5xl mx-auto grid grid-cols-12 p-5 pt-10 gap-4">
                <div class="col-span-12 mx-auto w-32">
                    <img src="<?php echo $logo ?>"
                         alt="FC Logo">
                </div>

                <div class="col-span-12 mx-auto text-center">
                    <h1 class="text-3xl font-bold"><?php echo $title ?></h1>
                    <h3 class="text-md uppercase"><?php echo $subtitle ?></h3>

					<?php if ( get_field( 'socials' ) !== 'no' ): ?>
                        <div class="pt-2">
                            <a href="<?php the_field( 'facebook', 'options' ); ?>" target="_blank">
                                <i class="text-2xl pr-1 fa-brands fa-facebook"></i>
                            </a>
                            <a href="<?php the_field( 'instagram', 'options' ); ?>" target="_blank">
                                <i class="text-2xl pr-1 fa-brands fa-instagram"></i>
                            </a>
                            <a href="<?php the_field( 'twitter', 'options' ); ?>" target="_blank">
                                <i class="text-2xl pr-1 fa-brands fa-x"></i>
                            </a>
                            <a href="<?php the_field( 'youtube', 'options' ); ?>" target="_blank">
                                <i class="text-2xl pr-1 fa-brands fa-youtube"></i>
                            </a>
                            <a href="<?php the_field( 'spotify', 'options' ); ?>" target="_blank">
                                <i class="text-2xl pr-1 fa-brands fa-spotify"></i>
                            </a>
                        </div>
					<?php endif; ?>

                </div>
            </div>

			<?php
			if ( have_rows( 'link_group' ) ):
				while ( have_rows( 'link_group' ) ) :
					the_row();
					?>
                    <div class="lg:max-w-3xl mx-auto grid grid-cols-12 p-5 mt-2">
                        <div class="col-span-12 text-center">
                            <h3 class="text-xl font-bold"><?php the_sub_field( 'section_title' ); ?></h3>
                        </div>

						<?php
						if ( have_rows( 'link' ) ) :
							while ( have_rows( 'link' ) ) : the_row();

								// Check if the button should be hidden
								if ( get_sub_field( 'hide_button' ) == 'yes' ) {
									continue;
								}

								// Handle non-prioritized buttons
								if ( get_sub_field( 'prioritize' ) == 'no' ) { ?>
                                    <div class="col-span-12">
										<?php
										$args = [
											'button_field'      => 'button_link',
											'sub_field'         => true,
											'button_class'      => 'elevated-white-lt mt-3 relative block w-full button-link',
											'button_icon_field' => 'icon', // Icon field from ACF
											'long_button'       => true
										];
										get_template_part( 'components/partials/button-template', null, $args );
										?>
                                    </div>
								<?php }

								// Handle prioritized buttons
								if ( get_sub_field( 'prioritize' ) == 'yes' ) { ?>
                                    <div class="col-span-12 relative mt-5">
										<?php get_template_part( 'components/partials/image-button' ); ?>
                                    </div>
								<?php }

							endwhile;
						endif;
						?>


                    </div>
				<?php
				endwhile;
			endif;
			?>

        </div>
    </div>

<?php get_footer();
