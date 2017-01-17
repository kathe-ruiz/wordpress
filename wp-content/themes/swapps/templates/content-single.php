<?php while (have_posts()) : the_post(); ?>
  <div class="container">
    <article <?php post_class(); ?>>
      <header>
        <div class="row">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="col-sm-12 col-md-12 image-title">
              <?php the_post_thumbnail('medium_large', array( 'class' => "img-responsive center-block")) ?>
            </div>
            <div class="col-sm-12 col-md-12">
              <?php get_template_part('templates/entry-meta'); ?>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </div>
          <?php else: ?>
            <div class="col-md-12">
              <?php get_template_part('templates/entry-meta'); ?>
              <div class="entry-content">
                <?php the_content(); ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </header>
      <footer>
      <?php comments_template('/templates/comments.php'); ?>
    </article>
    <?php dynamic_sidebar('sidebar-primary'); ?>
  </div>
<?php endwhile; ?>
