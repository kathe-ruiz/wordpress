<?php
  /**
   * Component slider with OWL Carousel javascript plugin
   * @var slider no required, if the sliders
   * is empty default slider is rendered
   *
   */
?>
<?php $screen_type = get_field('slider_type', $row_item['slider']->ID); ?>
<?php $slides = get_slides_array($row_item['slider']); ?>
<?php $type = $row_item['slider_type']; ?>
<?php $height = ($type == 'fixed') ? $row_item['slider_height'] : '' ; ?>
<?php $slider_id = uniqid(); ?>

<?php if($type !== 'smart'): ?>
<script>
// Initialize slider
  jQuery(document).ready(function() {
    jQuery('#slider-<?php echo $slider_id; ?>').owlCarousel({
      items: 1,
      loop: true,
      margin: 0,
      responsiveClass: true,
      responsive : {
          0 : {
              dots : false,
          },
          768 : {
              dots : true,
          }
      },
      nav: true,
      navText: [
        "<i class='fa fa-angle-left fa-lg' aria-hidden='true'></i>",
        "<i class='fa fa-angle-right fa-lg' aria-hidden='true'></i>"
      ],
      autoplay:true,
      <?php if ($row_item['timeout']): ?>
      autoplayTimeout:<?php echo $row_item['timeout'] ?>
      <?php endif; ?>
    });
  });
</script>
<div id="slider-<?php echo $slider_id; ?>" class="owl-carousel owl-theme">
  <?php foreach ($slides as $key => $slide): ?>
    <?php
      $image = get_if_exists($slide['image']);
      $video = get_if_exists($slide['video']);
      $title = get_if_exists($slide['title']);
      $subtitle = get_if_exists($slide['title_2']);
      $description = get_if_exists($slide['description']);
      $link = get_if_exists($slide['link']['url']);
      $cta = get_if_exists($slide['link']['title']);

      $style = '';

      if(get_fields($row_item['slider'])['slider_type'] == 'full_responsive'){
        $type = 'full_responsive';
      }

      switch ( $type ) {
        case 'full':
          $style = "min-height: 600px";
          break;
        case 'fixed':
          $style = "height: {$height}px";
          break;
        case 'full_responsive':
          $style = "";
          break;

        default:
          break;
      }
    ?>
    <div class="item item-<?php echo $type ?>"
      <?php if( $style ): ?> style="<?php echo $style; ?>"<?php endif; ?>>
      <?php if ( isset($image) && $image ): ?>
        <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"<?php if( $screen_type== 'full_responsive' ): ?> style="width: 100%;min-height: initial;"<?php endif; ?>>
        <?php if ($title || $description || ($link and $cta)): ?>
        <div class="caption">
          <?php if ($title || $description): ?>
            <?php if ($title): ?><h2><?php echo $title ?></h2><?php endif ?>
            <?php if ($subtitle): ?><h4><?php echo $subtitle ?></h4><?php endif ?>
            <?php if ($description): ?><p class="text-secondary"><?php echo $description ?></p><?php endif ?>
          <?php endif ?>
          <?php if ($link and $cta): ?>
            <a href="<?php echo $link ?>" class="btn btn-primary">
              <?php echo $cta; ?>
            </a>
          <?php endif ?>
        </div>
        <?php endif; ?>
      <?php elseif( isset($video) && $video ): ?>
        <div class="video__player">
          <?php $video_id = ''; ?>
          <?php if(stripos($video, "youtube.com") !== false):
              $video_type = 'youtube';
              parse_str( parse_url( $video, PHP_URL_QUERY ), $q );
              $video_id = $q['v']; ?>
            <div data-type="<?php echo $video_type ?>" data-video-id="<?php echo $video_id ?>"></div>
            <?php elseif (stripos($video, "vimeo.com") !== false):
              $video_type = 'vimeo';
              $video_id = (int) substr(parse_url($video, PHP_URL_PATH), 1); ?>
            <div data-type="<?php echo $video_type ?>" data-video-id="<?php echo $video_id ?>"></div>
          <?php else: ?>
            <?php $video_extension = pathinfo($video, PATHINFO_EXTENSION) ?>
            <video poster="" controls>
              <source src="<?php echo $video ?>" type="video/<?php echo $video_extension ?>">
            </video>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
<?php else: ?>
<script>
jQuery(document).ready(function(){
  jQuery('.bxslider').bxSlider({
    pager:false,
    speed:1000,
    auto:true,
    pause:5000,
    autoHover:true,
    nextText: "<i class='fa fa-angle-right fa-4x' aria-hidden='true'></i>",
    prevText: "<i class='fa fa-angle-left fa-4x' aria-hidden='true'></i>"
  });
});
</script>
<ul class="bxslider">
  <?php foreach ($slides as $key => $slide): ?>
    <li><img src="<?php echo $slide['image']['url'] ?>" /></li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>
