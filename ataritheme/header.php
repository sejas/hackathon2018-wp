<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="manifest" href="<?php echo ATARIURI; ?>/manifest.json">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
    if ('serviceWorker' in navigator) {
        // navigator.serviceWorker
            // .register('<?php echo ATARIURI; ?>/js/sw.js')
            // .then(function () { console.log("Service Worker Registered"); });

        //Add this below content to your HTML page, or add the js file to your page at the very top to register sercie worker
        if (navigator.serviceWorker.controller) {
          console.log('[PWA Builder] active service worker found, no need to register')
        } else {
          //Register the ServiceWorker
          navigator.serviceWorker.register('pwabuilder-sw.js', {
            scope: './'
          }).then(function(reg) {
            console.log('Service worker has been registered for scope:'+ reg.scope);
          });
        }
    }
</script>
<div id="page" class="site">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

  <header id="masthead" class="site-header" role="banner">

    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>

    <?php if ( has_nav_menu( 'top' ) ) : ?>
      <div class="navigation-top">
        <div class="wrap">
          <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
        </div><!-- .wrap -->
      </div><!-- .navigation-top -->
    <?php endif; ?>

  </header><!-- #masthead -->

  <?php

  /*
   * If a regular post or page, and not the front page, show the featured image.
   * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
   */
  if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
    echo '<div class="single-featured-image-header">';
    echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
    echo '</div><!-- .single-featured-image-header -->';
  endif;
  ?>

  <div class="site-content-contain">
    <div id="content" class="site-content">
