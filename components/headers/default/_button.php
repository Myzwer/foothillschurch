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
