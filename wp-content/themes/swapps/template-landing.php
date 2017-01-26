<?php
/**
 * Template Name: Landing
 */


?>
<?php $rows = get_field('field_rows'); ?>
<?php if ($rows): ?>
  <?php foreach ($rows as $key => $row): ?>
  <?php $class_css = ""; ?>
  <section
  <?php if ($row['custom_background']): ?>
    <?php if($row['background_image']): ?> style="background-image: url(<?php echo $row['background_image']['url']; ?>)"
      <?php $class_css .= " bg-image "; ?>
    <?php endif; ?>
    <?php if ($row['background_color']): ?>
      <?php $class_css .= $row['background_color']; ?>
    <?php endif ?>
  <?php endif ?>
  <?php $class_css .= ($key == 0) ?  ' sliders-main ' : ''; ?>
  <?php
  if ($key != 0){
    $class_css .= ($row['row_items'][0]['acf_fc_layout'] == 'text_slider') ? ' sliders-secondary ' : ' home-section ';
    $class_css .= ($row['row_items'][0]['acf_fc_layout'] == 'video') ? ' video ' : '';
  };
  ?>
  class="<?php echo $class_css ?>">
      <?php foreach ($row['row_items'] as $row_item_key => $row_item): ?>
      <?php
      switch($row_item['acf_fc_layout']){
        case 'title':
        include('layouts/layout_title.php');
        break;
        case 'text':
        include('layouts/layout_text.php');
        break;
        case 'full_slider':
        include('layouts/layout_full_slider.php');
        break;
        case 'button':
        include('layouts/layout_button.php');
        break;
        case 'text_slider':
        include('layouts/layout_text_slider.php');
        break;
        case 'gallery':
        include('layouts/layout_gallery.php');
        break;
        case 'images_grid':
        include('layouts/layout_images_grid.php');
        break;
        case 'image_text_button':
        include('layouts/layout_image_text_button.php');
        break;
        case 'video':
        include('layouts/layout_video.php');
        break;
        case 'icon':
        include('layouts/layout_icon.php');
        break;
        case 'map':
        include('layouts/layout_map.php');
        break;
      }
      ?>
      <?php endforeach ?>
  </section>
  <?php endforeach ?>
<?php else: ?>
  <?php include ("template-home.php") ?>
<?php endif ?>


<section>
  <h1>Debug Vars</h1>
  <pre>
    <?php echo the_field('field_row_background_color') ?>
    <?php print_r($rows); ?>
  </pre>
</section>
