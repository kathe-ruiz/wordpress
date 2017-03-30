<?php
/**
 * Template Name: Home Template
 */
?>
<div id="home" class="home">
  <section id="one" class="sliders-main">
    <?php if (!have_posts()) : ?>
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
      </div>
      <?php get_search_form(); ?>
    <?php endif; ?>
    <?php if (function_exists('get_field')): ?>
    <?php
      if (get_field("slider_1")) {
        $main_slider = get_field("slider_1");
      }
      if (get_field("slider_2")) {
        $secondary_slider = get_field("slider_2");
      }
    ?>
    <?php else: ?>
      <?php
        $main_slider = False;
        $secondary_slider = False;
       ?>
    <?php endif ?>
    <?php if(isset($main_slider)): ?>
      <?php $slides = get_slides_array($main_slider); ?>
      <?php if ($slides): ?>
        <div class="owl-carousel owl-theme">
          <?php foreach ($slides as $key => $slide): ?>
            <?php
              $image = $slide['image'];
              $title = $slide['title'];
              $description = $slide['description'];
              $link = $slide['link'];
              $cta = $slide['call_to_action_text'];
            ?>
            <div class="item">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" class="img-fluid">
                <div class="caption">
                  <?php if ($title): ?><h2><?php echo $title ?></h2><?php endif ?>
                  <?php if ($description): ?><p class="text-secondary"><?php echo $description ?></p><?php endif ?>
                  <?php if ($link): ?>
                  <a href="<?php echo $link ?>" class="btn btn-primary">
                    <?php if ($cta): echo $cta; endif; ?>
                  </a>
                  <?php endif ?>
                </div>
              </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    <?php else: // Hardcoded slider ?>
      <div class="owl-carousel owl-theme">
          <div class="item">
              <img src="<?php echo get_template_directory_uri(); ?>/dist/images/slider-1.jpg" alt="Slider image" class="img-fluid">
              <div class="caption">
                <h2>Título del slider</h2>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn btn-primary">
                  Leer más
                </a>
              </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/banners/banner.png" alt="Slider image" class="img-fluid">
            <div class="caption">
              <h2>Título del slider</h2>
              <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">
                Leer más
              </a>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/banners/banner-2.png" alt="Slider image" class="img-fluid">
            <div class="caption">
              <h2>Título del slider</h2>
              <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">
                Leer más
              </a>
            </div>
          </div>
      </div>
    <?php endif; ?>
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
      <div class="text-center">
        <button class="two-lines__btn text-uppercase btn btn-primary">leer más</button>
      </div>
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
            <!-- <div class="highlight-item text-center">
              <img class="highlight-item__image" src="" alt="">
              <p class="highlight-item__caption"></p>
            </div> -->
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 2 copia 2.jpg" alt="">
              <p class="highlight-item__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
            </div>
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 4.jpg" alt="">
              <p class="highlight-item__caption">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
            </div>
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 7 copia.jpg" alt="">
              <p class="highlight-item__caption">Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="highlight-item text-center">
              <img class="highlight-item__image" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 9.jpg" alt="">
              <p class="highlight-item__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end example of section -->

    <section id="four" class="bg-primary sliders-secondary">
      <?php if($secondary_slider): ?>
      <?php $slides = get_slides_array($secondary_slider); ?>
        <?php if ($slides): ?>
          <div class="owl-carousel owl-theme">
          <?php foreach ($slides as $key => $slide): ?>
            <?php
              $image = $slide['image'];
              $title = $slide['title'];
              $title_2 = $slide['title_2'];
              $description = $slide['description'];
              $link = $slide['link'];
              $cta = $slide['call_to_action_text'];
            ?>
            <div class="item">
              <div class="row">
                <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2">
                  <?php if ($call_to_action_text): ?>
                    <h4 class="sliders__title text-center"><?php echo $call_to_action_text ?></h4>
                  <?php endif; ?>
                  <?php if ($description): ?>
                    <p class="sliders__text text-secondary"><?php echo $description ?></p>
                  <?php endif; ?>
                  <div class="sliders__divider row">
                    <div class="col-md-6 col-md-offset-3">
                      <hr>
                    </div>
                  </div>
                  <div class="sliders__footer">
                    <?php if ($title): ?><p><?php echo $title ?></p><?php endif; ?>
                    <?php if ($title_2): ?>
                      <p class="text-secondary"><?php echo $title_2 ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        <?php endif ?>
      <?php else: // Hardcoded slider ?>
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
      <?php endif; ?>
    </section>

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
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 11.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 11.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 9.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 9.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 17.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 17.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 4.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 4.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 19.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 19.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 13.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 13.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 7 copia.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 7 copia.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 9 copia.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 9 copia.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 21.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 21.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 4 copia 2.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 4 copia 2.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 15.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 15.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="gallery__item" href="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 2 copia 2.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="gallery__item-image img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/galery/Capa 2 copia 2.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end example of section -->
  <section id="six" class="image-text one home-section">
    <div class="container">
      <div class="row image-text__content">
        <div class="col-sm-6">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/img.png" alt="">
        </div>
        <div class="col-sm-6">
          <h2 class="heading__title">Título para un módulo<br>con imágen</h2>
          <p class="heading__text text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus minima consequatur impedit facere sit aut, exercitationem assumenda, quos odit animi, earum quam distinctio debitis.</p>
          <button class="image-text__btn btn btn-primary">más información</button>
        </div>
      </div>
    </div>
  </section>
  <section id="seven" class="image-text two home-section">
    <div class="container">
      <div class="row image-text__content">
        <div class="col-sm-6 visible-xs">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/img-1.png" alt="">
        </div>
        <div class="col-sm-6">
          <h2 class="heading__title">Título para un módulo<br>con imágen</h2>
          <p class="heading__text text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, nesciunt reiciendis natus provident impedit, autem nulla odit fugiat tempora inventore ad hic, neque ratione veritatis.</p>
          <button class="image-text__btn btn btn-primary">más información</button>
        </div>
        <div class="col-sm-6 hidden-xs">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/images/img-1.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <section id="eight" class="bg-image video" style="background-image: url(wp-content/themes/swapps/assets/images/video-background.png);">
    <div class="container">
      <div class="row text-center">
        <div class="heading">
          <h2 class="heading__title">Título para módulo<br>de video</h2>
        </div>
        <!-- <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/ScMzIvxBSi4" allowfullscreen></iframe>
        </div>
        <i class="fa fa-play-circle video__icon" aria-hidden="true"></i> -->
        <div data-type="youtube" data-video-id="ScMzIvxBSi4"></div>
        <p class="video__text">Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit. Cum, quisquam, repudiandae<br>culpa ex ipsam dolore omnis odit a alias.</p>
      </div>
    </div>
  </section>
  <section id="nine" class="icons home-section">
    <div class="container">
      <div class="row text-center">
        <div class="icons__icon--large">
          <i class="fa fa-angellist fa-11x icons__item" aria-hidden="true"></i>
        </div>
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
        <?php if( function_exists( 'mc4wp_show_form' ) ) { mc4wp_show_form(); } ?>
        <!-- <div class="subscribes__content text-center">
          <input type="email" name="EMAIL" class="subscribes__input form-control" placeholder="Correo electrónico" required />
          <input type="submit" class="subscribes__btn text-uppercase btn btn-primary" value="Suscribirse" />
        </div> -->
      </div>
    </div>
  </section>
  <?php include 'templates/includes/component-map.php' ?>
</div>
