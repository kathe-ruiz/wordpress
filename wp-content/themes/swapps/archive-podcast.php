<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php $row = 0; ?>
<?php while (have_posts() and $row == 0) : the_post(); ?>
  <?php get_template_part( 'templates/podcast', 'head' ) ?>
  <?php $row = 1; ?>
<?php endwhile; ?>

<?php '<div class="card-wrapper row _pdt50">
  <div class="col-sm-8 col-sm-offset-2">
    <div class="sermon-search search-bar row">
      <form accept-charset="UTF-8" action="/podcast" class="inline-form" method="get">
        <div class="form-group col-sm-9">
          <input class="form-control" id="s" name="s" placeholder="Search for a podcast" type="text" />
        </div>
        <div class="form-group col-sm-3">
          <button class="btn btn-podcast btn-block" name="button" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>'
 ?>
<div class="col-md-10 col-md-offset-1 podcast-list">
  <?php while (have_posts()) : the_post(); ?>
    <?php if ($row != 0): ?>
      <?php $podcast = get_post(); ?>
      <?php include(locate_template( 'templates/podcast-item.php' )) ?>
    <?php endif ?>
  <?php endwhile; ?>
</div>

<div class="col-md-12 text-center">
  <?php echo custom_pagination() ?>
</div>
