<div class="socialmedia__block nav navbar-nav navbar-right">
  <?php if (get_social_accounts()['facebook']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo get_social_accounts()['facebook'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if (get_social_accounts()['twitter']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo get_social_accounts()['twitter'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if (get_social_accounts()['instagram']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo get_social_accounts()['instagram'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if (get_social_accounts()['vimeo']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo get_social_accounts()['vimeo'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-vimeo" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
</div>
