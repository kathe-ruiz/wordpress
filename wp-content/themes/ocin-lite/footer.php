<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ocin Lite
 */

?>

    </main><!-- #main -->

  </div><!-- /#container -->

  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 center-block">
          <?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
        </div>

      </div><!-- .row -->
      <div class="logo-swapps text-center"><a href="https://www.swapps.io/" target="_blank"><span style="
        font-size: 10px;
      ">Powered by  </span><img src="https://www.dejusticia.org/wp-content/mu-plugins/dejusticia-core/powered-by-swapps.png"><span style="color: #98979a;
        text-transform: uppercase;
        letter-spacing: -2px;
        font-weight: 800;
        vertical-align: sub;">sw</span><span style="color: #757476;
        text-transform: uppercase;
        letter-spacing: -2px;
        font-weight: 800;
        vertical-align: sub;">apps</span></a></div>
    </div><!-- .container -->
  </div><!-- .sub-footer -->


<?php wp_footer(); ?>

</body>
</html>