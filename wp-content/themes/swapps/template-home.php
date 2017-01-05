<?php
/**
 * Template Name: Home Template
 */
?>
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<?php $main_slider = get_sw_slider('main') ?>
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
</div>
<!-- end container -->

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
