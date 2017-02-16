<?php
/**
 * Template Name: Landing
 */
?>
<?php
  if (function_exists('get_field')){
    $landing_option = get_field('field_landing_option');
    $rows = get_field('field_rows');
  }else{
    $landing_option = False;
  }
?>
<?php if ($rows): ?>
  <?php foreach ($rows as $key => $row): ?>
  <?php $class_css = ""; ?>
  <?php if (!primary_landing_menu() and count($rows) > 2 and $key===1): ?>
    <?php if ($landing_option == 'Secondary Navbar'): ?>
      <nav class="hidden-xs hidden-sm navbar navbar-secondary not-vivible <?php if(sw_options('site_options_secondary_navbar_position')): ?><?php echo "fx"; ?><?php endif ?>
        <?php if (function_exists('sw_options') && sw_options('site_options_secondary_color')): ?><?php echo sw_options('site_options_secondary_color') ?><?php else: ?>navbar--transparent<?php endif?>" id="nav-sec">
        <ul id="menu-menu-secundario" class="nav navbar-nav <?php if(!sw_options('site_options_secondary_navbar_position')): ?><?php echo "pull-right";?><?php else: ?><?php echo "navbar-center"?><?php endif ?>">
          <?php foreach ($rows as $nav_item_key => $value): ?>
              <?php if ($nav_item_key > 0): ?>
                <?php if ($value['section_name']) : ?>
                  <?php $string_menu = slugify($value['section_name']); ?>
                  <li id="menu-item-<?php echo "$nav_item_key"; ?>" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-<?php echo "$nav_item_key"; ?> current_page_item menu-item-<?php echo "$nav_item_key"; ?>">
                    <a title="<?php echo ($value['section_name']); ?>" href="<?php echo get_permalink() ?>#<?php if (($value['section_name'])): echo ($string_menu); else: echo "menu-$nav_item_key"; endif ?>"><?php echo ($value['section_name']); ?></a>
                  </li>
                <?php endif ?>
              <?php endif ?>
          <?php endforeach ?>
        </ul>
      </nav>
    <?php endif ?>
  <?php endif ?>
  <section
  <?php if ($row['custom_background']): ?>
    <?php if($row['background_image']): ?> style="background-image: url(<?php echo $row['background_image']['url']; ?>)"
      <?php $class_css .= " bg-image "; ?>
    <?php endif; ?>
    <?php if ($row['background_color']): ?>
      <?php $class_css .= $row['background_color']; ?>
    <?php endif ?>
  <?php endif ?>
  <?php
  switch ($row['row_items'][0]['acf_fc_layout']){
    case 'full_slider':
    $class_css .= ' sliders-main ';
    break;
    case 'text_slider':
    $class_css .= ' sliders-secondary ';
    break;
    case 'video':
    $class_css .= ' video ';
    break;
    case 'map':
    $class_css .= ' map ';
    break;
    default:
    $class_css .= ' home-section ';
    break;
  }
  ?>

  <?php $string_menu = slugify($row['section_name']);?>
  id="<?php if (($row['section_name'])): echo ($string_menu); else: echo "menu-$key"; endif ?>"
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

<?php if (WP_DEBUG): ?>
  <section>
    <h1>Debug Vars</h1>
    <pre>
      <?php echo the_field('field_row_background_color') ?>
      <?php print_r($rows); ?>
    </pre>
  </section>
<?php endif ?>
