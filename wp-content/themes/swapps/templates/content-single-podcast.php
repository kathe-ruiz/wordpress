
<?php while (have_posts()) : the_post(); ?>
  <section class="podcast-detail">
    <?php get_template_part( 'templates/podcast', 'head' ) ?>
  </section>
<?php endwhile; ?>
<?php
  $series = get_the_terms(get_the_ID(), 'series');
  if (isset($series[0])) {
    $serie_id = $series[0]->term_id;
    $serie_name = $series[0]->name;
    $query = new WP_Query(
        array(
            'post__not_in' => array(get_the_ID()),
            'posts_per_page' => 9,
            'post_type' => 'podcast',
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'series',
                    'field' => 'term_id',
                    'terms' => $serie_id,
                )
            ),
        )
    );
  }else{
    $query = False;
  }
?>
<section class="related-podcasts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 list-title text-center">More from <strong><?php echo $serie_name ?></strong></h2>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <?php if ($query and count($query->posts) > 0): ?>
        <?php foreach ($query->posts as $key => $podcast): ?>
          <?php include(locate_template( 'templates/podcast-item.php' )) ?>
        <?php endforeach ?>
      <?php else: ?>
        <p class="h5 text-center">There are no other podcasts in this series: <?php echo $serie_name ?>. <a href="/podcasts/">See all podcasts</a></p>
      <?php endif ?>
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
