<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
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
    <div class="entry-meta">
      <span class="entry-meta__item">
        <i class="entry-meta__icon fa fa-lg fa-folder-open-o" aria-hidden="true"></i>
        <span class="entry-meta__text">
          <?php $posttags = get_the_tags();
          if ($posttags):
            $last = end($posttags);
            foreach($posttags as $tag){
              echo '<a class="entry-meta__link" href="'. get_tag_link($tag->term_id) .'">'. $tag->name .'</a>';
              $separator = ($tag === $last) ? '.' : ', ' ;
              echo $separator;
            }
          else:
            echo "No tags.";
          endif;
          ?>
        </span>
      </span>
    </div>
    <footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
