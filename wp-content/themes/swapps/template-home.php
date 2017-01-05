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
<?php $main_slider = get_sw_slider('Main') ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
<footer class="navbar-inverse">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis placeat at quod tenetur consequuntur repellat optio assumenda expedita quas vero, quo molestias porro ipsam, tempore veniam consectetur aliquam qui, illo.
</footer>
