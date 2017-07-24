
<?php while (have_posts()) : the_post(); ?>
  <section class="podcast-detail">
    <?php get_template_part( 'templates/podcast', 'head' ) ?>
  </section>
<?php endwhile; ?>
<section class="related-podcasts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="h3 list-title text-center">More from <strong>category</strong></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        
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

      <?php foreach ($posts_array as $key => $podcast): ?>
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
