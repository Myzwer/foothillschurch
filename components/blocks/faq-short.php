<?php
/**
 * Short FAQ Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a header banner and a simple WYSIWYG editor for header content
 * It also generates a repeater for short-form FAQ's. All content is shown to end user, there's no dropdowns.
 *
 * Usage: get_template_part( 'components/blocks/faq-short' );
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
			<?php
			$headerImage = get_sub_field( "header_image" );
			if ( ! empty( $headerImage ) ): ?>
                <img class="rounded-xl shadow-xl" src="<?php echo esc_url( $headerImage['url'] ); ?>"
                     alt="<?php echo esc_attr( $headerImage['alt'] ); ?>">
			<?php endif; ?>
        </div>

        <div class="col-span-12 py-5 prose max-w-none">
			<?php the_sub_field( "header_content" ); ?>
        </div>


		<?php
		if ( have_rows( 'faq' ) ):
			while ( have_rows( 'faq' ) ) : the_row(); ?>
                <div class="col-span-12 md:col-span-4 p-5">
                    <h4 class="text-2xl pb-2 font-bold capitalize"><?php the_sub_field( "question" ); ?></h4>
                    <div class="border-l-4 my-3 px-3 prose "><?php the_sub_field( "answer" ); ?></div>
                </div>
			<?php endwhile;
		endif; ?>
    </div>
</div>
