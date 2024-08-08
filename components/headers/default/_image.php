<?php
/*
 * REQUIRED ACF FIELDS:
 * small_subtitle (Text field)
 * main_title (text field)
 * primary_cta (group)
 *  - button_text (text field)
 *  - button_link (link field)
 * side_photo (image)
 *
 * */
?>

<div class="grid grid-cols-12">
    <div class="col-span-12 lg:col-span-6 relative">

        <div class="bg-blue-gradient pt-10 pb-14 lg:pt-0 lg:pb-0">
            <div class="bg-no-repeat bg-scroll bg-cover relative image-header-content-side"
                 style="background:
                         url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;">
                <div class="content-middle-medium text-center px-5 text-pretty">
                    <div class="center add-padding">
                        <h2 class="text-saltydog text-xl lg:text-2xl lb-2 font-bold"><?php the_sub_field( "small_subtitle" ); ?></h2>
                    </div>
                    <h1 class="text-saltydog text-3xl lg:text-5xl uppercase font-bold"><?php the_sub_field( "main_title" ); ?></h1>


					<?php if ( have_rows( 'primary_cta' ) ): ?>
						<?php while ( have_rows( 'primary_cta' ) ): the_row(); ?>

							<?php
							$link      = get_sub_field( 'button_link' ) ?? get_sub_field( 'button_link_file' );

							// Hide button if link is returning null
							if ( $link ):
								// Get tab status
								$new_tab = get_sub_field( 'new_tab' );
								$attrs = '';
								if ( $new_tab == "yes" ) {
									$attrs = 'target="_blank"';
								} elseif ( $new_tab == "cc" ) {
									$attrs = "data-open-in-church-center-modal='true'";
								} ?>

                                <div class="mt-3">
                                    <a href="<?php echo esc_url( $link ); ?>" <?php echo $attrs; ?>
                                       class="fab-main-white">
                                        <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field( "button_text" ); ?>
                                    </a>
                                </div>

							<?php endif; // Close the if $link block ?>

						<?php endwhile; // Close the while loop ?>
					<?php endif; // Close the if have_rows block ?>

                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 lg:col-span-6">
        <div class="bg-no-repeat bg-scroll bg-cover relative image-header-image-side"
             style="background:  url('<?php the_sub_field( "side_photo" ); ?>') center center; background-repeat: no-repeat; background-size: cover;">

        </div>
    </div>

</div>

