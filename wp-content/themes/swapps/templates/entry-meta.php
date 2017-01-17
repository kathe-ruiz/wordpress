<div class="entry-meta">
  <i class="fa fa-lg fa-calendar entry-meta__icon" aria-hidden="true"></i>
  <time class="updated entry-meta__date" datetime="<?= get_post_time('c', true); ?>">
    <?= get_the_date(); ?>
  </time>
  <span class="byline author vcard">
    <i class="fa fa-lg fa-keyboard-o entry-meta__icon" aria-hidden="true"></i>
    <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn entry-meta__author">
      <?= get_the_author(); ?>
    </a>
  </span>
  <span>
    <i class="fa fa-lg fa-folder-open-o entry-meta__icon" aria-hidden="true"></i>
    <span class="entry-meta__tags">
      <?php $posttags = get_the_tags();
      if ($posttags) {
        $last = end($posttags);
        foreach($posttags as $tag) {
          echo $tag->name;
          $separator = ($tag === $last) ? '.' : ', ' ;
          echo $separator;
        }
      } ?>
    </span>
  </span>
  <span class="pull-right">
    <i class="fa fa-lg fa-comment-o entry-meta__comment" aria-hidden="true"></i>
     <?php comments_number( $post_id ); ?>
  </span>
</div>




