<?php
/**
 * Information Section Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates header banner image, a simple WYSIWYG editor, and a repeater to generate blocks of text.
 *
 * Usage: get_template_part( 'components/blocks/information-section' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>


<div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
		<?php if ( get_sub_field( "header_image" ) ) : ?>
            <div class="col-span-12 pt-10 text-center mx-auto">
				<?php
				$headerImage = get_sub_field( "header_image" );
				if ( ! empty( $headerImage ) ): ?>
                    <img class="rounded-xl shadow-xl" src="<?php echo esc_url( $headerImage['url'] ); ?>"
                         alt="<?php echo esc_attr( $headerImage['alt'] ); ?>">
				<?php endif; ?>
            </div>
		<?php endif; ?>

        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "header_content" ); ?>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-4 md:gap-10">

		<?php
		// Initialize a counter
		$row_count = 0;

		// Check if there are rows in the repeater field and count them
		if ( have_rows( 'information_section' ) ) {
			while ( have_rows( 'information_section' ) ) {
				the_row();
				$row_count ++;
			}
		}

		// Echo the row count
		$breakpoint = ( $row_count > 1 ) ? 'md:col-span-6' : '';

		// Reset the rows so the actual content loop works again
		if ( have_rows( 'information_section' ) ):
			while ( have_rows( 'information_section' ) ) : the_row(); ?>

                <div class="col-span-12 <?php echo $breakpoint ?> py-5">
                    <hr class="border-t border-2 border-black">
                    <div class="pt-3 prose max-w-none">
						<?php the_sub_field( 'section_content' ); ?>
                    </div>
                </div>

			<?php
			endwhile;
		endif;
		?>

    </div>
</div>

