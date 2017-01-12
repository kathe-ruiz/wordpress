<?php
/**
 * Template Name: Home Template
 */
?>
<div class="home">
  <section class="sliders-main">
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="#" class="btn btn-primary">
                  Leer más
                </a>
              </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner.png" alt="Slider image" class="img-fluid">
            <div class="caption">
              <h2>Título del slider</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              <a href="#" class="btn btn-primary">
                Leer más
              </a>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner-2.png" alt="Slider image" class="img-fluid">
            <div class="caption">
              <h2>Título del slider</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
  <section class="home-section two-lines">
    <div class="container text-center">
      <div class="row heading">
        <h2 class="heading__title">Este es el título de la sección,<br>con a dos líneas</h2>
        <h4 class="heading__subtitle"><p>Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit vel reiciendis.</p></h4>
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
  <section class="container home-section">
    <div class="row">
      <div class="col-md-12">
        <div class="heading text-center">
          <h2 class="heading__title">Título del módulo</h2>
          <h4 class="heading__subtitle">
            <p>Vestibulum interdum ante sit amet felis<br> aliquet commodo. Sed semper ornare <br>tristique.</p>
          </h4>
        </div>
        <div id="gallery" class="owl-carousel owl-theme gallery">
            <div class="gallery-item text-center">
              <img class="gallery-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 2 copia 2.jpg" alt="">
              <p class="gallery-item__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
            </div>
            <div class="gallery-item text-center">
              <img class="gallery-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4.jpg" alt="">
              <p class="gallery-item__caption">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
            </div>
            <div class="gallery-item text-center">
              <img class="gallery-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 7 copia.jpg" alt="">
              <p class="gallery-item__caption">Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <div class="gallery-item text-center">
              <img class="gallery-item__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9.jpg" alt="">
              <p class="gallery-item__caption">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</p>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end example of section -->

  <?php // $main_slider = get_sw_slider('Main') ?>

  <?php // if($main_slider): ?>
    <section class="bg-primary sliders-secondary">
      <div class="owl-carousel owl-theme">
        <div class="item">
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2 col-sm-12 col-sm-offset-0">
                <h4 class="sliders__title text-center">Title</h4>
                <p>
                Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Inventore, quas, quasi. Debitis magnam vel deserunt a, ipsam culpa sed cum facilis enim quisquam incidunt quia, assumenda nisi, dicta, maxime eos.</p>
                <hr>
                NOMBRE APELLIDO
                Nombre del cargo
              </div>
            </div>
        </div>
        <div class="item">
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2 col-sm-12 col-sm-offset-0">
                <h4 class="sliders__title text-center">Title</h4>
                <p>
                Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Quis earum adipisci cum blanditiis, enim, minima dolores corrupti, ducimus tempore modi veritatis ea ipsum accusantium itaque sapiente! Omnis odit possimus magnam.</p>
                <hr>
                <p>NOMBRE APELLIDO.</p>
                <p>Nombre del cargo.</p>
              </div>
            </div>
        </div>
        <div class="item text-center">
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2 col-sm-12 col-sm-offset-0">
                <h4 class="sliders__title text-center">Title</h4>
                <p>
                Lorem  ipsum dolor sit amet, consectetur adipisicing elit. Odio nulla ab nostrum at natus debitis aliquam sit. Ex totam libero accusamus nulla eos, quae laboriosam. Impedit saepe aperiam, accusamus ducimus.</p>
                <hr>
                NOMBRE APELLIDO
                Nombre del cargo
              </div>
            </div>
        </div>
      </div>
    </section>
  <?php // endif ?>

  <!-- begin example of section -->
  <section class="container home-section">
    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          <h2 class="heading__title text-center">Título del módulo</h2>
          <h4 class="heading__subtitle text-center">
            <p>Vestibulum interdum ante sit amet felis aliquet commodo. Sed semper ornare tristique.</p>
          </h4>
        </div>
        <div class="image-gallery text-center">
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 11.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 11.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 17.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 17.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 19.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 19.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 13.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 13.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 7 copia.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 7 copia.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9 copia.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 9 copia.jpg" alt="">
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 21.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 21.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4 copia 2.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 4 copia 2.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 15.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 15.jpg" alt="">
              </a>
            </div>
            <div class="col-md-3 col-xs-6">
              <a class="zoom" href="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 2 copia 2.jpg">
                <i class="fa fa-search-plus" aria-hidden="true"></i>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/galery/Capa 2 copia 2.jpg" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end example of section -->



  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
        <?php the_posts_navigation(); ?>
      </div>
    </div>
  </div>
  <section class="image-text one">
    <div class="container">
      <div class="row image-text__content">
        <div class="col-sm-6">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/img.png" alt="">
        </div>
        <div class="col-sm-6">
          <h2 class="heading__title">Título para un módulo<br>con imágen</h2>
          <p class="heading__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus minima consequatur impedit facere sit aut, exercitationem assumenda, quos odit animi, earum quam distinctio debitis.</p>
          <button class="image-text__btn btn btn-primary">más información</button>
        </div>
      </div>
    </div>
  </section>
  <section class="image-text two">
    <div class="container">
      <div class="row image-text__content">
        <div class="col-sm-6 visible-xs">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-1.png" alt="">
        </div>
        <div class="col-sm-6">
          <h2 class="heading__title">Título para un módulo<br>con imágen</h2>
          <p class="heading__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, nesciunt reiciendis natus provident impedit, autem nulla odit fugiat tempora inventore ad hic, neque ratione veritatis.</p>
          <button class="image-text__btn btn btn-primary">más información</button>
        </div>
        <div class="col-sm-6 hidden-xs">
          <img class="image-text__image center-block img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/img-1.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <section class="video">
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
  <section class="icons">
    <div class="container">
      <div class="row text-center">
        <i class="fa fa-angellist fa-11x icons__item" aria-hidden="true"></i>
        <div class="heading text-center">
          <h2 class="heading__title">Título del módulo</h2>
          <h4 class="heading__subtitle">
            <p>Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit.</p>
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
  <section class="subscribes">
    <div class="container">
      <div class="row text-center">
        <div class="heading">
          <h2 class="heading__title">Suscríbase a nuestro boletín</h2>
          <h4 class="heading__subtitle">
            <p>Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit.</p>
          </h4>
        </div>
        <div class="subscribes__content text-center">
          <input type="text" class="subscribes__input form-control" placeholder="Correo electrónico">
          <button class="subscribes__btn text-uppercase btn btn-primary">suscribirse</button>
        </div>
      </div>
    </div>
  </section>
  <section class="map">
    <div id="map" style="height: 450px">
      <script>
        function initMap() {
          var location = {lat: 3.3744223, lng: -76.5434036};
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location
          });

          var contentString = '<div id="content" style="padding: 0 15px">'+
              '<div id="siteNotice">'+
              '</div>'+
              '<div id="bodyContent" style="font-size: 1.25em">'+
              '<p><br>Carrera 100 # 5 - 16<br>'+
              'info@misitioweb.com<br>'+
              '+57 (350) 316-8388<br>'+
              'Cali, Colombia<br>'+
              '</p>'+
              '</div>'+
              '</div>';

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });

          var greenMarker = {
            path: 'M44.057,55.052 C39.628,63.017 35.284,69.635 35.101,69.913 L31.938,74.723 C31.619,75.208 31.079,75.500 30.500,75.500 C29.921,75.500 29.380,75.208 29.062,74.723 L25.899,69.913 C25.714,69.632 21.339,62.955 16.943,55.052 C10.501,43.468 7.500,35.691 7.500,30.578 C7.500,17.853 17.818,7.500 30.500,7.500 C43.182,7.500 53.500,17.853 53.500,30.578 C53.500,35.692 50.499,43.469 44.057,55.052 ZM30.500,21.096 C25.369,21.096 21.194,25.285 21.194,30.434 C21.194,35.582 25.369,39.771 30.500,39.771 C35.631,39.771 39.806,35.582 39.806,30.434 C39.806,25.285 35.631,21.096 30.500,21.096 Z',
            fillColor: '#00aa61',
            fillOpacity: 1,
            scale: 0.8,
            strokeWeight: 0,
          };

          var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: 'Location',
            icon: greenMarker
          });
          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });

          google.maps.event.trigger(marker, 'click');
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkyAIZ32b8OJi50ZUxPNx19G_82fecJDY&callback=initMap" async defer></script>
    </div>
  </section>
</div>
