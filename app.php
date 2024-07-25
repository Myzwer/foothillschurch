<?php
/**
 * Template Name: Custom - App Page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <div class="bg-blue-gradient relative full-background-desktop ">
        <div class="bg-no-repeat bg-scroll bg-cover relative full-background-desktop"
             style="background:
                     url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography-salty.png') center center;">

            <div class="lg:max-w-8xl mx-auto grid grid-cols-12 p-5 py-10 gap-4">
                <div class="col-span-12 lg:col-span-5 md:col-start-1">
                    <img class="block mx-auto  md:w-fit pt-5" src="<?php the_field( 'app_promo', 'options' ); ?>"
                         alt="App on Phone">
                </div>

                <div class="col-span-12 lg:col-span-5 relative">
                    <div class="content-middle-medium">
                        <h1 class="uppercase text-3xl md:text-4xl font-bold">
							<?php the_field( 'title' ); ?>
                        </h1>
                        <p class=""><?php the_field( 'details' ); ?></p>
                        <div class="pt-5">
                            <a class="ghost-black mr-2" href="<?php the_field( 'app_store_link', 'options' ); ?>"
                               target="_blank">
                                <i class="fa-brands fa-apple"></i> App Store
                            </a>

                            <a class="ghost-black" href="<?php the_field( 'play_store_link', 'options' ); ?>"
                               target="_blank">
                                <i class="fa-brands fa-google-play"></i> Play Store
                            </a>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

<?php get_footer();
