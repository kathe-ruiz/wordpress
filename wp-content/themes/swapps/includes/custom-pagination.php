<?php
// Source: http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/ 
function custom_pagination() {
  global $wp_query;
  $big = 999999999; // need an unlikely integer
  $pages = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'mid_size' => 1,
    'prev_next' => false,
    'type'  => 'array',
    'prev_text'    => __('«'),
    'next_text'    => __('»'),
  ) );
  if( is_array( $pages ) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<ul class="pagination">';
    foreach ( $pages as $page ) {
      if (strpos($page, 'current') !== false) {
        echo "<li class='active'>$page</li>";
      }
      else{
      echo "<li>$page</li>";
      }
    }
     echo '</ul>';
  }
}
