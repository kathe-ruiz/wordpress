<?php
/**
 * Template Name: Map Template
 */
?>
<div class="container">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  <?php endwhile; ?>
</div>
<?php include 'templates/includes/component-map.php' ?>
