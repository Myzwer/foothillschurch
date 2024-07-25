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
							// This line uses the ternary operator to choose between two possible URLs.
							// It checks if 'button_link' subfield exists. If it does, $link is assigned the value of 'button_link'.
							// If 'button_link' does not exist (is null or false), then $link is assigned the value of 'button_link_file'.
							// If both exist, link gets priority
							// if neither exist, it would return null and get hung up on the if statement below.
							$link = get_sub_field( 'button_link' ) ? get_sub_field( 'button_link' ) : get_sub_field( 'button_link_file' );

							// Get tab status
							$tab = get_sub_field( 'new_tab' );

							if ( $tab == "yes" ) {
								$tab = 'target="_blank"';
							} elseif ( $tab == "cc" ) {
								$tab = "data-open-in-church-center-modal='true'";
							} else {
								$tab = null;
							}


							// Hide button if link is returning null
							if ( $link ): ?>
                                <div class="mt-3">
                                    <a href="<?php echo $link ?>" <?php echo $tab ?> class="fab-main-white">
                                        <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field( "button_text" ); ?>
                                    </a>
                                </div>
							<?php endif; ?>

						<?php endwhile;
					endif; ?>

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

