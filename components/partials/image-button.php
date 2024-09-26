<?php
/**
 * Template Partial for displaying a button link with an optional image and title.
 *
 * This partial is used to render a link (button style) that may include an image,
 * a dynamic title, and can open in a new tab if specified. The link, image, and title
 * are all dynamically retrieved from ACF's 'button_link' and 'link_image' fields.
 *
 * Usage: Include this template wherever the button link layout is needed.
 *
 * Fields:
 * - 'button_link' (array): Contains 'url', 'title', and 'target' (optional to open in a new tab).
 * - 'link_image' (array): Contains 'url' and 'alt' for an image that accompanies the button.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

$button_link     = get_sub_field( 'button_link' );

if ( $button_link ):
	$link_url = $button_link['url'];
	$link_title  = $button_link['title'] ? $button_link['title'] : 'Event Name';
	$link_target = $button_link['target'] ? $button_link['target'] : '_self';
	?>
    <div class="col-span-12 relative mt-5">
        <a class="lt-image block w-full button-link" href="<?php echo esc_url( $link_url ); ?>"
           target="<?php echo esc_attr( $link_target ); ?>">
			<?php
			$link_image = get_sub_field( 'link_image' );
			if ( ! empty( $link_image ) ): ?>
                <img class="lt-image-top" src="<?php echo esc_url( $link_image['url'] ); ?>"
                     alt="<?php echo esc_attr( $link_image['alt'] ); ?>">
			<?php endif; ?>
            <h3 class="capitalize font-bold text-xl py-3 text-center">
				<?php echo esc_html( $link_title ); ?>
            </h3>
        </a>
    </div>
<?php endif; ?>
