<?php
function lookslike_assets() {
  wp_enqueue_style( 'lookslike-stylesheet', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.3', 'all' );
  wp_enqueue_style( 'fontello', get_template_directory_uri() . '/dist/fontello/css/amilian.css', array(), '1.0.0', 'all' );
  wp_enqueue_script( 'lookslike-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/static/slider/slick.min.js', array('jquery'), '1.0.0');
}
add_action('wp_enqueue_scripts', 'lookslike_assets');

add_theme_support('post-thumbnails');
//image sizes
add_image_size('auto', 0, 0, array( 'center', 'center' ));
add_image_size('slider', 1200, 400, array('center','center'));
add_image_size('slider_mobile', 450, 450, array('center','center'));
add_image_size('box', 400, 400,array('center','center'));
add_image_size('product', 260, 260);
add_image_size('product-crop', 260, 260, array('center','center'));

add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );
function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
  'page_title' 	=> 'Opcje Theme',
  'menu_title'	=> 'Opcje Theme',
  'menu_slug' 	=> 'opcjeTheme',
  'capability'	=> 'edit_posts',
  'redirect'		=> false
  ));
}
if( function_exists('acf_add_options_sub_page') ) {

acf_add_options_sub_page(array(
    'page_title' 	=> 'Ustawienia Header',
    'menu_title'	=> 'Header',
    'parent_slug'	=> 'opcjeTheme',
  ));
}

if( function_exists('acf_add_options_sub_page') ) {

acf_add_options_sub_page(array(
    'page_title' 	=> 'Ustawienia Footer',
    'menu_title'	=> 'Footer',
    'parent_slug'	=> 'opcjeTheme',
  ));
}

/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['achtung'] = array(
		'title' 	=> __( 'Warnhinweis', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content
	  $product_info = get_field('informacja_o_produkcie','option');
	  echo $product_info;
}
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
    function wcs_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

function lookslike_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'sklep-lookslike' ),
    'second' => __( 'Second Horizontal Menu', 'sklep-lookslike'),
		'mobile'   => __( 'Mobile Menu', 'sklep-lookslike' ),
		'footer'   => __( 'Footer Info Menu', 'sklep-lookslike' ),
    'footer2'   => __( 'Footer Kontakt Menu', 'sklep-lookslike' ),
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'lookslike_menus' );

// Analytics
function analytics() { ?>
  <?php $key = get_field('klucze', 'option'); ?>
  <?php $analytics = $key['google_analytics']; ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $analytics; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?php echo $analytics; ?>');
  </script>
<?php }

/*=============================================
=            BREADCRUMBS			            =
=============================================*/

//  to include in functions.php
function the_breadcrumb() {

    $sep = ' / ';

    if (!is_front_page()) {

	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        echo '<i class="icon icon-house"></i>';
        echo '</a>' . $sep;

	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category()){
            $post = get_post();
            echo '<a href="';
            echo get_permalink( get_option( 'page_for_posts' ) );
            echo '">';
            echo _e("Blog", "lookslike");
            echo "</a>";

        }
        elseif(is_singular('post')){
          $post = get_post();
          echo '<a href="';
          echo get_permalink( get_option( 'page_for_posts' ) );
          echo '">';
          echo _e("Blog", "lookslike");
          echo "</a>";
        }
        elseif(is_singular() && !is_page()){
          $post = get_post();
          echo '<a href="';
          echo get_site_url().'/'.$post->post_type.'/';
          echo '">';
          echo $post->post_type;
          echo "</a>";
        }
          elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'sklep-lookslike' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'sklep-lookslike' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'sklep-lookslike' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'sklep-lookslike' ), get_the_date( _x( 'Y', 'yearly archives date format', 'sklep-lookslike' ) ) );
            } else {
              $post = get_post();
              echo $post->post_type;

            }
        }

	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }

	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }

	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) {
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}

// excerpt Limit
/* Change excerpt length */

function wplab_custom_excerpt_length( $length ) {
     return 25;
 }
 add_filter( 'excerpt_length', 'wplab_custom_excerpt_length', 999 );

