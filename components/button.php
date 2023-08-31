<?php
$button = get_field('button');
?>
<style>
  .button {
    display: inline-block;
    background: blue;
    padding: 10px 15px;
    color: white;
    border-radius: 5px;
    margin-top: 20px;
  }
</style>
<? if ($button) : ?>
  <a class="button" href="<?= $button['button_link'] ?>">
    <?= $button['button_text']; ?>
  </a>
<? endif;
