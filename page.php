<?php
/**
 * The Default template file - Page Builder
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

get_header(); ?>

<?php
// Check value exists.
if ( have_rows( 'header_select' ) ) :

	// Loop through rows.
	while ( have_rows( 'header_select' ) ) : the_row();

		switch ( get_row_layout() ) {
			case 'simple_header':
				get_template_part( 'components/headers/default/_simple' );
				break;

			case 'button_header':
				get_template_part( 'components/headers/default/_button' );
				break;

			case 'image_header':
				get_template_part( 'components/headers/default/_image' );
				break;


			// FIXME: Only for building/debugging, shouldn't be left in for production
			default:
				echo "Unhandled content block: " . get_row_layout();
				break;
		}

	endwhile;
endif;
?>


<?php
// Check value exists.
if ( have_rows( 'body_sections' ) ) :

	// used for alternating colors
	$counter = 0;

	// Loop through rows.
	while ( have_rows( 'body_sections' ) ) : the_row();

		if ( 0 === $counter % 2 ) {
			$bg = 'bg-white-gradient';
		} else {
			$bg = 'bg-blue-gradient';
		}

		echo "<div class='$bg'>";
		switch ( get_row_layout() ) {
			case 'text_block':
				get_template_part( 'components/blocks/text' );
				break;

			case 'image_banner_text':
				get_template_part( 'components/blocks/image-text' );
				break;

			case 'blog_block':
				get_template_part( 'components/blocks/blog' );
				break;

			case 'bio_block':
				get_template_part( 'components/blocks/bio' );
				break;

			case 'process_block':
				get_template_part( 'components/blocks/process' );
				break;

			case 'information_section_block':
				get_template_part( 'components/blocks/information-section' );
				break;

			case 'event_type_block':
				get_template_part( 'components/blocks/event-type' );
				break;

			case 'short_faq_block':
				get_template_part( 'components/blocks/faq-short' );
				break;

			case 'long_faq_block':
				get_template_part( 'components/blocks/faq-long' );
				break;

			case 'image_card_block':
				get_template_part( 'components/blocks/card' );
				break;

			case 'gallery_block':
				get_template_part( 'components/blocks/gallery' );
				break;

			case 'announcement_block':
				get_template_part( 'components/blocks/announcement' );
				break;

			case 'app_block':
				get_template_part( 'components/blocks/app-promo' );
				break;

			case 'mockup_promo':
				get_template_part( 'components/blocks/mockup' );
				break;


			// FIXME: Only for building/debugging, shouldn't be left in for production
			default:
				echo "Unhandled content block: " . get_row_layout();
				break;
		}
		echo "</div>";
		$counter ++;

		// End loop.
	endwhile;
endif;
?>

<?php get_footer();

