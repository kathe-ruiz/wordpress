<?php
/**
 * Default search form
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <label class="search-form__control">
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
    <input type="search" class="search-form__field" 
      placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" 
      value="<?php echo get_search_query() ?>" name="s" 
      title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  </label>
  <button class="search-form__submit" type="submit">
    <i class="fa fa-search" aria-hidden="true"></i>
  </button>
</form>