function modal($modal_id, $content){
  // aby prawidlowo wywolac ten element nalezy go dodac jako 1 element body ( trzeba wywolac 2 funkcje modal i modal_button) modal_id musibyc takie samo w dwóch funkcjach
?>
  <!-- The Modal -->
  <div id="<?=$modal_id?>" class="modal">

     <!-- Modal content -->
     <div class="modal-content">
       <span class="close">&times;</span>
       <p><?= $content ?></p>
     </div>
  </div>
  <script type="text/javascript">
  jQuery( "#<?=$modal_id?> .close" ).click(function() {
    jQuery( "#<?=$modal_id?>" ).hide();
  });
  jQuery(window).click(function(e) {
    if (e.target.id == "<?=$modal_id?>" ) {
      jQuery( "#<?=$modal_id?>" ).hide();
    }
  });
  </script>
<?php
}
function modal_button($modal_id, $button_id, $button_text){
  // element powiazany z funkcja function modal($button_id, $button_text, $modal_id, $content)
    // aby prawidlowo wywolac ten element nalezy go dodac gdzie chcemy ( trzeba wywolac 2 funkcje modal i modal_button) modal_id musibyc takie samo w dwóch funkcjach
  ?>
    <button id="<?=$button_id?>"><?=$button_text?></button>
    <script type="text/javascript">
    // When the user clicks on the button, open the modal
    jQuery( "#<?=$button_id?>" ).click(function() {
      jQuery( "#<?=$modal_id?>" ).show();
    });
    </script>
  <?php
}
 function slick_basic($field_name, $slider_class, $loading) {
   // ustawienia dla nazwy dodajemy w src\js\components\slider.js
   // field_name - nazwa pola z ACF *required
   // slider_classe - nazwa slidera *required
   // loading - jakie ladowanie eager czy lazy *required
     if( have_rows($field_name) ):
     ?>
     <div class="<?= $slider_class ?>">
               <div class="slide">
                 <div class="slideWrapper">
                   <?php while( have_rows($field_name) ) : the_row();?>
                     <div class="slideContent">
                       <?php
                       $images = get_field($field_name);
                       if( $images ): ?>
                               <?php foreach( $images as $image_id ): ?>
                                   <!-- <img loading="<?= $loading ?>" class="slideImage" src="<?= $image_id ?>">  WYLACZONY SLIDER -->
                               <?php endforeach; ?>
                       <?php endif; ?>
                     </div>
                   <?php endwhile; wp_reset_query(); ?>
               </div>
             </div>
             <div class="pager"></div>
     </div>

     <?php
         endif;

   }

 function slick_advance($field_name, $slider_class, $loading, $subfields = NULL) {
   // ustawienia dla nazwy dodajemy w src\js\components\slider.js
   // field_name - nazwa pola z ACF *required
   // slider_classe - nazwa slidera *required
   // subfields to array z danymi subfieldów przyjmuje wartość nazwy pola ACF bądź false
   // loading - jakie ladowanie eager czy lazy *required
   if( have_rows($field_name) ):
   ?>
   <div class="<?= $slider_class ?>">
             <div class="slide">
               <div class="slideWrapper">
                 <?php while( have_rows($field_name) ) : the_row();?>
                   <div class="slideContent">
                     <?php
                     if($subfields['ikona'] !== false): ?>
                     <i class="sliderIcon icon <?=get_sub_field($subfields['ikona']); ?>"></i>
                     <?php endif;
                     if($subfields['gallery'] !== false): ?>
                       <?php foreach( get_sub_field($subfields['gallery']) as $image_id ): ?>
                           <img loading="<?= $loading ?>" class="sliderGallery" src="<?= $image_id ?>">
                       <?php endforeach; ?>
                     <?php endif; ?>
                     <?php
                     if($subfields['tytul'] !== false): ?>
                     <h5 class="sliderTitle"><?=get_sub_field($subfields['tytul']); ?></h5>
                     <?php endif;
                     if($subfields['opis'] !== false): ?>
                     <p class="sliderDescription"><?=get_sub_field($subfields['opis']); ?></p>
                     <?php endif; ?>
                   </div>
                 <?php endwhile; wp_reset_query(); ?>
             </div>
           </div>
           <div class="pager"></div>
   </div>

   <?php
       endif;

 }
 // cookies
 function cookies() {
   ?>

   <?php $cookies_link = get_field('link_do_cookies','option'); ?>
   <script type="text/javascript">


   //All the cookie setting stuff
   function SetCookie(cookieName, cookieValue, nDays) {
   	"use strict";
   	var today = new Date();
   	var expire = new Date();
   	if (nDays == null || nDays == 0) nDays = 1;
   	expire.setTime(today.getTime() + 3600000 * 24 * nDays);
   	document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + "; path=/";
   }

   function ReadCookie(cookieName) {
   	"use strict";
   	var theCookie = " " + document.cookie;
   	var ind = theCookie.indexOf(" " + cookieName + "=");
   	if (ind == -1) ind = theCookie.indexOf(";" + cookieName + "=");
   	if (ind == -1 || cookieName == "") return "";
   	var ind1 = theCookie.indexOf(";", ind + 1);
   	if (ind1 == -1) ind1 = theCookie.length;
   	return unescape(theCookie.substring(ind + cookieName.length + 2, ind1));
   }

   function DeleteCookie(cookieName) {
   	"use strict";
   	var today = new Date();
   	var expire = new Date() - 30;
   	expire.setTime(today.getTime() - 3600000 * 24 * 90);
   	document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString();
   }

   function AcceptCookies() {
   	SetCookie('sgCookies', true, 30);
   	jQuery("#cookie-bar").hide();

   }


   jQuery(document).ready(function (e) {
     var toTop = jQuery("<div id='cookie-bar'> <p>Diese Webseite verwendet Cookies. Durch die Benutzung dieser Seite stimmen Sie dem zu. Informationen darüber, wie wir Cookies verwenden, erhalten Sie <a href='<?php echo $cookies_link; ?>'>hier</a>.<button id='Cookie' class='cookie-button' tabindex=1 onclick='AcceptCookies();'>Ok</button> </div>").appendTo("body");



   if (!ReadCookie("sgCookies")) { //If the cookie has not been set
   			jQuery("#cookie-bar").show();

   	} else {
   			jQuery("#cookie-bar").hide();


   	}
   	});

 </script>

   <?php
 }

 /* Start funkcji Users
  * Creating the Manager role
  * Any role cannot create Administrator user
 */

 function what_user_can() {
    // creating role capabilities
   add_role( 'manager', 'Manager strony',
     [
       'read'         => true,
       'edit_posts'   => true,
       'edit_others_posts' => true,
       'edit_private_posts' => true,
       'publish_posts' => true,
       'read_private_posts' => true,
       'edit_others_posts' => true,
       'edit_published_posts' => true,
       'edit_pages' => true,
       'edit_others_pages' => true,
       'read_private_pages' => true,
       'edit_private_pages' => true,
       'publish_pages' => true,
       'edit_published_pages' => true,
       'delete_posts' => true,
       'delete_private_posts' => true,
       'upload_files' => true,
       'delete_published_posts' => true,
       'manage_categories' => true,
       'delete_pages' => true,
       'delete_others_pages' => true,
       'delete_published_pages' => true,
       'delete_others_posts' => true,
       'delete_private_posts' => true,
       'delete_private_pages' => true,
       'manage_options' => true,
       'edit_theme_options' => true,
       'create_users' => true
       ]
   );
   $user = wp_get_current_user(); // specify if user is not administrator
    if ( !in_array('administrator', $user->roles) ) {
       add_filter('acf/settings/show_admin', '__return_false'); // turn off ACF
       remove_action( 'admin_menu', 'cptui_plugin_menu' ); // turn off CPT UI
       function wpdocs_remove_menus(){ // delete specific menu items
         remove_menu_page( 'edit-comments.php' );  // turn off Comments
       }
       add_action( 'admin_menu', 'wpdocs_remove_menus' );
    }
    remove_role('author');  // remove specific roles
    remove_role('editor');
    remove_role('contributor');
    remove_role('subscriber');
  }
   add_action('init', 'what_user_can'); // init function

   /**
  * Deny access to 'administrator' for other roles
  * Else anyone, with the edit_users capability, can edit others
  * to be administrators - even if they are only editors or authors
  *
  * @since   0.1
  * @param   (array) $all_roles
  * @return  (array) $all_roles
  */
 function deny_change_to_admin( $all_roles )
 {
     if ( ! current_user_can('administrator') )
         unset( $all_roles['administrator'] );

     if (
         ! current_user_can('administrator')
         OR ! current_user_can('editor')
     )
         unset( $all_roles['editor'] );

     if (
         ! current_user_can('administrator')
         OR ! current_user_can('editor')
         OR ! current_user_can('author')
     )
         unset( $all_roles['author'] );

     return $all_roles;
 }
 function deny_rolechange()
 {
     add_filter( 'editable_roles', 'deny_change_to_admin' );
 }
 add_action( 'after_setup_theme', 'deny_rolechange' );

 // Koniec funkcji Users

 function awesome_acf_responsive_image($image_id,$image_size,$max_width){

 	// check the image ID is not blank
 	if($image_id != '') {

 		// set the default src image size
 		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

 		// set the srcset with various image sizes
 		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

 		// generate the markup for the responsive image
 		echo 'src="'.$image_src.'" srcset="'.$image_srcset.'" sizes="(max-width: '.$max_width.') 100vw, '.$max_width.'"';

 	}
 }


 function buildFormAjax($security, $typ, $title = NULL){
   // tworzmy tutaj formularz i wysyłamy stąd zapytanie do ajaxa z $security zabezpieczajacym to zapytanie
   // security - token zabezpieczen do WP
   // typ - contact/offer ( zmienia subject wiadomosci )
   // title - przechowuje tytul strony
   $key = get_field('klucze', 'option');
   $contact_data = get_field('informacje_kontaktowe', 'option');
   ?>
   <script src="https://www.google.com/recaptcha/api.js?render=<?= $key["recaptcha_v3_public_key"]?>"></script>
   <form action="" id="contactForm" class="contactForm" method="post">
     <ul>
         <div>
         <li>
           <label for="name"><?= _e('Name <span>*</span>','sklep-lookslike') ?></label>
           <input class="input" type="text" name="name" id="name" value=""  />
         </li>
         <li class="full">
           <label for="email"><?= _e('E-mail <span>*</span>','sklep-lookslike') ?></label>
           <input class="input" type="text" name="email" id="email" value=""/>
         </li>
         <li>
           <label for="phone"><?= _e('Telefon <span>*</span>','sklep-lookslike') ?></label>
           <input class="input" type="text" name="phone" id="phone" value="" />
         </li>
         <li class="textarea">
           <label for="message"><?= _e('Kommentar oder Nachricht <span>*</span>','sklep-lookslike') ?></label>
           <textarea class="input" name="message" id="message" ></textarea>
         </li>
       </div>
       <li class="formButton">
         <button type="submit" class="button woocommerce-Button"><?= _e('Absenden','sklep-lookslike') ?></button>
         <input type="hidden" name="action" value="formAjax" style="display: none; visibility: hidden; opacity: 0;">
       </li>
       <?php
       if($contact_data["rodo"]):
        ?>
       <li class="rodoInfo">
         <p>
           <input type="checkbox" name="rodo" id="rodo" placeholder="<?= _e('Rodo','sklep-lookslike') ?>"/>
           <?= $contact_data["rodo"] ?>
         </p>
       </li>
       <?php
        endif;
        ?>
     </ul>
     <input type="hidden" id="token" name="token">
     <input type="hidden" id="security" name="security" value="<?=$security?>">
     <input type="hidden" name="submitted" id="submitted" value="true" />
     <input type="hidden" name="title" id="titlePage" value="<?php if(isset($title)): echo $title; endif; ?>" />
     <input type="hidden" name="typ" id="typ" value="<?=$typ?>" />
     <div class="validateFormSuccessField"></div>
   </form>
   <?php  $ajax_nonce = wp_create_nonce( "security_".$security );  ?>

   <script type="text/javascript">
     grecaptcha.ready(function() {
         grecaptcha.execute('<?= $key["recaptcha_v3_public_key"]?>', {action: 'homepage'}).then(function(token) {
            // console.log(token);
            document.getElementById("token").value = token;

         });
     });

     jQuery( '#contactForm' ).on( 'submit', function(event) {
       event.preventDefault();
         var form_data = jQuery( this ).serializeArray();
         form_data.push( { "name" : "security", "value" : "<?= $ajax_nonce ?>" } );

         jQuery.ajax({
             url : '<?= admin_url('admin-ajax.php'); ?>',
             type : 'POST',
             data : form_data,
             success : function( response ) {
               response = JSON.parse(response);
               if(response.status == false){
                 jQuery("#contactForm .validateFormSuccessField .validateFormSuccess").remove();
                 jQuery("#contactForm .validateFormSuccessField .validateFormFail").remove();
                 jQuery("#contactForm li .validateFormFail").remove();
                 if(response.message.email){
                   jQuery("#contactForm #email").parent().append("<p class='validateFormFail'>"+response.message.email+"</p>");
                 }
                 if(response.message.phone){
                   jQuery("#contactForm #phone").parent().append("<p class='validateFormFail'>"+response.message.phone+"</p>");
                 }
                 if(response.message.name){
                   jQuery("#contactForm #name").parent().append("<p class='validateFormFail'>"+response.message.name+"</p>");
                 }
                 // if(response.message.rodo){
                 //   jQuery("#contactForm #rodo").parent().append("<p class='validateFormFail'>"+response.message.rodo+"</p>");
                 // }
                 if(response.message.message){
                   jQuery("#contactForm #message").parent().append("<p class='validateFormFail'>"+response.message.message+"</p>");
                 }
               }
               if(response.status == true){
                 if(response.message.success == undefined){
                   jQuery("#contactForm .validateFormSuccessField .validateFormSuccess").remove();
                   jQuery("#contactForm .validateFormSuccessField .validateFormFail").remove();
                   jQuery("#contactForm li .validateFormFail").remove();
                    jQuery("#contactForm .validateFormSuccessField").append("<p class='validateFormFail'></p>");
                 }
                 else{
                   jQuery("#contactForm .validateFormSuccessField .validateFormSuccess").remove();
                   jQuery("#contactForm .validateFormSuccessField .validateFormFail").remove();
                   jQuery("#contactForm li .validateFormFail").remove();
                    jQuery("#contactForm .validateFormSuccessField").append("<p class='validateFormSuccess'>"+response.message.success+"</p>");
                 }
               }
             },
             fail : function( err ) {

                 alert( "wystąpił błąd: " + err );
             },
             error: function (xhr, ajaxOptions, thrownError) {
               console.log(thrownError);
             }
         });

         return false;
     });
     </script>

  <?php
 }

 function formAjax()
 {
      wp_verify_nonce("security_".$_POST['security']);


      $name = trim( strip_tags( htmlspecialchars( $_POST['name'] ) ) );
      $email = trim( strip_tags( htmlspecialchars( $_POST['email'] ) ) );
      $phone = trim( strip_tags( htmlspecialchars( $_POST['phone'] ) ) );
      $text = trim( strip_tags(htmlspecialchars( $_POST['message'] ) ) );


      $response = array(
          'status' => true,
          'message' => array()
      );

      if ( empty( $name ) ) {
          $response['status'] = false;
          $response['message']['name'] = 'Bitte wählen Sie Ihren Vor- und Nachnamen oder Firmennamen.';
      } else if ( ! preg_match( "/^[a-zA-Z ]*$/", $name ) ) {
          $response['status'] = false;
          $response['message']['name'] = 'Es wurden illegale Zeichen verwendet.';
      } else {
          $message .= 'Name: ' . $name . ', ';
      }


      if ( empty( $email ) ) {
          $response['status'] = false;
          $response['message']['email'] = 'E-Mail ist erforderlich.';
      } else if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
          $response['status'] = false;
          $response['message']['email'] = 'Falsches E-Mail-Format.';
      } else {
          $message .= 'Email: ' . $email . ', ';
      }

      if ( ! preg_match("/^[0-9\+]{8,13}$/", $phone) && $phone !== '') {
          $response['status'] = false;
          $response['message']['phone'] = 'Falsches Telefonnummernformat.';
      }
      elseif( empty( $phone ) ) {
          $response['status'] = false;
          $response['message']['phone'] = 'Gib mir deine Telefonnummer.';
          $message .= 'Podaj numer telefonu';
      }


      if ( empty( $text ) ) {
          $response['status'] = false;
          $response['message']['message'] = 'Bitte vervollständigen Sie Ihre Nachricht.';
      }
      else{
        $content .= 'Wiadomość: ' . $text;
      }

      // if(!isset($_POST['rodo'])) {
      //   $response['status'] = false;
      //   $response['message']['rodo'] = 'Bitte stimmen Sie der Verarbeitung Ihrer persönlichen Daten zu.';
      // }

      if ( $response['status'] == true ) {
          // captch validacja
          $url = "https://www.google.com/recaptcha/api/siteverify";
          $key = get_field('klucze', 'option');
          $contact_data = get_field('informacje_kontaktowe', 'option');
          $data = [
            'secret' => $key["recaptcha_v3_secret_key"],
            'response' => $_POST['token'],
            // 'remoteip' => $_SERVER['REMOTE_ADDR']
          ];
          $options = array(
              'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
              )
            );
          $context  = stream_context_create($options);
          $response_google = file_get_contents($url, false, $context);
          $res = json_decode($response_google, true);
          if($res['success'] == true) {
          // captcha end validate
          $response['message']['success'] = "Vielen Dank! Ihre Nachricht wurde gesendet.";
          $headers = 'Content-type: text/html; charset=utf-8';
          if ($_POST['typ'] == 'contact') {
            $subject = 'Zapytanie z formularza Kontaktowego';
            $body = "Zapytanie z formularza Kontaktowego\n\nNazwa: $name \n\nEmail: $email \n\nTelefon: $phone \n\nTreść: $content \n\n-- \n\nWiadomość wysłana ze strony internetowej - $site_name";
          } else {
            $subject = 'Zapytanie ofertowe - '.$_POST['title'];
            $body = "Zapytanie dotyczy oferty: ".$_POST['title']."\n\nNazwa: $name \n\nEmail: $email \n\nTelefon: $phone \n\nTreść: $content \n\n-- \n\nWiadomość wysłana ze strony internetowej - $site_name";
          }  $headers = 'From: '.$name.' <'.$contact_data["email"].'>' . "\r\n" . 'Reply-To: ' . $email;
          wp_mail($contact_data["email"], $subject, $body, $headers);
        }

      }
      echo json_encode($response);
      die();

 }

 add_action('wp_ajax_formAjax', 'formAjax');
 add_action('wp_ajax_nopriv_formAjax', 'formAjax');


 /**
  * Show cart contents / total Ajax
  */
 add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

 function woocommerce_header_add_to_cart_fragment( $fragments ) {
 	global $woocommerce;

 	ob_start();

 	?>
 	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
 	<?php
 	$fragments['a.cart-customlocation'] = ob_get_clean();
 	return $fragments;
 }

 //Woocommerce function
