<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<!-- begin container -->
<div class="container">
  <h2>Buttons</h2>
  <div class="text-center">
    <a href="#" class="btn btn-default">Default</a>
    <a href="#" class="btn btn-inverse">Inverse</a>
    <a href="#" class="btn btn-info">Info</a>
    <a href="#" class="btn btn-primary">Primary</a>
    <a href="#" class="btn btn-success">Success</a>
    <a href="#" class="btn btn-warning">Warning</a>
    <a href="#" class="btn btn-danger">Danger</a>
    <a href="#" class="btn btn-outline">Outline</a>
    <a href="#" class="btn btn-theme">Theme</a>
  </div>
</div>
<!-- end container -->

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>

<footer class="navbar-inverse">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis placeat at quod tenetur consequuntur repellat optio assumenda expedita quas vero, quo molestias porro ipsam, tempore veniam consectetur aliquam qui, illo.
</footer>
