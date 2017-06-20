<?php $header = sw_options('site_options_header_type');?>
<?php if ($header == 'header-navbar-rigth' ): ?>
  <?php include "navbar-right.php"; ?>
<?php else: ?>
 <?php include "navbar-centered.php"; ?>
<?php endif ?>
<?php $accounts = get_social_accounts(); ?>
<?php if (isset($accounts) && ( $accounts != '' )): ?>
  <?php if (isset($accounts['twitter']) or isset($accounts['facebook']) or isset($accounts['linkedin']) or isset($accounts['instagram']) or isset($accounts['vimeo']) or isset($accounts['youtube'])): ?>
    <!-- Modal -->
    <div id="modal-social" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Redes sociales</h4>
          </div>
          <div class="modal-body">
            <div class="socialmedia">
              <?php include get_template_directory().'/templates/includes/socialmedia.php' ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php endif; ?>