add_filter( 'gettext', function( $translated_text ) {
    if ( 'View cart' === $translated_text ) {
        $translated_text = 'Warenkorb anzeigen';
    }
    return $translated_text;
} );


 add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
 function add_percentage_to_sale_badge( $html, $post, $product ) {
     if( $product->is_type('variable')){
         $percentages = array();

         // Get all variation prices
         $prices = $product->get_variation_prices();

         // Loop through variation prices
         foreach( $prices['price'] as $key => $price ){
             // Only on sale variations
             if( $prices['regular_price'][$key] !== $price ){
                 // Calculate and set in the array the percentage for each variation on sale
                 $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
             }
         }
         // We keep the highest value
         $percentage = max($percentages) . '%';
     } else {
         $regular_price = (float) $product->get_regular_price();
         $sale_price    = (float) $product->get_sale_price();

         $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
     }
     return '<span class="onsale">' . $percentage . '</span>';
 }
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Change number of related products output
 */
function woo_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 3;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 3; // arranged in 2 columns
	return $args;
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

//refresh add to cart count header
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <div id="mini-cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
    <?php
        $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}


add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_total');
function wc_refresh_mini_cart_total($fragments){
    ob_start();
    ?>
    <div id="mini-cart-total">
        <?php echo WC()->cart->get_cart_total(); ?>
    </div>
    <?php
        $fragments['#mini-cart-total'] = ob_get_clean();
    return $fragments;
}

