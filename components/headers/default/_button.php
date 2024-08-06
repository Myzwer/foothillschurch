<?php
/*
 * REQUIRED ACF FIELDS:
 * small_subtitle (Text field)
 * main_title (text field)
 * primary_cta (group)
 *  - button_text (text field)
 *  - button_link (link field)
 *
 * */
?>

<div class="bg-salty-gradient">
    <div class="bg-no-repeat bg-scroll bg-cover relative"
         style="background:
                 url('<?php echo get_template_directory_uri(); ?>/assets/src/img/topography.png') center center;
                 height: 20vh;">
        <div class="content-middle text-center">
            <div class="center add-padding">
                <h2 class="text-white text-xl md:text-2xl lb-2 font-bold"><?php the_sub_field( "small_subtitle" ); ?></h2>
            </div>
            <h1 class="text-white text-3xl md:text-5xl uppercase font-bold"><?php the_sub_field( "main_title" ); ?></h1>

			<?php if ( have_rows( 'primary_cta' ) ): ?>
				<?php while ( have_rows( 'primary_cta' ) ): the_row(); ?>


					<?php
					// Retrieve the value of the 'button_link' sub-field, or if it's null, retrieve the value of 'button_link_file'.
					// Check if 'button_link' has a value; if not, it falls back to 'button_link_file'.
					$link  = get_sub_field( 'button_link' ) ?: get_sub_field( 'button_link_file' );
					$tab   = get_sub_field( 'new_tab' );
					$attrs = null;

					// Check the value of the 'new_tab' field to determine the appropriate HTML attributes to add to the link.
					if ( $tab == "yes" ) {
						// If 'new_tab' is set to "yes", set the $attrs variable to open the link in a new browser tab.
						$attrs = 'target="_blank"';
					} elseif ( $tab == "cc" ) {
						// If 'new_tab' is set to "cc", set the $attrs variable to open the link in a Church Center modal.
						$attrs = "data-open-in-church-center-modal='true'";
					}

					// Hide button if link is returning null
					if ( $link ): ?>
                        <div class="mt-3">
                            <a href="<?php echo $link ?>" <?php echo $attrs ?> class="fab-main-white">
                                <i class="fa-solid fa-circle-arrow-right"></i> <?php the_sub_field( "button_text" ); ?>
                            </a>
                        </div>
					<?php endif; ?>

				<?php endwhile;
			endif; ?>

        </div>
    </div>
</div>
