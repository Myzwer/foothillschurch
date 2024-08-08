<?php
/**
 * This controls the footer for the site. Obviously. Who tf would name it footer if it didn't do that.
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

	<?php // Foothills Church Logo ?>
    <img src="<?php the_field( 'circle_outline_logo', 'options' ); ?>" alt="Foothills Church Logo">


	<?php
	// WordPress Generated Link Lists
	// Use WP Admin to update these, max 3 without editing SCSS
	wp_nav_menu( array( 'theme_location' => 'footer-column-1' ) ); ?>


	<?php // Adds a social link to Facebook using the URL from the options ACF tab in WP Admin  ?>
    <div class="social-links">
        <a href="<?php the_field( 'facebook', 'options' ); ?>" target="_blank">
            <i class="fa-brands fa-facebook"></i>
        </a>
    </div>

	<?php // Adds a social link to Instagram using the URL from the options ACF tab in WP Admin ?>
    <div class="social-links">
        <a href="<?php the_field( 'instagram', 'options' ); ?>" target="_blank">
            <i class="fa-brands fa-instagram"></i>
        </a>
    </div>

	<?php // Adds a social link to twitter using the URL from the options ACF tab in WP Admin ?>
    <div class="social-links">
        <a href="<?php the_field( 'twitter', 'options' ); ?>" target="_blank">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
    </div>


	<?php // Adds a mailto using the address from the options ACF tab in WP Admin ?>
    <div class="social-links">
        <a href="mailto:<?php the_field( 'email', 'options' ); ?>">
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

