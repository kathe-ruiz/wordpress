<?php $header = sw_options('site_options_header_type') ?>
<?php if ($header !== '' and $header): ?>
  <?php include "includes/$header.php"; ?>
<?php else: ?>
  <?php include 'includes/header-deprecated.php'; ?>
<?php endif ?>
