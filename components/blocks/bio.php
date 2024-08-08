<?php
/**
 * Bio Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a square image, a WYSIWYG editor, and socials + a button.
 *
 * Usage: get_template_part( 'components/blocks/bio' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-6">
        <div class="col-span-12 md:col-span-6 lg:col-span-3 py-5 text-center mx-auto flex items-center justify-center">
            <img class="rounded-xl shadow-xl" src="<?php the_sub_field( "square_side_image" ); ?>">
        </div>

        <div class="col-span-12 md:col-span-6 lg:col-span-9 py-5 prose max-w-none">
			<?php the_sub_field( "text_editor" ); ?>
        </div>
    </div>
</div>


