<?php

$layout = get_sub_field('cta_layout');
$image = get_sub_field('cta_image');
$text = get_sub_field('cta_text');
$button = get_sub_field('cta_button');

$className = "cta {$layout}";
?>
<style>
  .cta {
    display: flex;
    gap: 20px;
  }
  .cta.image_left {
    flex-direction: row;
  }
  .cta.image_right {
    flex-direction: row-reverse;
  }
  .cta-image {
    padding: 10px;
    flex: 2;
  }
  .cta-content {
    flex: 5;
  }
  .cta-content .button {
    display: inline-block;
    background: blue;
    padding: 10px 15px;
    color: white;
    border-radius: 5px;
    margin-top: 20px;
  }
</style>
<div class="<?= $className ?>">
  <div class="cta-image">
  <?php echo wp_get_attachment_image( $image, 'full' ); ?>
  </div>
  <div class="cta-content">
    <?= $text ?>
    <a class="button" href="<?= $button['cta_button_link'] ?>"><?= $button['cta_button_text'] ?></a>
  </div>
</div>