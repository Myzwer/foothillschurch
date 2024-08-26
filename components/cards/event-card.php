<div class="bg-white col-span-12 <?php echo $args['column_span_class']; ?> mx-5 mb-8 bg-gray-light shadow-xl rounded-xl relative flex flex-col">
    <img class="rounded-t-lg" src="<?php the_field( 'branding', get_the_ID() ); ?>" alt="Event Brand">
    <div class="p-5 flex-grow">
        <h2 class="text-xl md:text-2xl font-bold capitalize"><?php the_field( 'event_name', get_the_ID() ); ?></h2>
        <h3 class="text-lg"><?php the_field( 'event_date', get_the_ID() ); ?></h3>
        <h3 class="text-lg pb-3"><?php the_field( 'event_start_time', get_the_ID() ); ?></h3>
        <p class="pb-3">
            <!-- Display the "details" section, but limit the text length-->
			<?php
			$trim_length  = 140;  //desired length of text to display
			$custom_field = 'main_details';
			$value        = get_post_meta( $post->ID, $custom_field, true );
			if ( $value ) {
				if ( strlen( $value ) > $trim_length ) {
					$value = rtrim( substr( $value, 0, $trim_length ) ) . '...';
				}
				echo $value;
			} ?>
        </p>
    </div>

	<?php
	// Retrieve values from ACF fields for primary call-to-action (CTA) and external URL
	$primary_cta  = get_field( 'registration_link', get_the_ID() );
	$external_url = get_field( 'external_url', get_the_ID() );

	// Logic to determine CTA style and URL
	if ( $external_url ) {
		// Force single CTA with external URL, saltydog color
		$single_cta_class = 'col-span-12 rounded-b-xl bg-saltydog text-white';
		$cta_url          = $external_url;
	} elseif ( $primary_cta ) {
		// Show two CTAs with registration link as primary, second CTA points to permalink
		$single_cta_class = 'col-span-6 rounded-br-xl bg-lightblue text-black';
		$cta_url          = get_permalink();  // Second CTA will point to the event permalink
	} else {
		// Default single CTA pointing to the event details page
		$single_cta_class = 'col-span-12 rounded-b-xl bg-saltydog text-white';
		$cta_url          = get_permalink();
	}
	?>

    <div class="grid grid-cols-12 rounded-b-xl">
		<?php if ( ! $external_url && $primary_cta ): ?>
            <!-- Register button -->
            <div class="col-span-6 text-center bg-saltydog rounded-bl-xl">
                <a class="block text-lg uppercase py-3 text-white font-bold" target="_blank"
                   href="<?php echo esc_url( $primary_cta ); ?>">Register</a>
            </div>

            <!-- Learn More button -->
            <div class="col-span-6 text-center <?php echo $single_cta_class; ?> rounded-br-xl">
                <a class="block text-lg uppercase py-3 font-bold"
                   href="<?php echo esc_url( get_permalink() ); ?>">Learn More</a>
            </div>
		<?php else: ?>
            <!-- Single CTA for either external link or default link -->
            <div class="<?php echo $single_cta_class; ?> text-center rounded-br-xl">
                <a class="block text-lg uppercase py-3 font-bold"
                   href="<?php echo esc_url( $cta_url ); ?>" <?php echo ( $external_url ) ? 'target="_blank"' : ''; ?>>
					<?php echo ( $external_url ) ? 'Visit External Link' : 'Learn More'; ?>
                </a>
            </div>
		<?php endif; ?>
    </div>
</div>
