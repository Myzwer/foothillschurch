<div class="relative py-10">
    <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
        <div class="grid grid-cols-12 gap-4 md:gap-10">

            <div class="col-span-12 md:col-span-6 md:order-2">
				<?php
				// Resource Image
				$resourceImage = get_sub_field( 'resource_image' );
				if ( ! empty( $resourceImage ) ): ?>
                    <img src="<?php echo esc_url( $resourceImage['url'] ); ?>"
                         alt="<?php echo esc_attr( $resourceImage['alt'] ); ?>">
				<?php endif; ?>
            </div>


            <div class="col-span-12 md:col-span-6 md:order-1 relative">
                <div class="content-middle-medium">
                    <div class="text-left mb-1">
                        <h2 class=" text-3xl lb-2 font-bold capitalize"><?php the_sub_field( "resource_title" ); ?></h2>
                        <div class="pb-10 md:pb-3 prose"><?php the_sub_field( "resource_paragraph" ); ?></div>
                        <div class="resource-giveaway">
							<?php
							// Gravity Forms Shortcode
							$formid = get_sub_field( "form_id" );
							echo do_shortcode( "[gravityform id='$formid']" );
							?>
                            <p class="opacity-60 text-xs pt-3">This site is protected by reCAPTCHA and the Google
                                <a class="underline" href="https://policies.google.com/privacy">Privacy Policy</a>
                                and
                                <a class="underline" href="https://policies.google.com/terms">Terms of Service</a>
                                apply.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>