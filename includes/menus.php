<?php
/**
 * Menus
 *
 * This file handles the registration of custom navigation menus in WordPress.
 * It includes the use of a navwalker for the main menu and registers menus for
 * the main navigation, top bar, and footer columns.
 *
 * Usage: Include this file in functions.php to register and customize navigation menus.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

// Adds the navwalker for the main Menu.
require_once("nav_walker.php");

/*
 * Registers the new menus
 * https://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
 *
*/

function register_nav_menus()
{
	// Main Navbar
	register_nav_menu('main-navigation', ('Main Navigation'));
	// Header Top Bar
	register_nav_menu('top-bar', ('Top Bar'));
	// Footer
	register_nav_menu('footer-column-1', ('Footer Column 1'));
}

add_action('init', 'register_nav_menus');
