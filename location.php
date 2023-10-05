<?php
/**
 * Template Name: Location (Single)
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

    <video class="header-video"
           src="<?php the_field("background_video"); ?>" autoplay loop
           playsinline muted></video>

    <div class="viewport-header">
        <div class="head-container">
            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-3xl lb-2 font-bold"><?php the_field("top_line"); ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php the_field("location_title"); ?></h1>
        </div>
    </div>

    <div class="bg-white-gradient pb-10">
        <div class="lg:max-w-5xl lg:mx-auto p-5 pt-10">
            <div class="grid grid-cols-12 gap-4 md:gap-10">

                <div class="col-span-12 md:col-span-6">
                    <hr class="h-1 rounded-xl bg-black">
                    <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field("info_block_title"); ?></h2>
                    <?php
                    // Check rows exists.
                    if (have_rows('info_block')):
                        while (have_rows('info_block')) : the_row();
                            ?>
                            <div class="block pb-4">
                                <h3 class="capitalize text-xl font-bold"><?php the_sub_field("subtitle"); ?></h3>
                                <p class="prose"><?php the_sub_field("subtext"); ?></p>
                            </div>
                        <?php
                        endwhile;
                    endif; ?>
                </div>


                <div class="col-span-12 md:col-span-6">
                    <hr class="h-1 rounded-xl bg-black">
                    <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field("pastor_title"); ?></h2>
                    <div class="grid grid-cols-12 gap-4 md:gap-10">
                        <div class="col-span-12 md:col-span-4">
                            <img class="rounded-xl shadow-xl" src="<?php the_field("headshot"); ?>" alt="">
                        </div>
                        <div class="col-span-12 md:col-span-8">
                            <h3 class="capitalize text-xl font-bold"><?php the_field("pastor_name"); ?></h3>
                            <div class="prose"><?php the_field("pastor_bio"); ?></div>
                        </div>


                    </div>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <hr class="h-1 rounded-xl bg-black">
                    <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field("info_block_title_2"); ?></h2>

                    <?php
                    // Check rows exists.
                    if (have_rows('info_block_2')):
                        while (have_rows('info_block_2')) : the_row();
                            ?>
                            <div class="block pb-4">
                                <h3 class="capitalize text-xl font-bold"><?php the_sub_field("subtitle"); ?></h3>
                                <p class="prose"><?php the_sub_field("subtext"); ?></p>
                            </div>
                        <?php
                        endwhile;
                    endif; ?>

                    <?php if (have_rows('prayer_button')): ?>
                        <?php while (have_rows('prayer_button')): the_row(); ?>
                            <a href="<?php the_sub_field("button_link"); ?>">
                                <button class="ghost mt-3">
                                    <?php the_sub_field("button_text"); ?>
                                </button>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-blue-gradient">
    </div>


<?php get_footer();
