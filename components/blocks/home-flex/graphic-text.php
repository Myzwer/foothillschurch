<?php
/**
 * Text + Graphic Template Partial (homepage)
 *
 * This file contains the ACF and php code for use in the homepage flex promotion blocks
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * Works on the homepage flex section, and is a modified version of the regular image block.
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

<div class="xl:max-w-5xl max-w-screen-2xl mx-auto p-5 xl:py-20">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12 md:col-span-6 md:order-2 py-5">
			<?php
			$graphic = get_sub_field( "graphic" );
			if ( ! empty( $graphic ) ): ?>
                <img class="rounded-xl shadow-xl" src="<?php echo esc_url( $graphic['url'] ); ?>"
                     alt="<?php echo esc_attr( $graphic['alt'] ); ?>">
			<?php endif; ?>

        </div>

        <div class="col-span-12 md:col-span-6 md:order-1 py-5 prose max-w-none relative">
            <div class="content-middle-large -mt-20 lg:mt-0">
				<?php the_sub_field( "text_editor" ); ?>
            </div>
        </div>

    </div>
</div>
