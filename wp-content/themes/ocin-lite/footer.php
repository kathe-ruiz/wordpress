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
      <div class="logo-swapps text-center">
        <a href="https://www.swapps.io/" target="_blank">
          <span class="powered">Powered by  </span>
          <img src="<?php echo get_template_directory_uri(); ?>/images/powered-by-swapps.png" alt="powered by swapps" class="footer__brand-img">
          <span class="sw">sw</span><span class="apps">apps</span>
        </a>
      </div>
    </div><!-- .container -->
  </div><!-- .sub-footer -->


<?php wp_footer(); ?>

</body>
</html>