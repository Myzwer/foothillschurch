<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wordpack-theme
 */

get_header();
?>


<?php
if ( in_category( 'transcript' ) ) {
	get_template_part( './components/posts/transcript' );
} else {
	get_template_part( './components/posts/default' );
}
?>


<?php
get_footer();
