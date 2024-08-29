<?php
/**
 * Long FAQ Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a header banner and a simple WYSIWYG editor for header content
 * It also generates a repeater for long-form FAQ's. All questions are hidden in dropdowns to save space.
 *
 * Usage: get_template_part( 'components/blocks/faq-long' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>


<div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 py-10">
    <div class="grid grid-cols-12 gap-4 md:gap-4">
        <div class="col-span-12">
            <img class="rounded-xl shadow-xl" src="<?php the_sub_field( "header_image" ); ?>">
        </div>

        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "header_content" ); ?>
        </div>

        <div class="col-span-12 -mt-5 prose max-w-none">
            <div class="faq-content">

				<?php

				if ( have_rows( 'faq' ) ):
					while ( have_rows( 'faq' ) ) : the_row();
						?>

                        <details>
                            <summary class="tab-title">
								<?php the_sub_field( 'question' ); ?>
                            </summary>
                            <div class="prose max-w-none tab-details">
								<?php the_sub_field( 'answer' ); ?>
                            </div>
                        </details>
					<?php
					endwhile;
				endif; ?>


            </div>
        </div>

    </div>
</div>


