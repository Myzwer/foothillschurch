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
        <div class="m-4 md:m-10 lg:max-w-4xl lg:text-center lg:mx-auto pt-10">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-6">
                    <img class="rounded-xl shadow-xl" src="<?php the_field("thumbnail"); ?>" alt="">
                </div>

                <div class="col-span-12 md:col-span-6">
                    <div class="text-center md:text-left mb-1">
                        <h4 class = "uppercase font-semibold">Latest Sermon</h4>
                        <h2 class=" text-xl md:text-3xl lb-2 font-bold capitalize">Get To The Secret
                            Place</h2>
                        <p>Join us as we close out our series "Just One Bite" where Pastor Landon talks about how to
                            avoid temptation and not become the next generation's old heroes.</p>
                        <button class="elevated-blue mt-3 mr-3">
                            <i class="fa-solid fa-arrow-right"></i> Watch Now
                        </button>
                        <button class="ghost mt-3">
                            Read the Blog
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
get_footer();