<?php
/**
 * Text Block Template Partial (homepage)
 *
 * This file contains the ACF and php code for use in the homepage flex promotion blocks
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * Works on the homepage flex section, and is a modified version of the regular text block.
 *
 * It generates a simplified WYSIWYG editor.
 *
 * Usage: get_template_part( 'components/blocks/home-flex/text-only' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="xl:max-w-5xl max-w-screen-2xl mx-auto p-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "text_editor" ); ?>
        </div>
    </div>
</div>
