<div class="row card-wrapper">
  <article <?php post_class(); ?>>
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 content-single__div">
      <?php if (isset($listing) and $listing): ?>
        <h1 class="podcast-title text-center">Messages</h1>
        <?php $query = new WP_Query(array('posts_per_page' => 1,'post_type' => 'podcast')); ?>
        <?php while($query->have_posts()) : $query->the_post(); ?>
        <!-- Card wrapper -->
        <div class="card-wrapper">
          <div class="card">
            <a href="<?php echo get_permalink() ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large', array( 'class' => "img-responsive center-block content-single__image full-width")) ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pdocast-default-image.png" alt="Podcast image" class="img-responsive center-block content-single__image full-width">
              <?php endif; ?>
            </a>
              <div class="entry-content content-single__text">
                <?php the_content(); ?>
              </div>
          </div>
        </div>
        <!-- End Card wrapper -->
        <?php endwhile; ?>
      <?php else: ?>
        <?php
          $series = get_the_terms(get_the_ID(), 'series');
          if (isset($series[0])) {
            $serie_id = $series[0]->term_id;
            $serie_name = $series[0]->name;
          }
        ?>
        <?php if (isset($serie_name )): ?>
          <h1 class="podcast-title text-center"><?php echo $serie_name; ?></h1>
        <?php endif ?>
        <!-- Card wrapper -->
        <div class="card-wrapper">
          <div class="card">
            <a href="<?php echo get_permalink() ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium_large', array( 'class' => "img-responsive center-block content-single__image full-width")) ?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pdocast-default-image.png" alt="Podcast image" class="img-responsive center-block content-single__image full-width">
              <?php endif; ?>
            </a>
              <div class="entry-content content-single__text">
                <?php the_content(); ?>
              </div>
          </div>
        </div>
        <!-- End Card wrapper -->
      <?php endif ?>

    </div>
  </article>
</div>
