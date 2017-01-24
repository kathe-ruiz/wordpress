<div class="container">
  <div class="row text-center">
    <?php if (isset($row_item['video_title']) ): ?>
      <div class="heading">
        <h2 class="heading__title"><?php echo $row_item['video_title'] ?></h2>
      </div>
    <?php endif; ?>
    <?php if (isset($row_item['video_url']) ): ?>
      <?php $video_url = $row_item['video_url']; ?>
      <?php $video_id = ''; ?>
      <?php if(stripos($video_url, "youtube.com") !== false): 
          $video_type = 'youtube';
          parse_str( parse_url( $video_url, PHP_URL_QUERY ), $q );
          $video_id = $q['v']; 
        elseif (stripos($video_url, "vimeo.com") !== false): 
          $video_type = 'vimeo'; 
          $video_id = (int) substr(parse_url($video_url, PHP_URL_PATH), 1); ?>
        <div data-type="<?php echo $video_type ?>" data-video-id="<?php echo $video_id ?>"></div>
      <?php else: ?>
        <?php $video_extension = pathinfo($video_url, PATHINFO_EXTENSION) ?>
        <video poster="" controls>
          <source src="<?php echo $video_url ?>" type="video/<?php echo $video_extension ?>">
        </video>
      <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($row_item['video_description']) ): ?>
      <p class="video__text">
        <?php echo $row_item['video_description'] ?>
      </p>
    <?php endif; ?>
  </div>
</div>