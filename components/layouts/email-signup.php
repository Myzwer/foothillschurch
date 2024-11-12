<?php
/**
 * Email Sign Up Template Partial
 *
 * This file contains the ACF and php code for use wherever you need to generate a newsletter / email sign up.
 *
 * Usage: get_template_part( 'components/layouts/email-signup' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<div class="grid grid-cols-12 gap-4 md:gap-10 p-10 lg:p-0">

    <div class="col-span-12 md:order-1 relative">
        <div class=" prose max-w-none">
			<?php the_field( 'email_cta', 'option' ); ?>
        </div>
    </div>

    <div class="col-span-12 md:order-1 relative">
        <div class="text-left">
			<?php
			// Gravity Forms Shortcode
			$formid = get_field( "form_id", 'option' );
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


