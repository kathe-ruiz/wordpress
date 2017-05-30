<div class="container">
<div class="col-md-<?php if(!display_internal_sidebar()){echo '12';}else{echo '8';} ?>">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  <?php endwhile; ?>
</div>	
<?php if ( display_internal_sidebar() ) : ?>
    <aside id="internal-sidebar" class="widget-area col-md-4" role="complementary">
      <?php dynamic_sidebar( 'internal_pages_sidebar' ); ?>
    </aside>
<?php endif; ?>

</div>
