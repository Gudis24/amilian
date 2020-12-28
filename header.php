<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
    		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <?php wp_head(); ?>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <?php // echo analytics(); ?>
        <!-- Global site tag (gtag.js) - Google Ads: 626889889 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-626889889"></script>
        <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date()); gtag('config', 'AW-626889889');
        </script> 
    </head>

    <body <?php body_class(); ?>>
      <header id="header" class="pageHeader <?php if (!is_front_page()) {echo 'shortHeader';} ?>">
        <div id="topBar" class="row">
          <div class="flexing justifyBetween siteWidth alignCenter">
            <div class="socialMedia">
              <?php
                foreach(get_field('social_media', 'option') as $social):
                  ?>
                  <?php if ($social["portal"] == "instagram"): ?>
                    <a href="<?= $social["url"] ?>" class="<?= $social["portal"] ?>" target="_blank" alt="<?= $social["portal"] ?>"><i class="icon-instagram"></i></a>
                  <?php endif; ?>
                  <?php
                endforeach;
               ?>
            </div>
            <nav id="topBarNavi">
              <ul class="flexing spacingElements clearList">
              <?php
              if ( has_nav_menu( 'second' ) ) :
                wp_nav_menu(
                  array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'second',
                  )
                );
              endif; ?>
              </ul>
            </nav>
          </div>
        </div>
        <div id="topInfo" class="row">
          <div class="flexing columns siteWidth">
            <?php
              foreach(get_field('informacje_header', 'option') as $information):
                ?>
                <?php if ($information["tresc"]): ?>
                  <div class="column column3"><?= $information["tresc"] ?></div>
                <?php endif; ?>
                <?php
              endforeach;
             ?>
          </div>
        </div>
        <div class="row logoBar">
          <div id="logoBar" class="flexing siteWidth alignCenter">
            <div class="logoWrap">
                <a class="logo" href="<?php echo get_site_url(); ?>"> <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/logo.png" alt="<?php echo bloginfo(); ?>"></a>
            </div>
            <div class="deliveryWrap"><img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/delivery.jpg" alt="<?php echo bloginfo(); ?>"></div>
            <div class="searchWrap"><div class="search"><?php echo do_shortcode('[wcas-search-form]'); ?></div></div>
            <div class="cartWrap">
                  <a class="cart flexing justifyEnd" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Zum Warenkorb' ); ?>">
                  <div class="cartIcon"> <i class="icon-basket"><span class="badge"><div id="mini-cart-count"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></div></span></i> </div>
                  <div id="mini-cart-total"><?php echo WC()->cart->get_cart_total(); ?></div>
                  </a>
            </div>
          </div>
        </div>
        <div id="navigation" class="desktopNav">
          <nav id="mainMenu" class="siteWidth">
            <ul class="menuList flexing justifyCenter alignCenter clearList">
              <?php
              if ( has_nav_menu( 'primary' ) ) :
                wp_nav_menu(
                  array(
                    'container'  => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'primary',
                  )
                );
              endif; ?>
            </ul>
          </nav>
        </div>
        <div id="mobileBar" class="flexing justifyBetween alignCenter">
            <div class="logo">
              <?php if ( get_field('logo', 'option') ): ?>
                <a class="logo" href="<?php echo get_site_url(); ?>"> <a class="logo" href="<?php echo get_site_url(); ?>"> <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/logo_mobile.png" alt="<?php echo bloginfo(); ?>"></a></a>
                <?php
               endif; ?>
            </div>
            <div class="searchWrap"><div class="search"><?php echo do_shortcode('[wcas-search-form]'); ?></div></div>
            <div class="cartWrap">  <a class="cart flexing justifyEnd" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
              <div class="cartIcon"> <i class="icon-basket"></i> </div> </a></div>
            <button class="hamburger hamburger--emphatic" type="button"
                    aria-label="Menu" aria-controls="navigation" aria-expanded="true/false">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
        </div>
        <nav id="mobileMenu">
          <div id="navigation">
            <?php
            if ( has_nav_menu( 'mobile' ) ) :
              wp_nav_menu(
                array(
                  'container'  => '',
                  'items_wrap' => '%3$s',
                  'theme_location' => 'mobile',
                )
              );
            endif; ?>
          </div>
        </nav>
      </header>
