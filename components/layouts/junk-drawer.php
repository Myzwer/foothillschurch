<?php
/*
 * Junk Drawer Template Partial
 *
 * REQUIRED ACF FIELDS:
 *  - junk_drawer (repeater)
 *     - Title (text)
 *     - Paragraph (wysiwyg Editor)
 *     - Button Text (text)
 *     - Button Link (link)
 */
?>

<!-- Start an outer grid. This can be nested inside of a different grid, but it'll look jank. -->
<?php if ( have_rows( 'junk_drawer' ) ) : ?>
    <div class="grid grid-cols-12 gap-4 md:gap-10 pb-10">
		<?php while ( have_rows( 'junk_drawer' ) ) : the_row(); ?>
            <div class="col-span-12 md:col-span-6 p-5">
                <h4 class="text-2xl pb-2 font-bold capitalize"><?php the_sub_field( 'title' ); ?></h4>
                <hr class="h-1 rounded-xl bg-black">
                <div class="py-3 prose"><?php the_sub_field( 'paragraph' ); ?></div>
				<?php if ( $button_link = get_sub_field( 'button_link' ) ) : ?>
                    <div class="mt-2">
                        <a href="<?php echo esc_url( $button_link ); ?>" class="ghost-black">
							<?php the_sub_field( 'button_text' ); ?>
                        </a>
                    </div>
				<?php endif; ?>
            </div>
		<?php endwhile; ?>
    </div>
<?php endif; ?>

