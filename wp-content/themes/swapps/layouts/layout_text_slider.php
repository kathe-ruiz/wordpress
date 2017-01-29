<?php if(isset($row_item['slider'])): ?>
<?php $slides = get_slides_array($row_item['slider']); ?>
<div class="owl-carousel owl-theme">
<?php foreach ($slides as $key => $slide): ?>
  <?php
    $image = $slide['image'];
    $title = $slide['title'];
    $title_2 = $slide['title_2'];
    $description = $slide['description'];
    $link = $slide['link'];
    $call_to_action_text = $slide['call_to_action_text'];
  ?>
  <div class="item">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
        <?php if ($call_to_action_text): ?>
          <h4 class="sliders__title text-center"><?php echo $call_to_action_text ?></h4>
        <?php endif; ?>
        <?php if ($description): ?>
          <p class="sliders__text text-secondary"><?php echo $description ?></p>
        <?php endif; ?>
        <div class="sliders__divider row">
          <div class="col-md-6 col-md-offset-3">
            <hr>
          </div>
        </div>
        <div class="sliders__footer">
          <?php if ($title): ?><p><?php echo $title ?></p><?php endif; ?>
          <?php if ($title_2): ?>
            <p class="text-secondary"><?php echo $title_2 ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php endif; ?>

