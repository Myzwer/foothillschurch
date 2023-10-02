<?php
/**
 * Template Name: Find A Location
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

    <div class="bg-white-gradient">
        <div class="grid grid-cols-12">
            <div class="col-span-12 md:col-span-6 lg:col-span-4 pt-10 px-5 md:px-10">

                <div class="grid grid-cols-12">
                    <div class="col-span-12 pb-5">
                        <h3 class="uppercase font-bold">one church. two locations.</h3>
                    </div>

                    <div class="col-span-12 pt-5">
                        <?php get_template_part('components/cards/location-card'); ?>
                    </div>

                    <div class="col-span-12 pt-5">
                        <?php get_template_part('components/cards/location-card'); ?>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-8 relative overflow-hidden">
                <?php echo do_shortcode('[wpgmza id="1"]'); ?>
            </div>
        </div>
    </div>

<?php get_footer();
