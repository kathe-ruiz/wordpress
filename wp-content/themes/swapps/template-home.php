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
    <?php $main_slider = get_sw_slider('Main') ?>

    <?php if($main_slider): ?>
      <?php $slides = get_slides_array($main_slider); ?>
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
                <?php if ($description): ?><p><?php echo $description ?></p><?php endif ?>
                <?php if ($link): ?>
                <a href="<?php echo $link ?>" class="btn btn-primary">
                  <?php if ($cta): echo $cta; endif; ?>
                </a>
                <?php endif ?>
              </div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endif; ?>
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
  <section class="bg-primary sliders-secondary">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel owl-theme">
            <?php foreach ($slides as $key => $slide): ?>
              <div class="item text-center">
                <h2><?php echo $slide['title'] ?></h2>
                <p><?php echo $slide['description'] ?></p>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- begin example of section -->
  <section class="container home-section">
    <div class="row">
      <div class="col-md-12">
        <div class="heading">
          <h2 class="heading__title text-center">Lorem ipsum dolor sit amet</h2>
          <h4 class="heading__subtitle text-center">
            <p>ipsum dolor sit ipsum dolor sit ipsum dolor sit</p>
          </h4>
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
        <div class="col-sm-6 heading">
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
          <input type="text" class="subscribes__input form-control" placeholder="Correo electónico">
          <button class="subscribes__btn text-uppercase btn btn-primary">suscribirse</button>
        </div>
      </div>
    </div>
  </section>
</div>
