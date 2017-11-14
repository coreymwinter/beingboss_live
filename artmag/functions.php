<?php
/**************************************************************************************************/
/* Define Constants */
/**************************************************************************************************/

define('THEMEROOT', get_template_directory_uri());
define('REDUX', get_template_directory());
define('IMAGES', THEMEROOT . '/images');

/**************************************************************************************************/
/* Admin Framework  */
/**************************************************************************************************/

if ( !class_exists( 'ReduxFramework' ) && file_exists( REDUX . '/admin/ReduxCore/framework.php' ) ) {
    require_once( REDUX . '/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( REDUX . '/admin/blog/blog-config.php' ) ) {
    require_once( REDUX . '/admin/blog/blog-config.php' );
}

/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}

/**************************************************************************************************/
/* Theme Setup  */
/**************************************************************************************************/

add_action( 'after_setup_theme', 'artmag_fm_setup' );

function artmag_fm_setup(){

global $content_width;
if ( ! isset( $content_width ) ) $content_width = 1200;

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 848, 400, true);
}

add_theme_support( 'post-formats', array(
    'audio', 'gallery', 'link', 'quote', 'video'
));

load_theme_textdomain( 'artmag', get_template_directory().'/languages' );

add_action('init', 'artmag_fm_register_menus');

add_theme_support( 'automatic-feed-links' );

add_theme_support( 'title-tag' );

}

/**************************************************************************************************/
/* Visual Composer */
/**************************************************************************************************/

add_action( 'vc_before_init', 'artmag_fm_vcSetAsTheme' );
function artmag_fm_vcSetAsTheme() {
    vc_set_as_theme($disable_updater = true);
}

if(class_exists('WPBakeryVisualComposerAbstract')){
  function requireVcExtend(){
    require_once locate_template('/wpbakery/extend-vc.php');
  }
  add_action('init', 'requireVcExtend', 10);
}


/**************************************************************************************************/
/* Shortcodes */
/**************************************************************************************************/

require_once get_template_directory() . '/inc/shortcodes.php';


/**************************************************************************************************/
/* TGM plugin activation */
/**************************************************************************************************/

include( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );
include( get_template_directory() . '/inc/tgm/tgm-config.php' );

/**************************************************************************************************/
/* Custom Styles */
/**************************************************************************************************/

include_once get_template_directory() . '/inc/customcss.php';
include_once get_template_directory() . '/inc/customjs.php';

/**************************************************************************************************/
/* Custom Widgets */
/**************************************************************************************************/

include get_template_directory() . '/inc/custom-widgets/author.php';
include get_template_directory() . '/inc/custom-widgets/social-media.php';
include get_template_directory() . '/inc/custom-widgets/instagram.php';
include get_template_directory() . '/inc/custom-widgets/pinterest.php';
include get_template_directory() . '/inc/custom-widgets/recent-posts.php';
include get_template_directory() . '/inc/custom-widgets/most-popular.php';
include get_template_directory() . '/inc/custom-widgets/tabs.php';