// Code to be placed in functions.php of your theme or a custom plugin file.
add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file', 10, 2 );

/*
 * Replace 'textdomain' with your plugin's textdomain. e.g. 'woocommerce'.
 * File to be named, for example, yourtranslationfile-en_GB.mo
 * File to be placed, for example, wp-content/lanaguages/textdomain/yourtranslationfile-en_GB.mo
 */
function load_custom_plugin_translation_file( $mofile, $domain ) {
  if ( 'woocommerce' === $domain ) {
    $mofile = WP_LANG_DIR . '/woocommerce/woocommerce-' . get_locale() . '.mo';
  }
  return $mofile;
}

// Code to be placed in functions.php of your theme or a custom plugin file.
add_filter( 'load_textdomain_mofile', 'load_custom_plugin_translation_file2', 10, 2 );

/*
 * Replace 'textdomain' with your plugin's textdomain. e.g. 'woocommerce'.
 * File to be named, for example, yourtranslationfile-en_GB.mo
 * File to be placed, for example, wp-content/lanaguages/textdomain/yourtranslationfile-en_GB.mo
 */
function load_custom_plugin_translation_file2( $mofile, $domain ) {
  if ( 'woocommerce-gateway-amazon-payments-advanced' === $domain ) {
    $mofile = WP_LANG_DIR . '/woocommerce-gateway-amazon-payments-advanced/woocommerce-gateway-amazon-payments-advanced-' . get_locale() . '.mo';
  }
  return $mofile;
}

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $parts = parse_url($url);
   parse_str($parts['query'], $query);
  $cols = $query['posts_per_page'];
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  return $cols;
}


