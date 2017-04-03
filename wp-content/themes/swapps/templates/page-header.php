<?php use Roots\Sage\Titles; ?>
<?php
  if (function_exists('get_field')){
    $enable_breadcrumbs = ( get_field('field_breadcrumbs_option') == 'yes') ? true : false ;
  }
  if ( $enable_breadcrumbs ): ?>
    <?php
      if (function_exists('sw_options') && sw_options('blog_description')) {
        $custom_description = sw_options('blog_description');
      }
      if (function_exists('sw_options') && sw_options('blog_header_image')) {
        $background = sw_options('blog_header_image');
        // jariza in this line  I need setup $background var with a URL
      }
      $description = $custom_description ?: category_description();
    ?>
    <section class="breadcrumb <?php if(sw_options('site_options_secondary_navbar_position')): echo "sticky-header"; endif; ?> bg-primary"
      <?php if(isset($background)): ?> style="background-image: url(<?php echo $background ?>); background-size: cover;"<?php endif; ?>>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <!-- <h4 class="breadcrumb__item">Inicio <small>></small> Blog</h4>
            <h1 class="breadcrumb__item breadcrumb__item--active"><?//= Titles\title(); ?></h1> -->
              <?php swapps_breadcrumbs(); ?>
              <p class="breadcrumb-description">
                <?php echo ($description) ?: '' ; ?>
              </p>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>



