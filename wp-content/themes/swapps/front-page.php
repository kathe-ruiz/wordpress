<?php 
if ( get_option('show_on_front') == 'page' ):
  if(is_page_template('template-landing.php')):
    include 'template-landing.php';
  else:
    include 'template-home.php';
  endif;
else:
  include 'home.php';
endif;
?>