add_filter( 'woocommerce_email_attachments', 'lookslike_attach_to_wc_emails', 10, 3);
function lookslike_attach_to_wc_emails ( $attachments , $email_id, $order ) {
  $file_path = array();
  $counter = 0;
  if( have_rows('zalaczniki', 'option') ): //parent group field
  while( have_rows('zalaczniki', 'option') ): the_row();
    $file_path[$counter] = get_sub_field('zalacznik');
    echo $file_path[$counter];
    $counter++;
  endwhile;
  endif;

	// Avoiding errors and problems
    if ( ! is_a( $order, 'WC_Order' ) || ! isset( $email_id ) ) {
        return $attachments;
    }


 	// if a child theme is being used, then use this line to get the directory
 	// $file_path = get_stylesheet_directory() . '/file.pdf';

	if ( $email_id == 'customer_on_hold_order' ){
		$attachments[] = $file_path[0];
    $attachments[] = $file_path[1];
    $attachments[] = $file_path[2];
    $attachments[] = $file_path[3];
		return $attachments;
	} elseif ( $email_id == 'customer_completed_order' ) {
		$attachments[] = $file_path_2;
		return $attachments;
	} elseif ( $email_id == 'customer_note' ) {
		$attachments[] = $file_path_3;
		return $attachments;
	} else {
		return $attachments;
	}
}

add_filter( 'woocommerce_email_attachments', 'attach_to_wc_emails', 10, 3);

function attach_to_wc_emails ( $attachments , $id, $object ) {

  $file_path_2 = get_template_directory() . '/email/Muster-Widerrufsformular.pdf'; // directory of the current theme

  $attachments[] = $file_path_2;

 	 // if a child theme is being used then use this line to get the directory
 	// $file_path = get_stylesheet_directory() . '/file.pdf';

	return $attachments;
}

function theme_xyz_header_metadata() {

    // Post object if needed
    global $product;

    // Page conditional if needed
    // if( is_page() ){}

  ?>

  <meta property="product:availability" content="<?php echo $product->stock_status; ?>">
  <meta property="product:price:amount" content="<?php echo $product->price; ?>">
  <meta property="product:price:currency" content="<?php echo get_option('woocommerce_currency'); ?>">
  <meta property="product:retailer_item_id" content="<?php echo $product->sku; ?>">
  <meta property="product:brand" content="Amilian">
  <meta property="product:condition" content="new">
  <meta property="product:item_group_id" content="">

  <?php

}
add_action( 'wp_head', 'theme_xyz_header_metadata' );


?>
