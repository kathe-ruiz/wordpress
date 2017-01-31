<div class="socialmedia__block nav navbar-nav navbar-right">
  <?php $accounts = get_social_accounts(); ?>
  <?php if ($accounts['facebook']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo $accounts['facebook'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-facebook" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if ($accounts['twitter']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo $accounts['twitter'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-twitter" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if ($accounts['instagram']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo $accounts['instagram'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-instagram" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if ($accounts['vimeo']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo $accounts['vimeo'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-vimeo" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
  <?php if ($accounts['linkedin']): ?>
  <li class="socialmedia__item">
    <a href="<?php echo $accounts['linkedin'] ?>" class="socialmedia__link" target="_blank">
      <i class="fa fa-linkedin" aria-hidden="true"></i>
    </a>
  </li>
  <?php endif ?>
</div>
