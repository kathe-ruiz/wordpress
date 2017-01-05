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
<!-- begin titulo de seccion de dos lineas -->
<section class="two-lines">
  <div class="container text-center">
    <h2>Este es el título de la sección,<br>con a dos líneas</h2>
    <h4><p>Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit vel reiciendis.</p></h4>
    <br>
    <div class="row two-lines__block">
      <div class="col-sm-6 text-left two-lines__text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde illo pariatur qui ad veniam! Distinctio quasi est et modi quibusdam, vero. Sequi consectetur, quaerat vitae eum est. Saepe, minus tenetur.
      </div>
      <div class="col-sm-6 text-left two-lines__text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, eum! Voluptatibus aliquid, nihil sint, molestiae dolore, non minima numquam natus praesentium similique cum provident sunt magni, eum suscipit explicabo illum.
      </div>
    </div>
    <button class="two-lines__btn text-uppercase btn btn-primary">leer más</button>
  </div>
</section>
<!-- end titulo de seccion de dos lineas -->

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
<footer class="navbar-inverse">
  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis placeat at quod tenetur consequuntur repellat optio assumenda expedita quas vero, quo molestias porro ipsam, tempore veniam consectetur aliquam qui, illo.
</footer>
