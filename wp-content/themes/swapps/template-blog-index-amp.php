<!doctype html>
<html amp lang="en-US">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title> <?php echo get_bloginfo(); ?> | Blogs</title>
    <link rel="canonical" href="<?php echo get_home_url(); ?>" />
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
    <script type="application/ld+json">
      {
        "@context":"http://schema.org",
        "@type":"WebPage",
        "mainEntityOfPage":"<?php echo get_home_url(); ?>",
        "publisher":
          {
            "@type":"Organization",
            "name":"Zuckerman Law - Whistleblower Lawyers"
          },
        "headline":"Zuckerman Law",
        "author":
          {
            "@type":"Person",
            "name":"Jason Zuckerman"
          }
      }
    </script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
      .alignright {
        float: right;
      }

      .alignleft {
        float: left;
      }

      .aligncenter {
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      .amp-wp-enforced-sizes {
        /** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
        max-width: 100%;
        margin: 0 auto;
      }

      .amp-wp-unknown-size img {
        /** Worst case scenario when we can't figure out dimensions for an image. **/
        /** Force the image into a box of fixed dimensions and use object-fit to scale. **/
        object-fit: contain;
      }

      /* Template Styles */

      .amp-wp-content,
      .amp-wp-title-bar div {
          margin: 0 auto;
        max-width: 600px;
        }

      html {
        background: #0a89c0;
      }

      body {
        background: #fff;
        color: #353535;
        font-family: 'Merriweather', 'Times New Roman', Times, Serif;
        font-weight: 300;
        line-height: 1.75em;
      }

      p,
      ol,
      ul,
      figure {
        margin: 0 0 1em;
        padding: 0;
      }

      a,
      a:visited {
        color: #0a89c0;
      }

      a:hover,
      a:active,
      a:focus {
        color: #353535;
      }

      /* Quotes */

      blockquote {
        color: #353535;
        background: rgba(127,127,127,.125);
        border-left: 2px solid #0a89c0;
        margin: 8px 0 24px 0;
        padding: 16px;
      }

      blockquote p:last-child {
        margin-bottom: 0;
      }

      /* UI Fonts */

      .amp-wp-meta,
      .amp-wp-header div,
      .amp-wp-title,
      .wp-caption-text,
      .amp-wp-tax-category,
      .amp-wp-tax-tag,
      .amp-wp-comments-link,
      .amp-wp-footer p,
      .back-to-top {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
      }

      /* Header */

      .amp-wp-header {
        background-color: #0a89c0;
      }

      .amp-wp-header div {
        color: #fff;
        font-size: 1em;
        font-weight: 400;
        margin: 0 auto;
        max-width: calc(840px - 32px);
        padding: .875em 16px;
        position: relative;
      }

      .amp-wp-header a {
        color: #fff;
        text-decoration: none;
      }

      /* Site Icon */

      .amp-wp-header .amp-wp-site-icon {
        /** site icon is 32px **/
        background-color: #fff;
        border: 1px solid #fff;
        border-radius: 50%;
        position: absolute;
        right: 18px;
        top: 10px;
      }

      /* Article */

      .amp-wp-article {
        color: #353535;
        font-weight: 400;
        margin: 1.5em auto;
        max-width: 840px;
        overflow-wrap: break-word;
        word-wrap: break-word;
      }

      /* Article Header */

      .amp-wp-article-header {
        align-items: center;
        align-content: stretch;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 1.5em 16px 1.5em;
      }

      .amp-wp-title {
        color: #353535;
        display: block;
        flex: 1 0 100%;
        font-weight: 900;
        margin: 0 0 .625em;
        width: 100%;
      }

      /* Article Meta */

      .amp-wp-meta {
        color: #696969;
        display: inline-block;
        flex: 2 1 50%;
        font-size: .875em;
        line-height: 1.5em;
        margin: 0;
        padding: 0;
      }

      .amp-wp-article-header .amp-wp-meta:last-of-type {
        text-align: right;
      }

      .amp-wp-article-header .amp-wp-meta:first-of-type {
        text-align: left;
      }

      .amp-wp-byline amp-img,
      .amp-wp-byline .amp-wp-author {
        display: inline-block;
        vertical-align: middle;
      }

      .amp-wp-byline amp-img {
        border: 1px solid #0a89c0;
        border-radius: 50%;
        position: relative;
        margin-right: 6px;
      }

      .amp-wp-posted-on {
        text-align: right;
      }

      /* Featured image */

      .amp-wp-article-featured-image {
        margin: 0 0 1em;
      }
      .amp-wp-article-featured-image amp-img {
        margin: 0 auto;
      }
      .amp-wp-article-featured-image.wp-caption .wp-caption-text {
        margin: 0 18px;
      }

      /* Article Content */

      .amp-wp-article-content {
        margin: 0 16px;
      }

      .amp-wp-article-content ul,
      .amp-wp-article-content ol {
        margin-left: 1em;
      }

      .amp-wp-article-content amp-img {
        margin: 0 auto;
      }

      .amp-wp-article-content amp-img.alignright {
        margin: 0 0 1em 16px;
      }

      .amp-wp-article-content amp-img.alignleft {
        margin: 0 16px 1em 0;
      }

      /* Captions */

      .wp-caption {
        padding: 0;
      }

      .wp-caption.alignleft {
        margin-right: 16px;
      }

      .wp-caption.alignright {
        margin-left: 16px;
      }

      .wp-caption .wp-caption-text {
        border-bottom: 1px solid #c2c2c2;
        color: #696969;
        font-size: .875em;
        line-height: 1.5em;
        margin: 0;
        padding: .66em 10px .75em;
      }

      /* AMP Media */

      amp-carousel {
        background: #c2c2c2;
        margin: 0 -16px 1.5em;
      }
      amp-iframe,
      amp-youtube,
      amp-instagram,
      amp-vine {
        background: #c2c2c2;
        margin: 0 -16px 1.5em;
      }

      .amp-wp-article-content amp-carousel amp-img {
        border: none;
      }

      amp-carousel > amp-img > img {
        object-fit: contain;
      }
      /* Article Footer Meta */
      .amp-wp-article-footer .amp-wp-meta {
        display: block;
      }

      .amp-wp-tax-category,
      .amp-wp-tax-tag {
        color: #696969;
        font-size: .875em;
        line-height: 1.5em;
        margin: 1.5em 16px;
      }

      .amp-wp-comments-link {
        color: #696969;
        font-size: .875em;
        line-height: 1.5em;
        text-align: center;
        margin: 2.25em 0 1.5em;
      }

      .amp-wp-comments-link a {
        border-style: solid;
        border-color: #c2c2c2;
        border-width: 1px 1px 2px;
        border-radius: 4px;
        background-color: transparent;
        color: #0a89c0;
        cursor: pointer;
        display: block;
        font-size: 14px;
        font-weight: 600;
        line-height: 18px;
        margin: 0 auto;
        max-width: 200px;
        padding: 11px 16px;
        text-decoration: none;
        width: 50%;
        -webkit-transition: background-color 0.2s ease;
            transition: background-color 0.2s ease;
      }

      /* AMP Footer */

      .amp-wp-footer {
        border-top: 1px solid #c2c2c2;
        margin: calc(1.5em - 1px) 0 0;
      }

      .amp-wp-footer div {
        margin: 0 auto;
        max-width: calc(840px - 32px);
        padding: 1.25em 16px 1.25em;
        position: relative;
      }

      .amp-wp-footer h2 {
        font-size: 1em;
        line-height: 1.375em;
        margin: 0 0 .5em;
      }

      .amp-wp-footer p {
        color: #696969;
        font-size: .8em;
        line-height: 1.5em;
        margin: 0 85px 0 0;
      }

      .amp-wp-footer a {
        text-decoration: none;
      }

      .back-to-top {
        bottom: 1.275em;
        font-size: .8em;
        font-weight: 600;
        line-height: 2em;
        position: absolute;
        right: 16px;
      }
          td, th {
      text-align: left;
      }

      a, a:active, a:visited {
      text-decoration: underline;
      }
      <?php include 'amp/amp.css' ?>
    </style>
  </head>
  <body>
    <?php include "amp/header-bar.php"; ?>
    <article class="amp-wp-article amp-wp-blog">
      <header class="header-blog-list">
      <?php if (function_exists('sw_options') && sw_options('blog_header')): ?>
        <h1 class="title-blog-list"><?php echo sw_options('blog_header'); ?></h1>
      <?php endif ?>
      <?php if (function_exists('sw_options') && sw_options('blog_description')): ?>
        <p class="description-blog-list"><?php echo sw_options('blog_description'); ?></p>
      <?php endif ?>
      </header>
    <?php
    $paged = (array_key_exists('paged', $_GET)) ? $_GET['paged'] : 1;
    $args = array( 'posts_per_page' => 5, 'paged' => $paged,'post_type' => 'post' );
    $postslist = new WP_Query( $args );
    ?>
      <?php if (!$postslist->have_posts()) : ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php endif; ?>

      <?php while ($postslist->have_posts()) : $postslist->the_post(); ?>
        <article <?php post_class( 'blog-item' ); ?>>
          <header class="heading-underline">
            <h2 class="h3 heading-underline__title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          </header>
          <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>">
              <?php
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
                $thumb_url = $thumb_url_array[0];
               ?>
               <amp-img src="<?php echo $thumb_url; ?>" width="750" height="420" layout="responsive"></amp-img>
            </a>
          <?php endif ?>
          <div class="blog-item__description entry-summary">
            <?php the_excerpt(); ?>
          </div>
          <footer class="blog-item__footer">
            <div class="row">
              <div class="col-md-12">
                <?php get_template_part('templates/entry-meta'); ?>
              </div>
            </div>
          </footer>
        </article>
        <hr class="divider divider--list">
      <?php endwhile; ?>

      <div class="col-md-12 text-center">
      <?php if ($postslist->query_vars['paged'] > 1): ?>
        <a href="?paged=<?php echo $postslist->query_vars['paged'] -1; ?>">Older Entries</a>
      <?php endif ?>
      <?php if ($postslist->query_vars['paged'] < $postslist->max_num_pages): ?>
        <a href="?paged=<?php echo $postslist->query_vars['paged'] + 1; ?>">Next Entries</a>
      <?php endif ?>
      <?php
        wp_reset_postdata();
      ?>
      </div>
    </article>
    <?php include "amp/footer.php"; ?>
  </body>
</html>