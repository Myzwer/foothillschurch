<?php
/**
 * Instagram Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a social feed for instagram and a link to the social section.
 *
 * Usage: get_template_part( 'components/blocks/instagram' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="bg-no-repeat bg-scroll bg-cover relative pb-8"
     style="background: linear-gradient(
             rgba(245, 235, 232, 0.45),
             rgba(245, 235, 232, 0.45)
             ), url('<?php the_field( 'topography', 'option' ) ?>') center center;">

    <div class=" lg:max-w-5xl lg:text-center lg:mx-auto p-5 pt-10">
        <div class="grid grid-cols-12 gap-1">
            <div class="col-span-12 py-5 prose max-w-none">
				<?php the_sub_field( "header_content" ); ?>
            </div>

            <div class="col-span-12 prose max-w-none insta-margin-fix">
				<?php echo do_shortcode( '[instagram-feed feed=1]' ); ?>
            </div>

            <div class="col-span-6 md:col-span-4 bg-white relative instagram">
				<?php if ( have_rows( 'cta_box' ) ): ?>
					<?php while ( have_rows( 'cta_box' ) ): the_row(); ?>
                        <div class="absolute bottom-2 p-2">
                            <h2 class="text-xl md:text-3xl font-bold uppercase text-left md:pb-2"><?php the_sub_field( "title" ); ?></h2>
                            <div class="text-left">
                                <a href="<?php the_sub_field( "button_link" ); ?>" class="text-left">
                                    <button class="gallery-ghost text-left">
                                        <i class="fa-solid fa-arrow-right"></i> <?php the_sub_field( "button_text" ); ?>
                                    </button>
                                </a>
                            </div>
                        </div>
					<?php endwhile;
				endif; ?>
            </div>

            <div class="col-span-6 md:col-span-8 prose max-w-none">
				<?php echo do_shortcode( '[instagram-feed feed=2]' ); ?>
            </div>

        </div>
    </div>
</div>