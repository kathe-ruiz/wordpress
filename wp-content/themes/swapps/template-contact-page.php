<?php
/**
 * Template Name: Contact Page Template
 */
?>
<section class="contact-page">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 information">
        <div class="heading-underline">
          <h3 class="heading-underline__title">Nuestra Ubicación</h3>
        </div>
        <div class="information__block">
          <h5 class="information__title">Nombre de la Compañía</h5>
          <p class="information__text">Carrera 100 # 7-22 Cali - Colobia</p>
        </div>
        <div class="information__block">
          <h5 class="information__title text-uppercase">Teléfonos</h5>
          <p class="information__text">5545009 / 3074427891</p>
        </div>
        <div class="information__block">
          <h5 class="information__title text-uppercase">Email</h5>
          <p class="information__text">info@misitioweb.com</p>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="heading-underline">
          <h3 class="heading-underline__title">Formulario de Contacto</h3>
        </div>
        <div class="contact-form">
        <?php while ( have_posts() ) : the_post(); the_content();endwhile;?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'templates/includes/component-map.php' ?>