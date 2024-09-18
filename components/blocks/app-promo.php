<?php
/**
 * App Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates an app promo section, with the image and links pulling from options,
 * and the text loading in from a required ACF field.
 *
 * Usage: get_template_part( 'components/blocks/app' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>
<div class="lg:max-w-8xl mx-auto grid grid-cols-12 p-5 py-10 gap-4">
    <div class="col-span-12 lg:col-span-5 md:col-start-1">
		<?php
		// App Mockup Image
		$appPromoImage = get_field( 'app_promo', 'options' );
		if ( ! empty( $appPromoImage ) ): ?>
            <img class="block mx-auto md:w-fit pt-5" src="<?php echo esc_url( $appPromoImage['url'] ); ?>"
                 alt="<?php echo esc_attr( $appPromoImage['alt'] ); ?>">
		<?php endif; ?>
    </div>

    <div class="col-span-12 lg:col-span-5 relative">
        <div class="content-middle-medium">
            <h1 class="uppercase text-3xl md:text-4xl font-bold">
				<?php the_sub_field( 'app_title' ); ?>
            </h1>
            <p class=""><?php the_sub_field( 'app_message' ); ?></p>
            <div class="pt-5">
                <a class="ghost-black mr-2" href="<?php the_field( 'app_store_link', 'options' ); ?>"
                   target="_blank">
                    <i class="fa-brands fa-apple"></i> App Store
                </a>

                <a class="ghost-black mt-3 md:mt-0" href="<?php the_field( 'play_store_link', 'options' ); ?>"
                   target="_blank">
                    <i class="fa-brands fa-google-play"></i> Play Store
                </a>
            </div>

        </div>
    </div>
</div>
