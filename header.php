<?php
/**
 * This controls the navbar for the site. Obviously. Who tf would name it header if it didn't do that.
 * Contains both navbars + all of WP required things as well as meta information.
 *
 * It does not use tailwind, it's SCSS file can be found at ./assets/src/sass/components/navbar.scss.
 *
 * All of the dynamic wordpress links can be configured in functions.php.
 * The links are coming from appearance -> menu in WP admin
 * Everything else is coming from the options page in WP admin.
 *
 * The main navigation (not the topbar) uses a custom navwalker, that can be found at ./nav_walker.php.
 *
 * This is the template that displays all of the <head> section and everything up until the main body.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @since 1.0.0
 */

?>
    <!doctype html>

	<?php // Use WP to declare language attribute ?>
<html <?php language_attributes(); ?>>


    <head>

		<?php // Declare WP's meta info ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">

		<?php // Set Viewport ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">


		<?php
		// Enable FOAF
		// https://wordpress.stackexchange.com/questions/173117/why-is-there-a-link-tag-with-rel-profile-pointing-to-gmpg-org
		?>
        <link rel="profile" href="https://gmpg.org/xfn/11">

		<?php
		// Font Awesome Loadin
		// It's Josh Forrester's Kit, so if ever he doesn't work for FC, you need to update this to a new kit
		?>
        <script src="https://kit.fontawesome.com/062be7d052.js" crossorigin="anonymous"></script>

		<?php
		// WordPress Required Stuff
		wp_head();
		?>

    </head>

<?php // Open Body, Apply any Tailwind classes that are global here, Leave WP stuff alone.  ?>
<body <?php body_class( "leading-normal tracking-normal" ); ?>>

<?php //Wordpress Required Stuff  ?>
<?php wp_body_open(); ?>

<?php
// Start Topbar code
// The config is in functions.php - The links can be edited in Wp Admin -> Appearance -> Menus.
// THIS DOES NOT USE THE NAVWALKER.
?>
    <div class="bg-white">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'top-bar',
			// 'menu_class'     => 'pass-class', no additional classes needed,  but if they were they go here.
			'items_wrap'     => '<ul class = "topbar">%3$s</ul>'
		) );
		?>
    </div>

<?php // End Topbar ?>

<?php // Start Main Navbar ?>
    <section class="navigation">
        <div class="nav-container">

			<?php // Link brand image to homepage. Both the link and img are controlled from Options ACF in WP Admin ?>
            <div class="brand">
                <a href="<?php the_field( 'homepage', 'options' ); ?>">
                    <img src="<?php the_field( 'circle_outline_logo', 'options' ); ?>"
                         alt="Foothills Church Logo">
                </a>
            </div>

			<?php // Start actual Nav elements ?>
            <nav>
				<?php // For JS to bind to for mobile functionality ?>
                <div class="nav-mobile">
                    <a id="nav-toggle" href="#!">
                        <span></span>
                    </a>
                </div>


				<?php
				// Start Wordpress Generated Links - Can up updated from Wp Admin -> Appearance -> Menus.
				// This DOES use a custom navwalker found at ./nav_walker.php
				wp_nav_menu( array(
					'theme_location' => 'main-navigation',
					'menu_class'     => 'primary-menu', // pass whatever classes to be added to top level here
					'walker'         => new PreLaunch_Walker(), // Uses a custom navwalker
					'items_wrap'     => '<ul class="nav-list">%3$s</ul>' // '%3$s' is a WP thing, it adds the content.
				) );
				?>
				<?php // End Mercy ?>
            </nav>
        </div>
    </section>
<?php // Start Body ?>