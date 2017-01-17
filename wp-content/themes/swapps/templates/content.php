<article <?php post_class( 'blog-item' ); ?>>
  <header class="heading-underline">
    <h3 class="heading-underline__title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  </header>
  <?php if (has_post_thumbnail()): ?>
    <?php echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-responsive center-block' ) ); ?>
  <?php else: ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-1.jpg" class="img-responsive center-block">
  <?php endif ?>
  <div class="blog-item__description entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <footer class="blog-item__footer">
    <div class="row">
      <div class="col-md-12">
        <?php get_template_part('templates/entry-meta'); ?>
      </div>
    </div>
  </footer>
</article>
