<?php
/**
 * Process Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a banner image and a header.
 * It also creates a repeater that automatically numbers itself to show process steps.
 *
 * Usage: get_template_part( 'components/blocks/process' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>


<div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12 pt-10 text-center mx-auto">
            <img class="rounded-xl shadow-xl -mb-10" src="<?php the_sub_field( "header_image" ); ?>">
        </div>

        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "header_content" ); ?>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 md:gap-10">

		<?php

		$header_num = 1;
		if ( have_rows( 'process_step' ) ):
			while ( have_rows( 'process_step' ) ) : the_row(); ?>

                <div class="col-span-12 md:col-span-6 lg:col-span-4 py-5">
                    <div class="pb-10">
                        <div class="flex items-center justify-center mx-auto w-14 h-14 bg-salty-gradient rounded-full">
                            <h3 class="text-white align-middle m-0 text-2xl font-bold"><?php echo $header_num; ?></h3>
                        </div>
                    </div>
                    <h2 class="capitalize font-bold text-xl pb-5"><?php the_sub_field( 'title' ); ?></h2>
                    <hr class="border-t border-2 border-black">
                    <p class="pt-5"><?php the_sub_field( 'paragraph' ); ?></p>
                </div>


				<?php
				$header_num ++;
			endwhile;
		endif; ?>
    </div>
</div>

