<?php
/**
 * Template partial to generate a dynamic button with optional icon and link.
 *
 * @param array $args {
 *     Arguments to customize the button output.
 *
 * @type string $button_field The ACF field name or subfield name containing the button link data.
 * @type bool $options (Optional) Whether the field is stored in the options page. Default is false.
 * @type bool $sub_field (Optional) Whether the field is a subfield (e.g., in a repeater or flexible content). Default is false.
 * @type string $button_class (Optional) CSS class for styling the button. Default is 'default-button-class'.
 * @type string $button_icon (Optional) Manually set icon class for the button (e.g., FontAwesome icon class). If set, it overrides ACF icon.
 * @type string $button_icon_field (Optional) ACF field name or subfield name containing the icon class.
 * @type bool $long_button (Optional) Whether to use the "long button" style with additional divs for layout. Default is false.
 * }
 */

// Extract variables from the $args array if they exist.
$button_field      = $args['button_field'] ?? null;
$options           = $args['options'] ?? false;
$sub_field         = $args['sub_field'] ?? false;
$button_class      = $args['button_class'] ?? 'ghost-black';
$button_icon       = $args['button_icon'] ?? null; // Manually set icon class
$button_icon_field = $args['button_icon_field'] ?? null; // ACF field for icon class
$long_button       = $args['long_button'] ?? false; // Check for long button style

// Determine the link field value based on options and sub_field flags
$link = null;
if ( $button_field ) {
	if ( $options ) {
		$link = get_field( $button_field, 'options' ); // Get link from options page
	} elseif ( $sub_field ) {
		$link = get_sub_field( $button_field ); // Get link from ACF subfield
	} else {
		$link = get_field( $button_field ); // Get link from ACF field
	}
}

// Render button if link is set
if ( $link ) {
	$link_url    = esc_url( $link['url'] ); // Sanitize the URL
	$link_title  = esc_html( $link['title'] ?? 'Learn More' ); // Use 'Learn More' if no title is provided
	$link_target = esc_attr( $link['target'] ?? '_self' ); // Default target is '_self'

	// If a manual icon is provided, use it; otherwise, get the icon class from ACF
	if ( ! $button_icon && $button_icon_field ) {
		if ( $sub_field ) {
			$button_icon = get_sub_field( $button_icon_field ); // Get icon from subfield if applicable
		} else {
			$button_icon = get_field( $button_icon_field ); // Get icon from regular ACF field
		}
	}
	?>
    <a class="<?php echo esc_attr( $button_class ); ?>"
       href="<?php echo $link_url; ?>"
       target="<?php echo $link_target; ?>">
		<?php if ( $long_button ): // Render "long button" style ?>
			<?php if ( $button_icon ): ?>
                <div class="absolute left-5">
                    <i class="<?php echo esc_attr( $button_icon ); ?>"></i>
                </div>
			<?php endif; ?>
            <div class="text-center">
				<?php echo $link_title; ?>
            </div>
		<?php else: // Render default button style ?>
			<?php if ( $button_icon ): ?>
                <i class="<?php echo esc_attr( $button_icon ); ?>"></i>
			<?php endif; ?>
			<?php echo $link_title; ?>
		<?php endif; ?>
    </a>
<?php } ?>
