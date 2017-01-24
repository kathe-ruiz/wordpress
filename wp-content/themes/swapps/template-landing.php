<?php
/**
 * Template Name: Landing
 */
?>

<div id="home" class="home">

<section>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  <?php echo the_field('field_row_background_color') ?>
<pre>
  <?php 
  $rows = get_field('field_rows');
  print_r($rows);
   ?>
</pre>
<?php foreach ($rows as $row): ?>
<section class="background-<?php echo $row['background_color'] ?>" 
<?php if($row['background_image']): ?> style="background-image: url("<?php echo $row['background_image']['url'] ?>") " <?php endif; ?>>
    <?php foreach ($row['row_items'] as $row_item): ?>
    <?php
    switch($row_item['acf_fc_layout']){
      case 'title':
      include('layouts/layout_title.php');
      break;
      case 'text':
      include('layouts/layout_text.php');
      break;
      case 'full_slider':
      include('layouts/layout_full_slider.php');
      break;
      case 'button':
      include('layouts/layout_button.php');
      break;
      case 'text_slider':
      include('layouts/layout_text_slider.php');
      break;
      case 'gallery':
      include('layouts/layout_gallery.php');
      break;
      case 'images_grid':
      break;
      case 'image_text_button':
      break;
      case 'video':
      break;
      case 'icon':
      break;
      case 'map':
      break;
    }
    ?>
    <?php endforeach ?>
