<?php
/**
 * Mockup Template Partial
 *
 * This file contains the ACF and php code for use in the template builder (page.php).
 * Must be inside flex content, all of this code uses subfields. It won't work standalone.
 *
 * It generates a block for showcasing a mockup on one side and some text on the other.
 *
 * Usage: get_template_part( 'components/blocks/mockup' );
 *
 * @package WordPress
 * @subpackage Bootcamp_2
 * @author Josh Forrester <josh@onefortyfivedesign.com>
 * @version 1.0.0
 */
?>

<?php
$side  = get_sub_field( 'side_selection' );
$order = ( $side == 'left' ) ? '' : 'md:order-2';
?>


<div class="lg:max-w-6xl mx-auto grid grid-cols-12 p-5 py-10 gap-4">

    <div class="col-span-12 lg:col-span-5 <?php echo $order; ?>">
		<?php
		$mockupImage = get_sub_field( 'mockup_image' );
		if ( ! empty( $mockupImage ) ): ?>
            <img class="block mx-auto md:w-fit pt-5" src="<?php echo esc_url( $mockupImage['url'] ); ?>"
                 alt="<?php echo esc_attr( $mockupImage['alt'] ); ?>">
		<?php endif; ?>
    </div>

    <div class="col-span-12 lg:col-span-7 relative">
        <div class="content-middle-medium">
            <div class="prose text-pretty">
				<?php the_sub_field( 'content' ); ?>
            </div>
        </div>
    </div>
</div>


