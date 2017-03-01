<?php $video_id = uniqid(); ?>
<div class="container">
  <div class="row text-center relative">
    <?php if (isset($row_item['video_title']) ): ?>
      <div class="heading">
        <h2 class="heading__title"><?php echo $row_item['video_title'] ?></h2>
      </div>
    <?php endif; ?>
    <i class="fa fa-play-circle video__icon" aria-hidden="true" data-target="#video-<?php echo $video_id ?>"></i>
    <?php if (isset($row_item['video_description']) ): ?>
      <p class="video__text"><?php echo strip_tags($row_item['video_description']) ?></p>
    <?php endif; ?>
  </div>
</div>
<!-- Modal -->
<div class="modal fade video__modal" tabindex="-1" role="dialog" id="video-<?php echo $video_id ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <?php if (isset($row_item['video_url']) ): ?>
          <div class="video__player">
          <?php $video_url = $row_item['video_url']; ?>
          <?php $video_id = ''; ?>
          <?php if(stripos($video_url, "youtube.com") !== false): 
              $video_type = 'youtube';
              parse_str( parse_url( $video_url, PHP_URL_QUERY ), $q );
              $video_id = $q['v']; ?>
            <div data-type="<?php echo $video_type ?>" data-video-id="<?php echo $video_id ?>"></div>
            <?php elseif (stripos($video_url, "vimeo.com") !== false): 
              $video_type = 'vimeo'; 
              $video_id = (int) substr(parse_url($video_url, PHP_URL_PATH), 1); ?>
            <div data-type="<?php echo $video_type ?>" data-video-id="<?php echo $video_id ?>"></div>
          <?php else: ?>
            <?php $video_extension = pathinfo($video_url, PATHINFO_EXTENSION) ?>
            <video poster="" controls>
              <source src="<?php echo $video_url ?>" type="video/<?php echo $video_extension ?>">
            </video>
          <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->