</section>
<?php endforeach ?>
  <section id="one" class="sliders-main">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>
    <?php // $main_slider = get_sw_slider('Main') ?>

    <?php // if($main_slider): ?>
      <?php // $slides = get_slides_array($main_slider); ?>
      <div class="owl-carousel owl-theme">
        <?php // foreach ($slides as $key => $slide): ?>
          <?php
            // $image = $slide['image'];
            // $title = $slide['title'];
            // $description = $slide['description'];
            // $link = $slide['link'];
            // $cta = $slide['call_to_action_text'];
          ?>
          <div class="item">
              <!-- <img src="<?php //echo $image['url'] ?>" alt="<?php // echo $image['alt'] ?>" class="img-fluid">
              <div class="caption">
                <?php // if ($title): ?><h2><?php // echo $title ?></h2><?php // endif ?>
                <?php // if ($description): ?><p><?php // echo $description ?></p><?php // endif ?>
                <?php // if ($link): ?>
                <a href="<?php // echo $link ?>" class="btn btn-primary">
                  <?php //if ($cta): echo $cta; endif; ?>
                </a>
                <?php // endif ?>
              </div> -->
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider-1.jpg" alt="Slider image" class="img-fluid">
              <div class="caption">
                <h2>Título del slider</h2>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn btn-primary">
                  Leer más
                </a>
              </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner.png" alt="Slider image" class="img-fluid">
            <div class="caption">
              <h2>Título del slider</h2>
              <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">
                Leer más
              </a>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner-2.png" alt="Slider image" class="img-fluid">
            <div class="caption">
              <h2>Título del slider</h2>
              <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">
                Leer más
              </a>
            </div>
          </div>
        <?php // endforeach ?>
      </div>
    <?php // endif; ?>
  </section>
  <!-- begin titulo de seccion de dos lineas -->
  <section id="two" class="home-section two-lines">
    <div class="container text-center">
      <div class="row heading">
        <h2 class="heading__title">Quiénes somos</h2>
        <h4 class="heading__subtitle">Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit vel reiciendis.</h4>
      </div>
      <div class="row two-lines__block">
        <div class="col-sm-6 text-left two-lines__text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde illo pariatur qui ad veniam! Distinctio quasi est et modi quibusdam, vero. Sequi consectetur, quaerat vitae eum est. Saepe, minus tenetur.
        </div>
        <div class="col-sm-6 text-left two-lines__text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, eum! Voluptatibus aliquid, nihil sint, molestiae dolore, non minima numquam natus praesentium similique cum provident sunt magni, eum suscipit explicabo illum.
        </div>
      </div>
      <button class="two-lines__btn text-uppercase btn btn-primary">leer más</button>
    </div>
  </section>
  <!-- end titulo de seccion de dos lineas -->

  <!-- begin example of section -->
  <section id="three" class="container home-section">
    <div class="row">
      <div class="col-md-12">
        <div class="heading text-center">
          <h2 class="heading__title">Nuestros Servicios</h2>
          <h4 class="heading__subtitle">
            Vestibulum interdum ante sit amet felis<br> aliquet commodo. Sed semper ornare <br>tristique.
          </h4>
        </div>
        <div id="highlights" class="owl-carousel owl-theme highlights">
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 2 copia 2.jpg" alt="">
              <p class="highlight-item__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
            </div>
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4.jpg" alt="">
              <p class="highlight-item__caption">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
            </div>
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 7 copia.jpg" alt="">
              <p class="highlight-item__caption">Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9.jpg" alt="">
              <p class="highlight-item__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end example of section -->

  <?php // $main_slider = get_sw_slider('Main') ?>

  <?php // if($main_slider): ?>
    <section id="four" class="bg-primary sliders-secondary">
      <div class="owl-carousel owl-theme">
        <div class="item">
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
              <h4 class="sliders__title text-center">Título del módulo</h4>
              <p class="sliders__text text-secondary">
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.t</p>
              <div class="sliders__divider row">
                <div class="col-md-6 col-md-offset-3">
                  <hr>
                </div>
              </div>
              <div class="sliders__footer">
                <p>NOMBRE APELLIDO</p>
                <p class="text-secondary">Nombre del Cargo</p>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
              <h4 class="sliders__title text-center">Título del módulo</h4>
              <p class="sliders__text text-secondary">
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.t</p>
              <div class="sliders__divider row">
                <div class="col-md-6 col-md-offset-3">
                  <hr>
                </div>
              </div>
              <div class="sliders__footer">
                <p>NOMBRE APELLIDO</p>
                <p>Nombre del Cargo</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php // endif ?>

  <!-- begin example of section -->
  <section id="five" class="container home-section">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
        <div class="heading">
          <h2 class="heading__title text-center">Nuestros Productos</h2>
          <h4 class="heading__subtitle text-center">
            Vestibulum interdum ante sit amet felis aliquet commodo. Sed semper ornare tristique.
          </h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="gallery text-center">
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 11.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 11.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 17.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 17.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 19.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 19.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 13.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 13.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 7 copia.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 7 copia.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9 copia.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9 copia.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 21.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 21.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4 copia 2.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4 copia 2.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 15.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 15.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 2 copia 2.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 2 copia 2.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end example of section -->
  <section id="six" class="image-text one">
    <div class="container">
      <div class="row image-text__content">
        <div class="col-sm-6">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/img.png" alt="">
        </div>
        <div class="col-sm-6">
          <h2 class="heading__title">Título para un módulo<br>con imágen</h2>
          <p class="heading__text text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus minima consequatur impedit facere sit aut, exercitationem assumenda, quos odit animi, earum quam distinctio debitis.</p>
          <button class="image-text__btn btn btn-primary">más información</button>
        </div>
      </div>
    </div>
  </section>
  <section id="seven" class="image-text two">
    <div class="container">
      <div class="row image-text__content">
        <div class="col-sm-6 visible-xs">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-1.png" alt="">
        </div>
        <div class="col-sm-6">
          <h2 class="heading__title">Título para un módulo<br>con imágen</h2>
          <p class="heading__text text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, nesciunt reiciendis natus provident impedit, autem nulla odit fugiat tempora inventore ad hic, neque ratione veritatis.</p>
          <button class="image-text__btn btn btn-primary">más información</button>
        </div>
        <div class="col-sm-6 hidden-xs">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-1.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <section id="eight" class="video">
    <div class="container">
      <div class="row text-center">
        <div class="heading">
          <h2 class="heading__title">Título para módulo<br>de video</h2>
        </div>
        <i class="fa fa-play-circle video__icon" aria-hidden="true"></i>
        <p class="video__text">Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit. Cum, quisquam, repudiandae<br>culpa ex ipsam dolore omnis odit a alias.</p>
      </div>
    </div>
  </section>
  <section id="nine" class="icons">
    <div class="container">
      <div class="row text-center">
        <i class="fa fa-angellist fa-11x icons__item" aria-hidden="true"></i>
        <div class="heading text-center">
          <h2 class="heading__title">Título del módulo</h2>
          <h4 class="heading__subtitle">
            Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit.
          </h4>
        </div>
        <div class="col-xs-6 col-sm-3 text-center icons__content">
          <i class="fa fa-comments-o fa-4x icons__item" aria-hidden="true"></i>
          <h4 class="icons__title text-uppercase">Destacado uno</h4>
          <p class="icons__text">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
        <div class="col-xs-6 col-sm-3 text-center icons__content">
          <i class="fa fa-bicycle fa-4x icons__item" aria-hidden="true"></i>
          <h4 class="icons__title text-uppercase">Destacado dos</h4>
          <p class="icons__text">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
        <div class="col-xs-6 col-sm-3 text-center icons__content">
          <i class="fa fa-bullhorn fa-4x icons__item" aria-hidden="true"></i>
          <h4 class="icons__title text-uppercase">Destacado tres</h4>
          <p class="icons__text">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
        <div class="col-xs-6 col-sm-3 text-center icons__content">
          <i class="fa fa-calendar fa-4x icons__item" aria-hidden="true"></i>
          <h4 class="icons__title text-uppercase">Destacado cuatro</h4>
          <p class="icons__text">Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      </div>
    </div>
  </section>
  <section id="ten" class="subscribes">
    <div class="container">
      <div class="row text-center">
        <div class="heading">
          <h2 class="heading__title">Suscríbase a nuestro boletín</h2>
          <h4 class="heading__subtitle">Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit.
          </h4>
        </div>
        <div class="subscribes__content text-center">
          <input type="text" class="subscribes__input form-control" placeholder="Correo electrónico">
          <button class="subscribes__btn text-uppercase btn btn-primary">suscribirse</button>
        </div>
      </div>
    </div>
  </section>
  <?php include 'templates/includes/component-map.php' ?>
</div>
