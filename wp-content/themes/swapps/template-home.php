<?php
/**
 * Template Name: Home Template
 */
?>
<div class="home">
  <!-- <section class="sliders-main">
    <?php /*if (!have_posts()) :*/ ?>
      <div class="alert alert-warning">
        <?php /*_e('Sorry, no results were found.', 'sage');*/ ?>
      </div>
      <?php /*get_search_form();*/ ?>
    <?php /*endif;*/ ?>
    <?php /*$main_slider = get_sw_slider('Main')*/ ?>
  
    <?php /*if($main_slider):*/ ?>
      <?php /*$slides = get_slides_array($main_slider);*/ ?>
      <div class="owl-carousel owl-theme">
        <?php /*foreach ($slides as $key => $slide):*/ ?>
          <div class="item">
              <img src="<?php /*echo $slide['image']['url']*/ ?>" alt="<?php /*echo $slide['image']['alt']*/ ?>" class="img-fluid">
              <div class="caption">
                <h2><?php /*echo $slide['title']*/ ?></h2>
                <p><?php /*echo $slide['description']*/ ?></p>
                <a href="<?php /*echo $slide['link']*/ ?>" class="btn btn-primary">
                  <?php /*echo $slide['call_to_action_text']*/ ?>
                </a>
              </div>
          </div>
        <?php /*endforeach*/ ?>
      </div>
    <?php /*endif;*/ ?>
  </section> -->
  <!-- begin titulo de seccion de dos lineas -->
  <section class="two-lines">
    <div class="container text-center">
      <div class="row title">
        <h2 class="title__h2">Este es el título de la sección,<br>con a dos líneas</h2>
        <h4 class="title__h4"><p>Lorem ipsum dolor sit amet, consectetur<br>adipisicing elit vel reiciendis.</p></h4>
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
        <h2 class="home-section__title text-center">Lorem ipsum dolor sit amet</h2>
        <p class="home-section__subtitle text-center">
          ipsum dolor sit ipsum dolor sit ipsum dolor sit
        </p>
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
  <section class="subscribe">
    <div class="container">
      <div class="row text-center title">
        <h2 class="title__h2">Suscríbase a nuestro boletín</h2>
        <h4 class="title__h4">
          <p>Lorem ipsum dolor sit amet,<br>consectetur adipisicing elit.</p>
        </h4>
        <div class="subscribe__content text-center">
          <input type="text" class="subscribe__input" placeholder="Correo electónico">
          <button class="subscribe__btn text-uppercase btn btn-primary">suscribirse</button>
        </div>
      </div>
    </div>
  </section>
</div>
