
<?php while (have_posts()) : the_post(); ?>
  <section class="podcast-detail">
    <?php get_template_part( 'templates/podcast', 'head' ) ?>
  </section>
<?php endwhile; ?>
<section class="related-podcasts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 list-title text-center">More from <strong>Series</strong></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <?php
      $series_array = [];
      $series = get_the_terms(get_the_ID(), 'series');
      foreach ($series as $serie) {
        array_push($series_array, $serie->term_id);
      };
      $query = new WP_Query(
          array(
              'posts_per_page' => 9,
              'post_type' => 'podcast',
              'tax_query' => array(
                  array(
                      'taxonomy' => 'series',
                      'field' => 'term_id',
                      'terms' => $series_array,
                  )
              )
          )
      );?>
      <?php foreach ($query->posts as $key => $podcast): ?>
        <?php include(locate_template( 'templates/podcast-item.php' )) ?>
      <?php endforeach ?>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php comments_template('/templates/comments.php'); ?>
    </div>
  </div>
</div>