if (!function_exists('artmag_fm_register_sidebars')) {
    function artmag_fm_register_sidebars() {
        if (function_exists('register_sidebar')) {
            register_sidebar(
                array(
                'name' => esc_html__( 'Main Sidebar', 'artmag' ),
                'id' => 'sidebar-1',
                'description' => __( 'Main Sidebar', 'artmag' ),
                'before_widget' => '<div class="sidebar-widget">',
                'after_widget' => '</div>',
                'before_title' => '<hr><h6>',
                'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                'name' => esc_html__( 'Footer 1 Widget', 'artmag' ),
                'id' => 'footer-1',
                'description' => __( 'Footer 1 Widget', 'artmag' ),
                'before_widget' => '<div class="footer-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h6>',
                'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                'name' => esc_html__( 'Footer 2 Widget', 'artmag' ),
                'id' => 'footer-2',
                'description' => __( 'Footer 2 Widget', 'artmag' ),
                'before_widget' => '<div class="footer-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h6>',
                'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                'name' => esc_html__( 'Footer 3 Widget', 'artmag' ),
                'id' => 'footer-3',
                'description' => __( 'Footer 3 Widget', 'artmag' ),
                'before_widget' => '<div class="footer-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h6>',
                'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                    'name' => esc_html__( 'Footer Instagram', 'artmag' ),
                    'id' => 'instagram-footer',
                    'before_widget' => '<div class="footer-instagram-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4>',
                    'after_title' => '</h4>',
            )); 
            register_sidebar(
                array(
                    'name' => esc_html__( 'News Sidebar', 'artmag' ),
                    'id' => 'news-sidebar',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                    'name' => esc_html__( 'News Sidebar - 2', 'artmag' ),
                    'id' => 'news-sidebar-2',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                    'name' => esc_html__( 'Music Sidebar', 'artmag' ),
                    'id' => 'music-sidebar',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                    'name' => esc_html__( 'Default Site Sidebar 1', 'artmag' ),
                    'id' => 'default-sidebar-1',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                    'name' => esc_html__( 'Default Site Sidebar 2', 'artmag' ),
                    'id' => 'default-sidebar-2',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));
            register_sidebar(
                array(
                    'name' => esc_html__( 'Default Site Sidebar 3', 'artmag' ),
                    'id' => 'default-sidebar-3',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));  
            register_sidebar(
                array(
                    'name' => esc_html__( 'Food Sidebar', 'artmag' ),
                    'id' => 'food-sidebar',
                    'before_widget' => '<div class="sidebar-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<hr><h6>',
                    'after_title' => '</h6>',
            ));
        }
    }
    add_action( 'widgets_init', 'artmag_fm_register_sidebars');
}

require_once get_template_directory() . '/inc/custom-sidebars/customsidebars.php';
require_once get_template_directory() . '/inc/megamenu/megamenu.php';

/**************************************************************************************************/
/* Register Css */
/**************************************************************************************************/

function artmag_fm_register_styles() { 

    // Register
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css','','1'); 
    wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css','','1');
    wp_register_style('slicknav', get_template_directory_uri() . '/css/slicknav.css','','1');
    wp_register_style('responsive', get_template_directory_uri() . '/css/artmag-responsive.css','','1');
    // Enqueue
    wp_enqueue_style('bootstrap');
    if (is_rtl()){
        wp_register_style('bootstrap-rtl', get_template_directory_uri() . '/css/bootstrap.rtl.min.css','','1'); 
        wp_enqueue_style('bootstrap-rtl');
    }
    wp_enqueue_style('owl-carousel');
    wp_enqueue_style('slicknav');
    wp_enqueue_style( 'main', get_stylesheet_uri()); 
    wp_enqueue_style('main'); 
    if (is_rtl()){
        wp_register_style('artmag-rtl', get_template_directory_uri() . '/css/artmag-rtl.css','','1'); 
        wp_enqueue_style('artmag-rtl');
    }
    wp_enqueue_style('responsive');   
}

add_action('wp_enqueue_scripts', 'artmag_fm_register_styles');

/**************************************************************************************************/
/* Register Js */
/**************************************************************************************************/

if (is_admin() ){
    function artmag_fm_custom_post_select(){    
        wp_register_script('init', get_template_directory_uri() . '/js/admin/init.js', 'jquery', '3.5.1');  
        wp_enqueue_script('init');
    }
}

add_action('admin_enqueue_scripts', 'artmag_fm_custom_post_select');

// add admin scripts
add_action('admin_enqueue_scripts', 'artmag_fm_ctup_wdscript');
function artmag_fm_ctup_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/admin/upload-media.js', false, '1.0', true);
}

function artmag_fm_load_custom_wp_admin_style() {
        wp_register_style( 'vc_icon', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'vc_icon' );
}

add_action( 'admin_enqueue_scripts', 'artmag_fm_load_custom_wp_admin_style' );

