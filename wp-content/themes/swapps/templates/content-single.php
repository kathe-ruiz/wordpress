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
    <?php if (get_post_type() == 'post'): ?>
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
    <div class="entry-author">
      <div class="row">
        <div class="col-xs-12 heading-underline">
          <h3 class="heading-underline__title">About the author</h3>
        </div>
      </div>
      <div class="row author">
        <div class="col-xs-12 col-md-3">
          <?php echo get_avatar(
            $post->post_author,
            300, '', false,
            array('class' => array("img-circle", "img-responsive", "center-block"))
          ); ?>
        </div>
        <div class="col-xs-12 col-md-9">
          <p class="author-description">
            <?php the_author_meta('description', $post->post_author) ?>
          </p>
        </div>
      </div>
    </div>
    <footer>
    <?php comments_template('/templates/comments.php'); ?>
    </footer>
    <?php endif; ?>
  </article>
<?php endwhile; ?>
