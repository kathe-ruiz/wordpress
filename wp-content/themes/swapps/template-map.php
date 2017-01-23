<?php
/**
 * Template Name: Map Template
 */
?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<?php include 'templates/includes/component-map.php' ?>