function artmag_fm_register_js() {
    global $artmag_opt;
    // Register
    $reqjq = array( 'jquery' );

    wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', '3.5.1');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', $reqjq, '3.5.1', TRUE);
    wp_register_script('mover', get_template_directory_uri() . '/js/jquery.mover.slider.1.0.js', $reqjq, '', TRUE);
    wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', $reqjq, '', TRUE);
    wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', $reqjq, '', TRUE);
    wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.pack.1.4.1.js', $reqjq, '', TRUE);
    wp_register_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', $reqjq, '', TRUE);
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', $reqjq, '', TRUE);

    // Enqueue
    wp_enqueue_script('modernizr');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('mover');
    wp_enqueue_script('owl-carousel');
    wp_enqueue_script('fitvids');
    wp_enqueue_script('superfish');

    if($artmag_opt['head-style-type'] == "video"){
        $youtube = "youtube";
        $vimeo = "vimeo";
        $youtubesec = "youtu.be";
        $video_url = $artmag_opt['head-video'];
        if (strlen(strstr($video_url,$youtube))>0) {
            $videotype = "youtube";
        }elseif(strlen(strstr($video_url,$youtubesec))>0) {
            $videotype = "youtube";
        }elseif(strlen(strstr($video_url,$vimeo))>0){
            $videotype = "vimeo";
        }else{
            $videotype = "mp4";
        }
        if($videotype == 'youtube'){
        wp_register_script('youtube', 'http://www.youtube.com/player_api', 'jquery', '3.5.1', TRUE);
        wp_enqueue_script('youtube');
        }elseif($videotype == 'vimeo'){
        wp_register_script('vimeocdn', 'http://a.vimeocdn.com/js/froogaloop2.min.js', 'jquery', '3.5.1', TRUE);
        wp_enqueue_script('vimeocdn');
        }
        wp_register_script('vidBack', get_template_directory_uri() . '/js/jquery.videobg.js', $reqjq, '', TRUE);
        wp_enqueue_script('vidBack');
    }

    wp_enqueue_script('slicknav');
    wp_enqueue_script('main');

    
    $themepathjs = array( 'template_url' => get_template_directory_uri() );
    wp_localize_script( 'main', 'themepathjs', $themepathjs );
} 

add_action('wp_enqueue_scripts', 'artmag_fm_register_js');

/**************************************************************************************************/
/* Include Meta Box  */
/**************************************************************************************************/

define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/inc/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
include_once get_template_directory() . '/inc/metabox.php';


/**************************************************************************************************/
/* Custom Image Size */
/**************************************************************************************************/

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'artmag-slider', 1170, 530, true );
    add_image_size( 'artmag-full-featured', 1920, 1000, true );             
    add_image_size( 'artmag-mover-slider', 1920, 500, true );                 
    add_image_size( 'artmag-high-slider', 1170, 670, true );
    add_image_size( 'artmag-higher-slider', 1170, 870, true );                     
    add_image_size( 'artmag-full', 1170, 0, true );                
    add_image_size( 'artmag-full-crop', 1170, 873, true );                  
    add_image_size( 'artmag-list-thumbnail', 740, 550, true );                     
    add_image_size( 'artmag-two-grid', 580, 320, true );                     
    add_image_size( 'artmag-four-grid', 580, 460, true );                   
    add_image_size( 'artmag-five-grid', 440, 400, true );                     
    add_image_size( 'artmag-list-thumbnail-not-crop', 740, 0, true );                     
}


function artmag_fm_get_avatar_url($author_id, $size){
    $get_avatar = get_avatar( $author_id, $size );
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return ( $matches[1] );
}

include_once get_template_directory() . '/inc/pagination.php';

/**************************************************************************************************/
/* Search Form */
/**************************************************************************************************/

