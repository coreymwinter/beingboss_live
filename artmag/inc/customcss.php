<?php 
function artmag_fm_custom_style_import() {
global $artmag_opt;
?>
<style type="text/css">

<?php if($artmag_opt['head-font-type'] == "custom-head") { ?>
@font-face {
  font-family: "<?php echo esc_attr($artmag_opt['custom-head-name']); ?>";
  src:url("<?php echo esc_attr($artmag_opt['head-eot']); ?>");
  src:url("<?php echo esc_attr($artmag_opt['head-iefix']); ?>?#iefix") format("embedded-opentype"),
    url("<?php echo esc_attr($artmag_opt['head-woff']); ?>") format("woff"),
    url("<?php echo esc_attr($artmag_opt['head-ttf']); ?>") format("truetype"),
    url("<?php echo esc_attr($artmag_opt['head-svg']); ?>") format("svg");
    font-weight: 300;
    font-style: normal;
}
h1#comments, .big-title h1, .newsletter-left input, .logo-text h1 { font-family: <?php echo esc_attr($artmag_opt['custom-head-name']); ?>; }
<?php } ?>
<?php if($artmag_opt['body-font-type'] == "custom-body") { ?>
@font-face {
  font-family: "<?php echo esc_attr($artmag_opt['custom-body-name']); ?>";
  src:url("<?php echo esc_attr($artmag_opt['body-eot']); ?>");
  src:url("<?php echo esc_attr($artmag_opt['body-iefix']); ?>?#iefix") format("embedded-opentype"),
    url("<?php echo esc_attr($artmag_opt['body-woff']); ?>") format("woff"),
    url("<?php echo esc_attr($artmag_opt['body-ttf']); ?>") format("truetype"),
    url("<?php echo esc_attr($artmag_opt['body-svg']); ?>") format("svg");
    font-weight: 300;
    font-style: normal;
}
body { font-family: <?php echo esc_attr($artmag_opt['custom-body-name']); ?>; }
<?php } ?>
<?php if($artmag_opt['second-font-type'] == "custom-second") { ?>
@font-face {
  font-family: "<?php echo esc_attr($artmag_opt['custom-second-name']); ?>";
  src:url("<?php echo esc_attr($artmag_opt['second-eot']); ?>");
  src:url("<?php echo esc_attr($artmag_opt['second-iefix']); ?>?#iefix") format("embedded-opentype"),
    url("<?php echo esc_attr($artmag_opt['second-woff']); ?>") format("woff"),
    url("<?php echo esc_attr($artmag_opt['second-ttf']); ?>") format("truetype"),
    url("<?php echo esc_attr($artmag_opt['second-svg']); ?>") format("svg");
    font-weight: 300;
    font-style: normal;
}
h1,h2,h3,h4,h5,h6,.blog-tagline,.instagram-bar-subtitle, #top-menu ul li a, .tooltip-inner,#footer-menu ul li a, .slicknav_btn .slicknav_menutxt, .mOver-list li a, .mOver-mobile .mOver-mobile-title, .post-element,#calendar_wrap thead,#calendar_wrap caption, tfoot,.sidebar-widget .searchform input[type="text"],input[type="text"],.scrollup, .tab-content h4 a{ font-family: <?php echo esc_attr($artmag_opt['custom-second-name']); ?>; }
<?php } ?>
<?php if($artmag_opt['main-font-type'] == "custom-main") { ?>
@font-face {
  font-family: "<?php echo esc_attr($artmag_opt['custom-main-name']); ?>";
  src:url("<?php echo esc_attr($artmag_opt['main-eot']); ?>");
  src:url("<?php echo esc_attr($artmag_opt['main-iefix']); ?>?#iefix") format("embedded-opentype"),
    url("<?php echo esc_attr($artmag_opt['main-woff']); ?>") format("woff"),
    url("<?php echo esc_attr($artmag_opt['main-ttf']); ?>") format("truetype"),
    url("<?php echo esc_attr($artmag_opt['main-svg']); ?>") format("svg");
    font-weight: 300;
    font-style: normal;
}
nav#main-menu ul li a, .reading-text, #mega-menu-wrap-main-menu #mega-menu-main-menu a{ font-family: <?php echo esc_attr($artmag_opt['custom-main-name']); ?>; }
<?php } ?>


/*-----------------------------------------------------------------------------------*/
/*  Main Color
/*-----------------------------------------------------------------------------------*/

cite,
kbd,
.main-menu ul li.current-menu-item a,
.active-color,
.post-text a,
.newsletter-left label h6,
.main-menu ul li.current-menu-item a, .reading-text, .reading-progress-bar,#mega-menu-wrap-main-menu li.mega-current-menu-item > a, #mega-menu-wrap-main-menu ul.mega-menu li:hover > a{
background: <?php echo esc_attr($artmag_opt['main-color']); ?>;
}

