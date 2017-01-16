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
          <form action="">
            <div class="contact-form__div form-group">
              <label for="" class="contact-form__label">Tu nombre</label>
              <input type="text" class="contact-form__input form-control" name="name">
            </div>
            <div class="contact-form__div form-group">
              <label for="" class="contact-form__label">Tu email</label>
              <input type="email" class="contact-form__input form-control" name="email">
            </div>
            <div class="contact-form__div form-group">
              <label for="" class="contact-form__label">Tu mensaje</label>
              <textarea name="message" id="" cols="30" rows="10" class="form-control contact-form__textarea"></textarea>
            </div>
            <button class="contact-form__btn btn btn-primary text-uppercase">enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'templates/includes/component-map.php' ?>