function artmag_fm_my_search_form( $form ) {
    $form = '<form method="get" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:', 'artmag' ) . '</label>
    <input type="text" placeholder="'. __("Search...","artmag") .'" value="' . get_search_query() . '" name="s" />
    <span class="search-icon"><i class="iconmag iconmag-search"></i></span>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'artmag_fm_my_search_form' );


/**************************************************************************************************/
/* Register Menu */
/**************************************************************************************************/

function artmag_fm_register_menus() {
    register_nav_menus( array( 'main-menu' => __('Main Menu',"artmag")) );
    register_nav_menus( array( 'footer-menu' => __('Footer Menu',"artmag")) );
    register_nav_menus( array( 'mobile-menu' => __('Mobile Menu',"artmag")) );
    register_nav_menus( array( 'top-menu' => __('Top Menu',"artmag")) );
}

/**************************************************************************************************/
/* Custom Comments */
/**************************************************************************************************/

function artmag_fm_comment( $comment, $args, $depth ) {
       $GLOBALS['comment'] = $comment; ?>
                                  
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="clearfix"> 
                <div class="user-comment-box clearfix">
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 col-xs-2">
                            <?php echo get_avatar($comment, $size = '130'); ?>
                        </div>
                        <div class="col-lg-10 col-sm-10 col-xs-10 comment-content">
                            <div class="clearfix">
                                 <div class="author pull-left author-title">
                                    <h5><?php printf( __( '%s', 'artmag'), get_comment_author_link() ) ?></h5>
                                    <div class="post-element clearfix">
                                        <p title="<?php echo esc_attr($post_date = get_comment_date('F j, Y g:i')); ?>" href="<?php the_permalink(); ?>" class="date"><?php echo esc_attr($post_date = get_comment_date('j F')); ?></p>
                                    </div>
                                 </div>
                                 <div class="comment-tools pull-right">
                                    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  
                                 </div>
                             </div>
                             <p><?php comment_text() ?></p>
                             <?php edit_comment_link( __( '(Edit)', 'artmag'),'  ','' ) ?>
                             <?php if ( $comment->comment_approved == '0' ) : ?>
                             <em><?php __( 'Your comment is awaiting moderation.', 'artmag' ) ?></em>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </li>
<?php }

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );


/**************************************************************************************************/
/* Excerpt Read More */
/**************************************************************************************************/

function artmag_fm_more_link() {
    return '<div class="full-width margint20"><div class="read-more button clearfix"><a href="' . get_permalink() . '">'. __("Read More","artmag") .' <span class="arrow-right">'. (is_rtl() ? "&#8592;" : "&#8594") .'</span></a></div></div>';
}

add_filter('the_content_more_link', 'artmag_fm_more_link', 10, 2);

function artmag_pagination_query($query) {
    if($query->is_main_query()) {
        if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
        elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
        else { $paged = 1; }
        $query->set('paged',$paged);
    }
}
add_action( 'pre_get_posts', 'artmag_pagination_query' );

/**************************************************************************************************/
/* Walker Menu Nav */
/**************************************************************************************************/


class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) 
      {
           global $wp_query;
           global $class;

           $class_names = $value = $varpost =  '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
          

           $output .=  '<li id="menu-item-'. $item->ID . '" class="'.$class_names .'">';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
     
            $attributes .= ' href="' . $item->url . '"';
          
            $item_output = $args->before;
            $item_output .= '<a'. $attributes . '>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
            


            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

            }
}

/**************************************************************************************************/
/* Custom Excerpt */
// Source Url :  http://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
/**************************************************************************************************/

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/************************************************************************
* Demo Data
*************************************************************************/
if ( !function_exists( 'artmag_wbc_extended_example' ) ) {
    function artmag_wbc_extended_example( $demo_active_import , $demo_directory_path ) {

        reset( $demo_active_import );
        $current_key = key( $demo_active_import );

        $wbc_home_pages = array(
            'ARTMAG' => 'ARTMAG',
        );

        if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
            $page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );
            }
        }

    }

    add_action( 'wbc_importer_after_content_import', 'artmag_wbc_extended_example', 10, 2 );
}










