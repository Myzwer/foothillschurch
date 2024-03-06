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
$logo = ( get_field( 'logo' ) != null ) ? get_field( 'logo' ) : get_template_directory_uri() . '/assets/src/img/circle-brand.png';

// Get the title from acf or fall back to default title if left blank / null
$title = ( get_field( 'title' ) != null ) ? get_field( 'title' ) : 'Foothills Church';

// Get the subtitle from acf or fall back to default subtitle if left blank / null
$subtitle = ( get_field( 'subtitle' ) != null ) ? get_field( 'subtitle' ) : 'You Belong here ❤️';

// Get the socials radio button results. Show or hide the section with CSS based on the answer.
$socials = ( get_field( 'socials' ) == 'no' ) ? 'hidden' : 'block';
?>

    <div class="bg-blue-gradient relative">
        <div class="bg-no-repeat bg-scroll bg-cover relative"
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

                    <div class="pt-2 <?php echo $socials ?>">
                        <a href="https://www.facebook.com/foothillschurchTN/">
                            <i class="text-2xl pr-1 fa-brands fa-facebook"></i>
                        </a>
                        <a href="https://instagram.com/foothillschurchtn">
                            <i class="text-2xl pr-1 fa-brands fa-instagram"></i>
                        </a>
                        <a href="https://x.com/foothillschurch">
                            <i class="text-2xl pr-1 fa-brands fa-x"></i>
                        </a>
                        <a href="https://www.youtube.com/c/FoothillsChurchTN">
                            <i class="text-2xl pr-1 fa-brands fa-youtube"></i>
                        </a>
                        <a href="https://open.spotify.com/user/foothillschurch?si=1b5df347a9f842be">
                            <i class="text-2xl pr-1 fa-brands fa-spotify"></i>
                        </a>
                    </div>

                </div>
            </div>


            <div class="lg:max-w-3xl mx-auto grid grid-cols-12 p-5 mt-2">
                <div class="col-span-12 text-center">
                    <h3 class="text-xl font-bold">Locations</h3>
                </div>

                <div class="col-span-12">
                    <a class="block w-full" href="#">
                        <button class="elevated-white-lt mt-3 relative">
                            <div class="absolute left-5">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                            Button text
                        </button>
                    </a>
                </div>
                <div class="col-span-12">
                    <a class="block w-full" href="#">
                        <button class="elevated-white-lt mt-3 relative">
                            <div class="absolute left-5">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                            Button text
                        </button>
                    </a>
                </div>
            </div>

            <div class="lg:max-w-3xl mx-auto grid grid-cols-12 p-5 mt-2">
                <div class="col-span-12 text-center">
                    <h3 class="text-xl font-bold">Events</h3>
                </div>

                <div class="col-span-12 relative mt-5 ">
                    <a class="block w-full lt-image" href="#">
                        <img src="https://placehold.co/1920x1080" alt="">
                        <h3 class="capitalize font-bold text-xl text-black py-3 text-center">button text</h3>
                    </a>
                </div>
                
                <div class="col-span-12">
                    <a class="block w-full" href="#">
                        <button class="elevated-white-lt mt-3 relative">
                            <div class="absolute left-5">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                            Button text
                        </button>
                    </a>
                </div>
                <div class="col-span-12">
                    <a class="block w-full" href="#">
                        <button class="elevated-white-lt mt-3 relative">
                            <div class="absolute left-5">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                            Button text
                        </button>
                    </a>
                </div>
                <div class="col-span-12">
                    <a class="block w-full" href="#">
                        <button class="elevated-white-lt mt-3 relative">
                            <div class="absolute left-5">
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                            Button text
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>

<?php get_footer();
