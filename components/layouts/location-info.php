<?php
/**
 * Location Template Partial
 *
 * This file contains the ACF and php code for use in location pages.
 * It will not work inside flex content, it must be "top Level."
 *
 * It generates a bunch of ACF fields for schedule, location pastor and contact information.
 * It doesn't include a background, so that'll have to be shipped with wherever its getting called from.
 *
 * Usage: get_template_part( 'components/layouts/location-info' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>


<div class="lg:max-w-5xl lg:mx-auto p-5 pt-10">
    <div class="grid grid-cols-12 gap-4 md:gap-10">

        <div class="col-span-12 md:col-span-6">
            <hr class="h-1 rounded-xl bg-black">
            <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field( "info_block_title" ); ?></h2>
			<?php
			// Check rows exists.
			if ( have_rows( 'info_block' ) ):
				while ( have_rows( 'info_block' ) ) : the_row();
					?>
                    <div class="block pb-4">
                        <h3 class="capitalize text-xl font-bold"><?php the_sub_field( "subtitle" ); ?></h3>
                        <p class="prose"><?php the_sub_field( "subtext" ); ?></p>
                    </div>
				<?php
				endwhile;
			endif; ?>
        </div>


        <div class="col-span-12 md:col-span-6">
            <hr class="h-1 rounded-xl bg-black">
            <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field( "pastor_title" ); ?></h2>
            <div class="grid grid-cols-12 gap-4 md:gap-10">
                <div class="col-span-12 md:col-span-4">
                    <img class="rounded-xl shadow-xl" src="<?php the_field( "headshot" ); ?>" alt="">
                </div>
                <div class="col-span-12 md:col-span-8">
                    <h3 class="capitalize text-xl font-bold"><?php the_field( "pastor_name" ); ?></h3>
                    <div class="prose"><?php the_field( "pastor_bio" ); ?></div>
                </div>


            </div>
        </div>

        <div class="col-span-12 md:col-span-6">
            <hr class="h-1 rounded-xl bg-black">
            <h2 class="text-2xl py-2 font-bold capitalize"><?php the_field( "info_block_title_2" ); ?></h2>

			<?php
			// Check rows exists.
			if ( have_rows( 'info_block_2' ) ):
				while ( have_rows( 'info_block_2' ) ) : the_row();
					?>
                    <div class="block pb-4">
                        <h3 class="capitalize text-xl font-bold"><?php the_sub_field( "subtitle" ); ?></h3>
                        <p class="prose"><?php the_sub_field( "subtext" ); ?></p>
                    </div>
				<?php
				endwhile;
			endif; ?>
        </div>
    </div>
</div>