#mega-menu-wrap-main-menu #mega-menu-main-menu > li.mega-menu-megamenu > ul.mega-sub-menu, #mega-menu-wrap-main-menu #mega-menu-main-menu > li.mega-menu-flyout ul.mega-sub-menu{
  border-top: 3px solid <?php echo esc_attr($artmag_opt['main-color']); ?>;
}

.tabbed-area .tab_title.active a{
  border-bottom: 3px solid <?php echo esc_attr($artmag_opt['main-color']); ?>;
}

#mega-menu-wrap-main-menu #mega-menu-main-menu > li.mega-menu-megamenu > ul.mega-sub-menu:before, #mega-menu-wrap-main-menu #mega-menu-main-menu > li.mega-menu-flyout ul.mega-sub-menu:before {
  border-color: transparent transparent <?php echo esc_attr($artmag_opt['main-color']); ?> transparent;
}

.center-bottom-line h1{
	border-color: <?php echo esc_attr($artmag_opt['main-color']); ?>;
}

.post-text a{
	color: <?php echo esc_attr($artmag_opt['link-main-color']); ?>
}

.post-text a{
	background: <?php echo esc_attr($artmag_opt['link-background']); ?>
}




<?php 

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}


$rgb = hex2rgb(esc_attr($artmag_opt['main-color']));


?>


.social-links ul li a:hover,
input[type="submit"],
.newsletter-right input[type="submit"],
.read-more.button,
.pagination ul li.active{
	-webkit-box-shadow: 2px 2px 0px 0px rgba(<?php echo esc_attr($rgb[0]); ?>,<?php echo esc_attr($rgb[1]); ?>,<?php echo esc_attr($rgb[2]); ?>,1) !important;
    -moz-box-shadow: 2px 2px 0px 0px rgba(<?php echo esc_attr($rgb[0]); ?>,<?php echo esc_attr($rgb[1]); ?>,<?php echo esc_attr($rgb[2]); ?>,1) !important;
    box-shadow: 2px 2px 0px 0px rgba(<?php echo esc_attr($rgb[0]); ?>,<?php echo esc_attr($rgb[1]); ?>,<?php echo esc_attr($rgb[2]); ?>,1) !important;
}

/*-----------------------------------------------------------------------------------*/
/*  Header Background
/*-----------------------------------------------------------------------------------*/

<?php if($artmag_opt['nav-back'] == "image" ){?>

.main-menu{
    background: url(<?php echo esc_attr($artmag_opt['nav-image']['url']); ?>);
    background-repeat: repeat;
}

<?php }else{ ?>

.main-menu{
    background: <?php echo esc_attr($artmag_opt['nav-color']); ?>;
}

<?php } 
if($artmag_opt['head-style-type'] == "video" || $artmag_opt['head-style-type'] == "image"){?>
.header-container, .vertical{height: 200px;}
<?php } ?>

<?php if (!empty($artmag_opt['custom-css-area'])){ echo esc_attr($artmag_opt['custom-css-area']); }?>

</style>

<?php 
}
add_action('wp_head', 'artmag_fm_custom_style_import');
?>