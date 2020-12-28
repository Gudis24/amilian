<footer>

  <div id="footerInfo" class="row">
    <div class="flexing columns">
      <?php
        foreach(get_field('informacje_footer', 'option') as $information):
          ?>
          <?php if ($information["tresc"]): ?>
            <div class="column column3"><?= $information["tresc"] ?></div>
          <?php endif; ?>
          <?php
        endforeach;
       ?>
    </div>
  </div>
  <div class="footerWrapper">
    <div class="siteWidth">
      <div class="wrapper flexing">
        <div class="column4">
          <div class="columnWrapper instagramColumn">
            <div class="iconWrapper">
                <i class="icon-instagram footerHead"></i>
            </div>
            <div class="heading"><?php _e('Instagram','sklep-lookslike'); ?></div>
            <div class="flexing imagesWrapper justifyBetween">
              <a href="https://instagram.com/amilian.de" target="_blank" class="wrapper">
                <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/insta_1.jpg" alt="<?php echo bloginfo(); ?> Instagram">
              </a>
              <a href="https://instagram.com/amilian.de" target="_blank" class="wrapper">
                <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/insta_2.jpg" alt="<?php echo bloginfo(); ?> Instagram">
              </a>
            </div>
          </div>
        </div>
        <div class="column4">
          <div class="columnWrapper">
            <div class="iconWrapper">
                <i class="icon-info footerHead"></i>
            </div>
            <div class="heading"><?php _e('Informationen','sklep-lookslike'); ?></div>
            <ul class="clearList">
            <?php
            if ( has_nav_menu( 'footer' ) ) :
              wp_nav_menu(
                array(
                  'container'  => '',
                  'items_wrap' => '%3$s',
                  'theme_location' => 'footer',
                )
              );
            endif; ?>
            </ul>
          </div>
        </div>
        <div class="column4">
          <div class="columnWrapper dhlColumn">
            <div class="iconWrapper">
                <i class="icon-chat-empty footerHead"></i>
            </div>
            <div class="heading"><?php _e('Über uns','sklep-lookslike'); ?></div>
            <ul class="clearList">
            <?php
            if ( has_nav_menu( 'footer2' ) ) :
              wp_nav_menu(
                array(
                  'container'  => '',
                  'items_wrap' => '%3$s',
                  'theme_location' => 'footer2',
                )
              );
            endif; ?>
            </ul>
            <div class="wrapper dhlItem">
              <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/DHL.svg" alt="<?php echo bloginfo(); ?> DHL Shipping">
            </div>
          </div>
        </div>
        <div class="column4">
          <div class="columnWrapper gepruftColumn">
            <div class="iconWrapper">
                <i class="icon-handshake-o footerHead"></i>
            </div>
            <div class="wrapper heading">
              <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/IT-Recht-Kanzlei.png" alt="<?php echo bloginfo(); ?> IT Recht Kanzlei">
            </div>
          </div>
        </div>
      </div>
      <div class="flexing justifyCenter payments">
        <img loading="lazy" src="<?= get_template_directory_uri()?>/dist/images/payments.png" alt="<?php echo bloginfo(); ?> Payments">
      </div>
    </div>
  </div>
  <div class="credits flexing justifyBetween alignCenter siteWidth">
      <div class="copywrites"><?php _e('© amilian.de','sklep-lookslike') ?></div>
      <!-- <div class="lookslike flexing alignCenter"><span><php _e('Crafted by ','sklep-lookslike'); ?></span><a class="crafted-logo" href="https://lookslike.pl" title="strony internetowe dla fotografa"><img loading="lazy" src="<= get_template_directory_uri()?>/dist/images/LL.svg" alt="Tworzenie stron www.lookslike.pl"></a></div> -->
  </div>
</footer>
<?php cookies(); ?>

<?php wp_footer(); ?>
<script>
jQuery('.slickSlider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 10000,
  speed: 500,
  rows:0,
  infinte: false,
  prevArrow: "",
  nextArrow: "",
  dots: true,
  responsive: [
    {
      breakpoint: 980,
      settings: {
        slidesToShow:1,
        autoplay:false
      }
    }
  ]
});

jQuery('#slickBestSeller').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 10000,
  speed: 500,
  rows:0,
  infinte: false,
  prevArrow: '<div class="icon-left-open-mini"></div>',
  nextArrow: '<div class="icon-right-open-mini"></div>',
  appendArrows: jQuery('.arrowsNavi-bestSellers'),
  dots: false,
  responsive: [
    {
      breakpoint: 980,
      settings: {
        slidesToShow:3,
      }
    },
    {
      breakpoint: 770,
      settings: {
        slidesToShow:2,
      }
    },
    {
      breakpoint:600,
      settings: {
        slidesToShow:1,
      }
    }
  ]
});
</script>
</body>
</html>
