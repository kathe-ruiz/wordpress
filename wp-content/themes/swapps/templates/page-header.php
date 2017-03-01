<?php use Roots\Sage\Titles; ?>
<?php 
  if (function_exists('get_field')){
    $disable_breadcrumbs = ( get_field('field_breadcrumbs_option') == 'no') ? false : true ;
  }
  if ( !$disable_breadcrumbs ): ?>
    <section class="breadcrumb bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <!-- <h4 class="breadcrumb__item">Inicio <small>></small> Blog</h4>
            <h1 class="breadcrumb__item breadcrumb__item--active"><?//= Titles\title(); ?></h1> -->
              <?php swapps_breadcrumbs(); ?>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>
