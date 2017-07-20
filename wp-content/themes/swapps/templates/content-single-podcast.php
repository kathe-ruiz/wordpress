<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="content-single">
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 content-single__div">
          <h1 class="text-center"><?php the_title() ?></h1>
          <div class="card-wrapper">
            <div class="card">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large', array( 'class' => "img-responsive center-block content-single__image full-width")) ?>
              <?php else: ?>
                <img src="/wp-content/themes/swapps/assets/images/pdocast-default-image.png" alt="Podcast image" class="img-responsive center-block content-single__image full-width">
              <?php endif; ?>
                <div class="entry-content content-single__text">
                  <?php the_content(); ?>
                </div>
              <?php get_template_part('templates/entry-meta'); ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <footer>
      <?php comments_template('/templates/comments.php'); ?>
    </footer>
  </article>
<?php endwhile; ?>
