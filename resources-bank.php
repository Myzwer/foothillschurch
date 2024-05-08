<?php
/**
 * Template Name: Template - Resource Bank
 *
 * This page is used anytime you need to gather resources together on a single page.
 *
 * Usage: Use in WP-Admin, select "Form Success" from page template.
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */

get_header(); ?>

    <div class="bg-white">
        <div class="xl:w-8/12 max-w-screen-2xl mx-auto p-5 xl:p-5 ">
            <div class="grid grid-cols-12 gap-4 md:gap-4">
                <div class="col-span-12 py-5 max-w-none">

                    <div class="resource">
                        <div class="resource-inner">
                            <div class="bg-saltydog py-5 text-center text-white text-2xl">
                                <h3>General Parenting</h3>
                            </div>
                            <ul class="resource-tab">
                                <li class="tab-title"><i class="fa fa-chevron-right" aria-hidden="true"></i>Bibles</li>
                                <li class="tab-content">
                                    <div class="py-4">
                                        <p class="font-bold capitalize text-lg">ESV Childrens Bible (Ages 5-10)</p>
                                        <a class="underline" href="#">View On Amazon </a><i
                                                class="fa-sharp fa-regular fa-arrow-up-right-from-square"></i>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- General Parenting End -->

<?php get_footer();
