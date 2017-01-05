<?php
/**
 * Template Name: Style Guide Template
 */
?>
<?php get_template_part('templates/page', 'header'); ?>

<!-- begin container -->
<div class="container">
  <h2>Buttons</h2>
  <?php if($main_slider): ?>
    <?php $slides = get_slides_array($main_slider); ?>
    <div class="owl-carousel owl-theme">
      <?php foreach ($slides as $key => $slide): ?>
        <div class="item">
            <img src="<?php echo $slide['image']['url'] ?>" alt="<?php echo $slide['image']['alt'] ?>" class="img-fluid">
            <div class="caption">
              <h2><?php echo $slide['title'] ?></h2>
              <p><?php echo $slide['description'] ?></p>
              <a href="<?php echo $slide['link'] ?>" class="btn btn-primary">
                <?php echo $slide['call_to_action_text'] ?>
              </a>
            </div>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif; ?>
  <div class="text-center">
    <a href="#" class="btn btn-default">Default</a>
    <a href="#" class="btn btn-info">Info</a>
    <a href="#" class="btn btn-primary">Primary</a>
    <a href="#" class="btn btn-success">Success</a>
    <a href="#" class="btn btn-warning">Warning</a>
    <a href="#" class="btn btn-danger">Danger</a>
    <a href="#" class="btn btn-primary-outline">Outline</a>
    <a href="#" class="btn btn-theme">Theme</a>
  </div>
</div>
<!-- end container -->
