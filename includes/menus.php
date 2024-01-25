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

//*********** Main Navbar ***********
function main_navigation()
{
    register_nav_menu('main-navigation', ('Main Navigation'));
}

add_action('init', 'main_navigation');


//*********** Header Top Bar ***********
function top_bar()
{
    register_nav_menu('top-bar', ('Top Bar'));
}

add_action('init', 'top_bar');

//*********** Footer ***********
function register_col_1()
{
    register_nav_menu('footer-column-1', ('Footer Column 1'));
}

add_action('init', 'register_col_1');
