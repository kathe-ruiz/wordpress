
<?php while (have_posts()) : the_post(); ?>
  <div class="row card-wrapper">
    <article <?php post_class(); ?>>
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 content-single__div">
        <h1 class="text-center"><?php the_title() ?></h1>
        <div class="card-wrapper">
          <div class="card">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('medium_large', array( 'class' => "img-responsive center-block content-single__image full-width")) ?>
            <?php else: ?>

              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pdocast-default-image.png" alt="Podcast image" class="img-responsive center-block content-single__image full-width">
            <?php endif; ?>
              <div class="entry-content content-single__text">
                <?php the_content(); ?>
              </div>
            <?php get_template_part('templates/entry-meta'); ?>
          </div>
        </div>
      </div>
    </article>
  </div>
<?php endwhile; ?>
<div class="container">
  <div class="row">
      <?php
      $posts_array = get_posts(
          array(
              'posts_per_page' => -1,
              'post_type' => 'podcast',
              // 'tax_query' => array(
              //     array(
              //         'taxonomy' => 'fabric_building_types',
              //         'field' => 'term_id',
              //         'terms' => $cat->term_id,
              //     )
              // )
          )
      );
      ?>
    <div class="col-md-12">
      <h2>More from</h2>
    </div>

    <?php foreach ($posts_array as $key => $podcast): ?>
      <div class="col-md-4 col-sm-6 col-xs-12 podcast-item">
          <div class="podcast-image">
              <div class="reveal-link">
                  <div class="actions">
                      <p>
                        <a class="button button-wht" href="/podcasts/01583-hello">
                          Listen
                        </a>
                      </p>
                  </div>
              </div>
              <?php $image = get_the_post_thumbnail(
                $podcast->ID, array( 290, 121), array(
                  'class'  => 'img-responsive',
                  'width'  => 290,
                  'height' => 121));?>
              <?php if ($image): ?>
                <?php echo $image; ?>
              <?php else: ?>
                <img alt="Podcasts" src="<?php echo get_template_directory_uri(); ?>/assets/images/pdocast-default-image.png" class="img-responsive" width="290" height="121">
              <?php endif ?>
          </div>
          <div class="podcast-info">
              <div class="title ellipsis">
                  <a href="/sermons/01583-hello">
                    <?php echo $podcast->post_title ?>
                  </a>
              </div>
              <span><?php echo $podcast->post_date ?></span>
          </div>
      </div>
    <?php endforeach ?>
      <div class="col-md-4">
        <?php echo $key; ?>
        <?php print_r($podcast); ?>
      </div>

  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php comments_template('/templates/comments.php'); ?>
    </div>
  </div>
</div>
