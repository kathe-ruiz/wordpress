<?php 
$forms = get_posts(array('post_type' => 'um_form', 'posts_per_page' => 1, 'meta_key' => '_um_core', 'meta_value' => 'login'));
$form_id = isset( $forms[0]->ID ) ? $forms[0]->ID: 0; 
?>
<?php if ($form_id): ?>
<!-- Login Modal -->
<div class="um-user-modal modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"><?php _e('Sign in') ?></h4>
      </div>
      <div class="modal-body"><?php echo do_shortcode("[ultimatemember form_id=$form_id]") ?></div>
    </div>
  </div>
</div>
<script>
jQuery('#modal-login').on('shown.bs.modal', function (event) {
  if ( jQuery('.um-login .um-button.um-alt').exists() ) {
    modal = jQuery(this);
    jQuery('.um-login .um-button.um-alt')[0].dataset.toggle = "modal";
    jQuery('.um-login .um-button.um-alt').attr("href", "#modal-signup");
    jQuery('.um-login .um-button.um-alt').on('click', function (event) {
      modal.modal('hide');
    });
  }
});
</script>
<?php endif; ?>