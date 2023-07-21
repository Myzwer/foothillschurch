<?php
/**
 * Template Name: Front Page
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

    <video class="header-video" src="<?php the_field("video_background"); ?>" autoplay loop playsinline muted></video>

    <div class="viewport-header">
        <div class="head-container">
            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-3xl lb-2 font-bold">Welcome to Foothills Church</h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold">You Belong Here</h1>

            <button class="fab-main mt-3">
                <i class="fa-solid fa-circle-arrow-right"></i> Find A Location
            </button>
        </div>
    </div>

    <div class="bg-white-gradient pb-10">
        <div class="lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-4 md:gap-10">
                <div class="col-span-12 md:col-span-6">
                    <img class="rounded-xl shadow-xl" src="<?php the_field("thumbnail"); ?>" alt="">
                </div>

                <div class="col-span-12 md:col-span-6 relative">
                    <div class="content-middle-medium">
                        <div class="text-left mb-1">
                            <h4 class="uppercase font-semibold">Latest Sermon</h4>
                            <h2 class=" text-xl md:text-3xl lb-2 font-bold capitalize">Get To The Secret
                                Place</h2>
                            <p>Join us as we close out our series "Just One Bite" where Pastor Landon talks about how to
                                avoid temptation and not become the next generation's old heroes.</p>
                            <button class="elevated-blue mt-3 mr-3">
                                <i class="fa-solid fa-arrow-right"></i> Watch Now
                            </button>
                            <button class="ghost-paired mt-3">
                                Read the Blog
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-gradient pb-10">
        <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-6 md:order-2">
                    <img src="<?php the_field("resource_pdf"); ?>" alt="">
                </div>


                <div class="col-span-12 md:col-span-6 md:order-1 relative">
                    <div class="content-middle-medium">
                        <div class="text-left mb-1">
                            <h2 class=" text-xl md:text-3xl lb-2 font-bold capitalize">Get a free resource on us!</h2>
                            <p class="pb-10 md:pb-3">Learn how to manage your money better with this handy PDF based on
                                Dave Ramsay’s Financial Peace University!</p>
                            <?php if (have_posts()) : while (have_posts()) : the_post();
                                the_content();
                            endwhile;
                            else: ?>
                                <p>Sorry, no posts matched your criteria.</p>
                            <?php endif; ?>
                            <p class="opacity-60 text-xs">This site is protected by reCAPTCHA and the Google
                                <a class="underline" href="https://policies.google.com/privacy">Privacy Policy</a> and
                                <a class="underline" href="https://policies.google.com/terms">Terms of Service</a>
                                apply.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-white-gradient">
        <div class="bg-no-repeat bg-scroll bg-cover relative pb-8"
             style="background: linear-gradient(
                     rgba(245, 235, 232, 0.45),
                     rgba(245, 235, 232, 0.45)
                     ), url('<?php the_field('topography', 'option') ?>') center center;">

            <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
                <div class="grid grid-cols-12 gap-1">

                    <div class="col-span-6 md:col-span-4 md:order-1">
                        <img src="<?php the_field("g1"); ?>" alt="">
                    </div>
                    <div class="col-span-6 md:col-span-4 md:order-2">
                        <img src="<?php the_field("g2"); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-3">
                        <img src="<?php the_field("g3"); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-5">
                        <img src="<?php the_field("g4"); ?>" alt="">
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-4 bg-blue-gradient relative shadow-xl">
                        <div class="absolute bottom-2 left-2 md:bottom-5 md:left-5">
                            <h2 class=" text-xl md:text-3xl font-bold uppercase text-left md:pb-2">Events</h2>
                            <button class="gallery-ghost">
                                <i class="fa-solid fa-arrow-right"></i> Join The Fun
                            </button>
                        </div>
                    </div>

                    <div class="col-span-6 md:col-span-4 md:order-6">
                        <img src="<?php the_field("g5"); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
get_footer();