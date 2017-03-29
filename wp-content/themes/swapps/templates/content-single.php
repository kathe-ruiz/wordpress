<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
  asfasf
    <header class="content-single">
      <div class="row">
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="col-sm-12 col-md-12 content-single__div">
            <?php the_post_thumbnail('medium_large', array( 'class' => "img-responsive center-block content-single__image")) ?>
          </div>
          <div class="col-sm-12 col-md-12 content-single__content">
            <?php get_template_part('templates/entry-meta'); ?>
            <div class="entry-content content-single__text">
              <?php the_content(); ?>
            </div>
          </div>
        <?php else: ?>
          <div class="col-md-12 content-single__div">
            <?php get_template_part('templates/entry-meta'); ?>
            <div class="entry-content content-single__text">
              <?php the_content(); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </header>
    <footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