/**
 * Add the field to the checkout
 **/
add_action( 'woocommerce_after_order_notes', 'wordimpress_custom_checkout_field' );
 
function wordimpress_custom_checkout_field( $checkout ) {
 
 //Check if Book in Cart (UPDATE WITH YOUR PRODUCT ID)
 $book_in_cart = wordimpress_is_conditional_product_in_cart( array(8540,9118) );
 
 //Book is in cart so show additional fields
 if ( $book_in_cart === true ) {
 echo '<div id="my_custom_checkout_field"><h3>' . __( 'New Orleans Terms & Info' ) . '</h3><p style="margin: 0 0 8px;">Do you agree to the <a href="https://www.dropbox.com/s/czc6dcpcb65y2ws/2017%20Being%20Boss%20NOLA%20Waiver%20and%20Indemnification%20Agreement.pdf?dl=0" target="_blank" style="color: #63ceca;">terms and conditions</a> for the NOLA vacation?</p>';
 
 woocommerce_form_field( 'inscription_checkbox', array(
 'required' => true,
 'type'  => 'checkbox',
 'class' => array( 'inscription-checkbox form-row-wide' ),
 'label' => __( 'Yes, I agree.' ),
 ), $checkout->get_value( 'inscription_checkbox' ) );

woocommerce_form_field( 'inscription_textbox', array(
'required' => true,
 'type'  => 'text',
 'class' => array( 'inscription-text form-row-wide' ),
 'label' => __( 'Do you have any food allergies? If so, please list them here. Otherwise, simply put no.' ),
 ), $checkout->get_value( 'inscription_textbox' ) );
 
 echo '</div>';
 }
 
}
 
/**
 * Check if Conditional Product is In cart
 *
 * @param $product_id
 *
 * @return bool
 */
function wordimpress_is_conditional_product_in_cart( $product_id ) {
 //Check to see if user has product in cart
 global $woocommerce;
 
 //flag no book in cart
 $book_in_cart = false;
 
 foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
 $_product = $values['data'];
 
 if ( in_array($_product->id, $product_id) ) {
 //book is in cart!
 $book_in_cart = true;
 
 }
 }
 
 return $book_in_cart;
 
}


/**
 * Update the order meta with field value
 **/
add_action( 'woocommerce_checkout_update_order_meta', 'wordimpress_custom_checkout_field_update_order_meta' );
 
function wordimpress_custom_checkout_field_update_order_meta( $order_id ) {
 
 //check if $_POST has our custom fields
 if ( $_POST['inscription_checkbox'] ) {
 //It does: update post meta for this order
 update_post_meta( $order_id, 'NOLA Terms', esc_attr( $_POST['inscription_checkbox'] ) );
 }
 if ( $_POST['inscription_textbox'] ) {
 update_post_meta( $order_id, 'Allergy Information', esc_attr( $_POST['inscription_textbox'] ) );
 }
}




/**
 * Add the field to order emails
 **/
add_filter( 'woocommerce_email_order_meta_keys', 'wordimpress_checkout_field_order_meta_keys' );
 
function wordimpress_checkout_field_order_meta_keys( $keys ) {
 
 $keys[] = 'inscription_checkbox';
 $keys[] = 'inscription_textbox';
 
 return $keys;
}





/**
* Process the checkout
*/

add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {

   $nola_in_cart = wordimpress_is_conditional_product_in_cart( array(8540,9118) );

if ( $nola_in_cart === true ) {

   // Check if set, if its not set add an error.

   if ( ! $_POST['inscription_checkbox'] )
       wc_add_notice( __( 'Please read the terms and conditions and check the box.' ), 'error' );
   if ( ! $_POST['inscription_textbox'] )
       wc_add_notice( __( 'Please fill out the Food Allergies field. Put "none" if you have none.' ), 'error' );

}
}









?>
