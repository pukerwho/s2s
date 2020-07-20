<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="apple-touch-icon" href="/example.png">
  <base href="/">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo home_url(); ?>/en">
  <link rel="alternate" hreflang="ru" href="<?php echo home_url(); ?>/ru">
  <link rel="alternate" hreflang="ua" href="<?php echo home_url(); ?>/ua">
  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
</head>
<body <?php echo body_class(); ?>>
  <!-- <div class="preloader"></div> -->
  
  <header id="header" class="header py-2" role="banner">
    <div class="container mx-auto px-4 lg:px-0">
      <div class="header_content flex items-center justify-between">
        <div class="header_logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="" width="155px">  
          </a>
        </div>
        <div class="header_menu hidden lg:flex items-center">
          <?php wp_nav_menu([
            'theme_location' => 'head_menu',
            'menu_id' => 'head_menu',
            'menu_class' => 'flex justify-between text-lg mr-8'
          ]); ?>
          <div class="header_menu_contact">
            <a href="<?php echo get_page_url( 'tpl_contact' ); ?>">
              <div class="main-bg text-md uppercase rounded px-4 py-2">
                <?php _e('Контакты', 's2s'); ?>
              </div>
            </a>
          </div>
        </div>
        <div class="header_toggle block lg:hidden">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </header>
  <div class="mobile-menu px-4 py-8 text-xl">
    <?php wp_nav_menu([
      'theme_location' => 'head_menu',
      'menu_id' => 'head_menu',
      'menu_class' => 'flex flex-col'
    ]); ?>
    <div class="header_menu_contact">
      <a href="<?php echo get_page_url( 'tpl_contact' ); ?>">
        <div class="inline-block main-bg text-md uppercase rounded px-4 py-2">
          <?php _e('Контакты', 's2s'); ?>
        </div>
      </a>
    </div>
  </div>
  <section id="content" role="main">