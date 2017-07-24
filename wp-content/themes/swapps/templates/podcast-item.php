<div class="col-md-4 col-sm-6 col-xs-12 podcast-item">
    <div class="podcast-image">
        <div class="reveal-link">
            <div class="actions">
                <p>
                  <a class="button button-wht" href="/podcasts/01583-hello">
                    Listen
                  </a>
                </p>
            </div>
        </div>
        <?php $image = get_the_post_thumbnail(
          $podcast->ID, array( 290, 121), array(
            'class'  => 'img-responsive center-block',
            'width'  => 290,
            'height' => 121));?>
        <?php if ($image): ?>
          <?php echo $image; ?>
        <?php else: ?>
          <img alt="Podcasts" src="<?php echo get_template_directory_uri(); ?>/assets/images/pdocast-default-image.png" class="img-responsive center-block" width="290" height="121">
        <?php endif ?>
    </div>
    <div class="podcast-info text-center">
        <div class="title ellipsis text-uppercase">
            <a href="/sermons/01583-hello">
              <?php echo $podcast->post_title ?>
            </a>
        </div>
        <span><?php echo $podcast->post_date ?></span>
    </div>
</div>