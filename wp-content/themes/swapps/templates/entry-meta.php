<span><i class="fa fa-lg fa-calendar" aria-hidden="true"></i> <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time></span>
<span class="byline author vcard"><i class="fa fa-lg fa-keyboard-o" aria-hidden="true"></i> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></span>
<span><i class="fa fa-lg fa-folder-open-o" aria-hidden="true"></i>
<?php $posttags = get_the_tags();
if ($posttags) {
  $last = end($posttags);
  foreach($posttags as $tag) {
    echo $tag->name;
    $separator = ($tag === $last) ? '.' : ', ' ;
    echo $separator;
  }
} ?></span>
<span class="pull-right"><i class="fa fa-lg fa-comment-o" aria-hidden="true"></i> 3 comentarios</span>




