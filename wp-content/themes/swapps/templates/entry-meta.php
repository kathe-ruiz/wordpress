<div class="entry-meta">
  <span class="entry-meta__item">
    <i class="entry-meta__icon fa fa-lg fa-calendar " aria-hidden="true"></i>
    <time class="updated entry-meta__text" datetime="<?= get_post_time('c', true); ?>">
      <?= get_the_date(); ?>
    </time>
  </span>
  <span class="entry-meta__item byline author vcard">
    <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn entry-meta__text entry-meta__link">
      <i class="entry-meta__icon fa fa-lg fa-keyboard-o " aria-hidden="true"></i>
    </a>
    <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn entry-meta__text entry-meta__link">
      <?= get_the_author(); ?>
    </a>
  </span>
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
  <span class="entry-meta__item entry-meta__item--right">
    <a class="entry-meta__text entry-meta__link" href="<?php echo get_permalink(). '#comments'; ?>">
      <i class="fa fa-lg fa-comment-o entry-meta__icon" aria-hidden="true"></i>
    </a>
    <a class="entry-meta__text entry-meta__link" href="<?php echo get_permalink(). '#comments'; ?>">
      <?php comments_number( 'No comments' ); ?>
    </a>
  </span>
</div>
