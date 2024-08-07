<?php
/**
 * Blog Block Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a header image and a full WYSIWYG editor in a "blog" style (1/3 screen on desktop).
 * Also generates some social icons if you want. Gotta be at the bottom though.
 *
 * Usage: get_template_part( 'components/blocks/blog' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class='bg-alternating-gradient'>
    <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
        <div class="grid grid-cols-12 gap-4 md:gap-4">
            <div class="col-span-12 prose">
                <img class="rounded-xl shadow-xl" src="<?php the_sub_field( "header_image" ); ?>">
            </div>

            <div class="col-span-12 py-5 prose">
				<?php the_sub_field( "text_editor" ); ?>
            </div>
        </div>
    </div>
</div>