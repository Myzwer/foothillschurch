<?php
/**
 * This controls the footer for the site.
 * Contains the footer of the site as well as WP's required code and the closing body and HTML tags.
 *
 * It does not use tailwind, it's SCSS file can be found at ./assets/src/sass/components/footer.scss.
 * The "Footer Columns" (currently only 1) are configured in functions.php.
 *
 * The links are coming from appearance -> menu in WP admin
 * Everything else is coming from the options page in WP admin.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */
?>

<!--Start Footer-->
<footer class="footer">

	<?php
	// Foothills Church Logo
	$logoImage = get_field( 'circle_outline_logo', 'options' );
	if ( ! empty( $logoImage ) ): ?>
        <img src="<?php echo esc_url( $logoImage['url'] ); ?>" alt="<?php echo esc_attr( $logoImage['alt'] ); ?>">
	<?php endif; ?>


	<?php
	// WordPress Generated Link Lists
	// Use WP Admin to update these, max 3 without editing SCSS
	wp_nav_menu( array( 'theme_location' => 'footer-column-1' ) ); ?>


	<?php // Adds a social link to Facebook using the URL from the options ACF tab in WP Admin  ?>
    <div class="social-links">
        <a href="<?php the_field( 'facebook', 'options' ); ?>" target="_blank" aria-label="Follow us on Facebook">
            <i class="fa-brands fa-facebook"></i>
        </a>
    </div>

    <div class="social-links">
        <a href="<?php the_field( 'instagram', 'options' ); ?>" target="_blank" aria-label="Follow us on Instagram">
            <i class="fa-brands fa-instagram"></i>
        </a>
    </div>

    <div class="social-links">
        <a href="<?php the_field( 'twitter', 'options' ); ?>" target="_blank" aria-label="Follow us on Twitter">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
    </div>

    <div class="social-links">
        <a href="mailto:<?php the_field( 'email', 'options' ); ?>" aria-label="Send us an email">
            <i class="fa-light fa-envelope"></i>
        </a>
    </div>


	<?php // Copyright and Privacy Policy ?>
    <div class="ftr-info">
        <p class="copyright">
            <i class="fa-regular fa-copyright"></i>
			<?php
			// Add the current year dynamically + Church name
			echo date( "Y" ); ?> Foothills Church
        </p>

		<?php // Add a link to the privacy policy page, comes from the options page in WP Admin ?>
        <a href="<?php the_field( 'privacy_policy', 'options' ); ?>" class="privacy">Privacy Policy</a>

    </div>

</footer>


<?php
// Wordpress Requires This
wp_footer(); ?>

<?php // Closes out the site :)  ?>
</body>
</html>

