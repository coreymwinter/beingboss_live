<?php 

function getPostViewsShortcode($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
        
            if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }   
    return $count.' Views'; 
}

/*-----------------------------------------------------------------------------------*/
/*   Newsletter 
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_newsletter')) {
    function t_newsletter($atts, $content = null) {
        $args = array(
            "newsletter_subtitle"          => "SUBSCRIBE OUR NEWSLETTER",
            "newsletter_placeholder"          => "ENTER YOUR MAIL ADDRESS HERE",
            "newsletter_submit_text"          => "Submit",
            "newsletter_source_url"          => "//2035themes.us10.list-manage.com/subscribe/post?u=4745a61fa64bbaaa93263f2b8&amp;id=951c4ebba6",
        );

        extract(shortcode_atts($args, $atts));
        
        $output = "";

        $output .='<div class="newsletter-form clearfix">';
        $output .='    <div id="mc_embed_signup">';
        $output .='    <form action="'.$newsletter_source_url.'" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>';
        $output .='        <div id="mc_embed_signup_scroll" class="clearfix">';
        $output .='            <div class="mc-field-group newsletter-left">';
        $output .='                <h6><label>'.$newsletter_subtitle.'</label></h6>';
        $output .='                <input type="email" value="" name="EMAIL" placeholder="'.$newsletter_placeholder.'" class="required email" id="mce-EMAIL">';
        $output .='            </div>';
        $output .='            <div id="mce-responses" class="clear">';
        $output .='                <div class="response" id="mce-error-response" style="display:none"></div>';
        $output .='                <div class="response" id="mce-success-response" style="display:none"></div>';
        $output .='            </div>';
        $output .='            <div class="mailchimp-rtl" style="position: absolute; left: -5000px;"><input type="text" name="b_4745a61fa64bbaaa93263f2b8_f9bf057104" tabindex="-1" value=""></div>';
        $output .='            <div class="newsletter-right"><input type="submit" value="'.$newsletter_submit_text.' '. (is_rtl() ? "&#8592;" : "&#8594") .'" name="subscribe" id="mc-embedded-subscribe" class="button"></div>';
        $output .='        </div>';
        $output .='    </form>';
        $output .='    </div>';
        $output .='</div>';


        return $output;

    }
}
add_shortcode('t_newsletter', 't_newsletter');



/*-----------------------------------------------------------------------------------*/
/*   Image 
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_image')) {
    function t_image($atts, $content = null) {
        $args = array(
            "image_p_column"          => "1",
            "image_p_post_count"          => "1",
            "image_p_show_title"          => "no",
            "image_p_title"          => "LATEST POST",
            "image_p_title_seperator"          => "top-line",
            "image_p_news_link"          => "",
            "image_p_news_link_position"          => "right",
            "image_p_news_link_url"          => "",
            "image_p_news_link_text"          => "Read More",
            "image_p_order_by"          => "",
            "image_p_sorting"          => "",
            "image_p_author_v"          => "",
            "image_p_date_v"          => "",
            "image_p_show_share"          => "",
            "image_p_show_postview"      => "",
            "image_p_cat_list"          => "",
            "image_p_post_format"          => "",
            "image_p_must_read"          => "",
            "image_p_show_cat"          => "",
            "image_p_show_content"          => "",
            "image_p_badge_text"          => "",
            "image_p_excerpt_value"          => "",
        );


        extract(shortcode_atts($args, $atts));

            if($image_p_post_format == "all" && $image_p_must_read == "no"){
                $argswp = array( 
                    'post_type'       =>   "post",
                    'posts_per_page'  =>   $image_p_post_count,
                    'post_status'     =>   "publish",
                    'meta_key'        =>   'post_views_count',
                    'orderby'         =>   $image_p_order_by,
                    'order'           =>   $image_p_sorting,
                    'category_name'   =>   $image_p_cat_list,
                    'ignore_sticky_posts'=> 1,

                );
            }elseif($image_p_post_format != "all" && $image_p_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $image_p_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $image_p_order_by,
                'order'           =>   $image_p_sorting,
                'category_name'   =>   $image_p_cat_list,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$image_p_post_format,
                    'operator' => 'IN'
                    )),
                );
            }elseif($image_p_post_format == "all" && $image_p_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $image_p_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $image_p_order_by,
                'order'           =>   $image_p_sorting,
                'category_name'   =>   $image_p_cat_list,
                'ignore_sticky_posts'=> 1,
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }elseif($image_p_post_format != "all" && $image_p_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $image_p_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $image_p_order_by,
                'order'           =>   $image_p_sorting,
                'category_name'   =>   $image_p_cat_list,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$image_p_post_format,
                    'operator' => 'IN'
                    )),
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }else{
                $argswp = array( 
                    'post_type'       =>   "post",
                    'category_name'   =>   $image_p_cat_list,
                    'posts_per_page'  =>   $image_p_post_count,
                    'post_status'     =>   "publish",
                    'meta_key'        =>   'post_views_count',
                    'orderby'         =>   $image_p_order_by,
                    'order'           =>   $image_p_sorting,
                    'ignore_sticky_posts'=> 1,
                    
                );
            }


        $output = '';


        $output .="<div class='image-background-post-container marginb60'>";
  


        if($image_p_show_title == "yes" ){  
            if($image_p_title_seperator != "two-line"){
            $output .="<div class='big-title clearfix ".$image_p_title_seperator."'>
            <h1>".esc_attr($image_p_title)."</h1>
            <span class='line-title'></span>";

            if($image_p_news_link_position == "right" & $image_p_news_link != "no"){
                $output .="<div class='read-more clearfix'><a href='". $image_p_news_link_url ."'> ". $image_p_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>";
            }

            $output .="</div>";
            }else{
            $output .="<div class='title ".$image_p_title_seperator."'>  <h6><span class='title-text'>".esc_attr($image_p_title)."</span></h6> </div>";
            }
        } 

        $col = 12;
        $colsm = 12;

        if($image_p_column != 1){
        $output .="<div class='row'>";
        }

        if($image_p_column == 2){ $col = 6; $colsm = 6;  }
        if($image_p_column == 3){ $col = 4; $colsm = 4;  }
        if($image_p_column == 4){ $col = 3; $colsm = 6;  }

        $the_query = new WP_Query($argswp);

        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post(); 


        global $post;

        if(!has_post_thumbnail(get_the_id())){
                global $artmag_opt;
                $no_image = $artmag_opt['post-no-image']['id'];
                $image = wp_get_attachment_image_src( $no_image, "artmag-full");
                $image = $image[0]; 
        }else{
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "artmag-full" );
                $image = $image[0]; 
        }


        if($image_p_column != 1){
        $output .="<div class='col-lg-". $col ." col-sm-". $colsm ."'>"; 
        }

        $output .="<div class='blog-entry image-background-post clearfix' style='background: url(".esc_url($image).") center center; background-size:cover;'>";
        $output .="    <article class='".join( ' ', get_post_class('clearfix') )."' id='post-".get_the_ID()."'>";
      

       

        $padding_none = "";
        $post_format = get_post_format( $post->ID );
        
        

        $blog_slides = get_post_meta( get_the_ID( ), 'artmag_fm_galleryslides', false ); 
        if ( !is_array( $blog_slides ) )
            $blog_slides = ( array ) $blog_slides;
      
            


        if($image_p_badge_text != "" ){
        $output .="                 <div class='image-post-badge'><h6>";
        $output .=                  $image_p_badge_text;
        $output .="                 </h6></div>";
        }





        
        $output .="            <div class='index-post-content ".$padding_none."'>";
        $output .="                <div class='blog-entry-title'>";
        
        if($image_p_show_cat != "hide" ) {

        $categories = get_the_category();
        if($categories){
        foreach($categories as $category) {  
        
        $output .="                     <div class='mini-post-cat active-color'><h6><a href='".get_category_link( $category->term_id )."'>".$category->cat_name."</a></h6></div>";
        }
        }

        }


        $output .="                 <div class='clearfix row'>";

        if($image_p_post_format == "show"){

        $output .="                 <div class='pull-left col-lg-2 image-post-media'>";
    

                  

                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            if($post_format != "" && $post_format != "gallery"){

        $output .="                         <div class='image-post-format'><i class='iconmag iconmag-".$post_format_icon."'></i></div>"; 
        
        }


        $output .="                 </div>";
  
        }


        if($post_format != "" & $image_p_post_format == "show" ){
        $output .="                         <div class='pull-left col-lg-10'>";     
        }else{
        $output .="                         <div class='pull-left col-lg-12'>";     
        }


        $title = get_the_title();

        $output .="                         <h2><a href='".get_the_permalink()."'>";
       
        if($title != "" ) { 
        $output .=                              esc_attr($title); 
        }  
        else { 
        $output .=                              esc_attr($post_date = get_the_time('F j')); 
        }  

        $output .="                         </a></h2>";
        if($image_p_author_v != "hide" || $image_p_date_v != "hide" || $image_p_show_share != "hide"){
        $output .="                         <div class='post-element margint5 clearfix'>";
        $output .="                         <ul>";
        
        if (is_sticky()) { 
        $output .="                             <li>".__('STICKY','artmag')."</li>";
        }
        
        $username = get_userdata( $post->post_author );

        if($image_p_author_v != "hide"){
        $output .="                             <li><span class='author-by'>".__('by','artmag')." </span><a href='".get_author_posts_url( $post->post_author )."'>".$username->display_name."</a></li>";
        }

        if($image_p_date_v != "hide"){
        $output .="                             <li><a title='".$post_date = get_the_time('F j, Y g:i')."' href='".get_the_permalink()."' class='date'>".esc_attr($post_date = get_the_time('j F'))."</a></li>";
        }

        if($image_p_show_postview != "hide"){
        $output .="                             <li><span class='vieweye'><i class='iconmag iconmag-eye'></i></span>". getPostViewsShortcode($post->ID) ."</li>";
        }


        if($image_p_show_share != "hide"){ 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' );
        $output .='<li class="share-but"><a href="#"><i class="iconmag iconmag-share"></i>'.__("SHARE","artmag").'</a>
                    <div class="share-box">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u='. get_the_permalink() .'"><i class="iconmag iconmag-facebook"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/share?url='. get_the_permalink() .'&text='. str_replace(' ', '%20', get_the_title()) .'"><i class="iconmag iconmag-twitter"></i> Twitter</a></li>
                            <li><a href="http://pinterest.com/pin/create/button/?url='. get_the_permalink() .'&media='. esc_attr($src[0]) .'"><i class="iconmag iconmag-pinterest"></i> Pinterest</a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink() .'&title='. str_replace(' ', '%20', get_the_title()) .'&summary=&source="><i class="iconmag iconmag-linkedin"></i> <span>Linkedin</span></a></li>
                        </ul>
                    </div>          
        </li>';
        }
        $output .="                         </ul>";
        $output .="                     </div>";

        }


       $output .="                     </div>";
       $output .="                     </div>";





             if($image_p_show_content == "show"){
        $output .="                 <div class='margint10 clearfix'>";
        
        
        if($image_p_excerpt_value == "" ){ $image_p_excerpt_value = 28; }

        $content_length = strlen(strip_tags(get_the_content()));  
        if($image_p_show_content == "show"){
    
        $output .=                  excerpt($image_p_excerpt_value);
        if($content_length >= 180){

        $output .="..";
        }
        
        }
        $output .="           </div>";

        }


    

        $output .="           </div>";

        $output .="         </div>";
      
        $output .= "</article>";
        $output .="         </div>";

         if($image_p_column != 1){ $output .="     </div>"; }
        endwhile; else : 
        
        $output .=  __('Not Post Found!','artmag');
        endif; 
        wp_reset_postdata();
        if($image_p_column != 1){
        $output .="         </div>";
        }

        if($image_p_news_link_position == "bottom" & $image_p_news_link != "no" ){
                $output .="<div class='bottom-read-more'><div class='read-more  button clearfix'><a href='". $image_p_news_link_url ."'> ". $image_p_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div></div>";
            }

        $output .="         </div>";

        return $output;

    }
}
add_shortcode('t_image', 't_image');



/*-----------------------------------------------------------------------------------*/
/*   Feature Post + Right Thumbnails
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_one_big_right')) {
    function t_one_big_right($atts, $content = null) {
        $args = array(
            "one_br_featured_post"  => "",
            "one_br_thumb_post_limit"  => "",
            "one_br_cat"  => "",
            "one_br_post_format"  => "",
            "one_br_must_read"  => "",
            "one_br_show_content"  => "",
            "one_br_show_title"  => "",
            "one_br_title"  => "",
            "one_br_title_seperator"  => "",
            "one_br_news_link" => "yes",
            "one_br_news_link_position"  => "",
            "one_br_news_link_url"  => "",
            "one_br_news_link_text"  => "",
            "one_br_order_by"  => "",
            "one_br_sorting"  => "",
            "one_br_author_v"  => "",
            "one_br_date_v"  => "",
            "one_br_share_v"  => "",
            "one_br_postview_v"  => "",
            "one_br_cat_v"  => "",
            "one_br_excerpt_value"  => "19",
            "one_br_pattern_seperator"  => "",
        );

        extract(shortcode_atts($args, $atts));

        if($one_br_thumb_post_limit == ""){  $one_br_thumb_post_limit = 4; }

        $one_br_thumb_post_limit = $one_br_thumb_post_limit+1;

            if($one_br_post_format == "all" && $one_br_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_br_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_br_order_by,
                'order'           =>   $one_br_sorting,
                'category_name'   =>   $one_br_cat,
                'ignore_sticky_posts'=> 1,
                );
            }elseif($one_br_post_format != "all" && $one_br_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_br_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_br_order_by,
                'order'           =>   $one_br_sorting,
                'category_name'   =>   $one_br_cat,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$one_br_post_format,
                    'operator' => 'IN'
                    )),
                );
            }elseif($one_br_post_format == "all" && $one_br_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_br_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_br_order_by,
                'order'           =>   $one_br_sorting,
                'category_name'   =>   $one_br_cat,
                'ignore_sticky_posts'=> 1,
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }elseif($one_br_post_format != "all" && $one_br_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_br_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_br_order_by,
                'order'           =>   $one_br_sorting,
                'category_name'   =>   $one_br_cat,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$one_br_post_format,
                    'operator' => 'IN'
                    )),
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }else{
                $argswp = array( 
                    'post_type'       =>   "post",
                    'category_name'   =>   $one_br_cat,
                    'posts_per_page'  =>   $one_br_thumb_post_limit,
                    'post_status'     =>   "publish",
                    'meta_key'        =>   'post_views_count',
                    'orderby'         =>   $one_br_order_by,
                    'order'           =>   $one_br_sorting,
                    'ignore_sticky_posts'=> 1,
                    
                );
            }

        $output = $img_size = $one_br_excerpt = '';


        if($one_br_featured_post == ""){  $one_br_featured_post = "show"; }
        if($one_br_news_link_text == ""){  $one_br_news_link_text = "All News "; }
        if($one_br_title_seperator == ""){ $one_br_title_seperator = "top-line"; }
        if($one_br_news_link_position == ""){ $one_br_news_link_position = "right"; }


        $output .="<div class='big-feature-right-thumbnail marginb60 clearfix'>";


        if($one_br_pattern_seperator == "show" ){
        $output .="<div class='pattern-seperator marginb60 clearfix'></div>";
        }


        if($one_br_show_title != "no" ){
            if($one_br_title == "" ) { $one_br_title = __("LATEST POST","artmag"); }
            if($one_br_title_seperator != "two-line"){
            $output .="<div class='big-title clearfix ".$one_br_title_seperator."'>
            <h1>".esc_attr($one_br_title)."</h1>
            <span class='line-title'></span>";
            
            if($one_br_news_link_position == "right" & $one_br_news_link == "yes"){
                $output .="<div class='read-more clearfix'><a href='". $one_br_news_link_url ."'> ". $one_br_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>";
            }

            $output .="</div>";
            }else{
            $output .="<div class='title ".$one_br_title_seperator."'>  <h6><span class='title-text'>".esc_attr($one_br_title)."</span></h6> </div>";
            }
        } 


        $output .="<ul class='big-featured-right clearfix'>";
        $the_query = new WP_Query($argswp);
        if ($the_query->have_posts()) : $postCount = 1; while ($the_query->have_posts()) : $postCount++; $the_query->the_post(); 


        global $post;

        $padding_none = "";
        $post_format = get_post_format( $post->ID );
        

  
            


        $output .="                 <li class='big-featured-right clearfix'>";
        $output .="                     <div class='index-post-media'>";

if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        if($postCount == 2) {
            $img_size = "artmag-slider";
        }else{
            $img_size = "artmag-five-grid";
        }
        $image = wp_get_attachment_image_src( $no_image, $img_size);
        $image = $image[0]; 
}else{
        if($postCount == 2) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "artmag-slider" );
        }
        else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "artmag-five-grid" );
        }
        $image = $image[0]; 
}

        $output .="                         <div class='media-materials marginb10 clearfix'>";


        
         
        $output .="                         <a href='".get_the_permalink()."'><img alt='' class='img-responsive rsp-img-center' src='".esc_attr($image)."'></a>";                    



        if($postCount == 2) {

                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            if($post_format == "gallery"){ $post_format_icon = "post-format-gallery"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            if($post_format != ""){

        $output .="                         <div class='post-format-icon'><i class='iconmag iconmag-".$post_format_icon."'></i></div>"; 
        
        }


        }




        $output .="                     </div>";


            
        $output .="                <div class='blog-entry-title'>";
        if($one_br_cat_v == "show"  || $postCount == 2){

        $categories = get_the_category();
        if($categories){
        foreach($categories as $category) {  
        
        $output .="                     <div class='mini-post-cat active-color'><h6><a href='".get_category_link( $category->term_id )."'>".$category->cat_name."</a></h6></div>";
        }
        }

        }

        $title = get_the_title();
        $output .="                         <h5><a href='".get_the_permalink()."'>";
       
        if($title != "" ) { 
        $output .=                              esc_attr($title); 
        }  
        else { 
        $output .=                              esc_attr($post_date = get_the_time('F j')); 
        }  

        $output .="                         </a></h5>";

        if($postCount == 2){
        $output .="                         <div class='post-element margint10 clearfix'>";
        }else{
        $output .="                         <div class='post-element clearfix'>";
        }
        $output .="                         <ul>";
        
        if (is_sticky()) { 
        $output .="                             <li>".__('STICKY','artmag')."</li>";
        }
        
        $username = get_userdata( $post->post_author );

      

        if($one_br_author_v != "hide" || $postCount == 2){    
        $output .="                             <li class='author'><span class='author-by'>".__('by','artmag')." </span><a href='".get_author_posts_url( $post->post_author )."'>".$username->display_name."</a></li>";
        }
        if($one_br_date_v != "hide" || $postCount == 2){ 
        $output .="                             <li class='date'><a title='".$post_date = get_the_time('F j, Y g:i')."' href='".get_the_permalink()."' class='date'>".esc_attr($post_date = get_the_time('j F'))."</a></li>";
        }
        if($one_br_postview_v == "show"){
        $output .="                             <li><span class='vieweye'><i class='iconmag iconmag-eye'></i></span>". getPostViewsShortcode($post->ID) ."</li>";
        }
        if($one_br_share_v == "show" || $postCount == 2){
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' );
        $output .='<li class="share-but"><a href="#"><i class="iconmag iconmag-share"></i>'.__("SHARE","artmag").'</a>
                    <div class="share-box">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u='. get_the_permalink() .'"><i class="iconmag iconmag-facebook"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/share?url='. get_the_permalink() .'&text='. str_replace(' ', '%20', get_the_title()) .'"><i class="iconmag iconmag-twitter"></i> Twitter</a></li>
                            <li><a href="http://pinterest.com/pin/create/button/?url='. get_the_permalink() .'&media='. esc_attr($src[0]) .'"><i class="iconmag iconmag-pinterest"></i> Pinterest</a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink() .'&title='. str_replace(' ', '%20', get_the_title()) .'&summary=&source="><i class="iconmag iconmag-linkedin"></i> <span>Linkedin</span></a></li>
                        </ul>
                    </div>          
        </li>';
        }

  




        $output .="                         </ul>";
        $output .="                     </div>";

        $output .="                 <div class='content-text clearfix'>";
        

        if($one_br_show_content == "show" || $postCount == 2){



        if($postCount == 2) {
        $one_br_excerpt = 130;
        }
        else{
         $one_br_excerpt = $one_br_excerpt_value;  
        }


        $content_length = strlen(strip_tags(get_the_content())); 
        $output .=                  excerpt($one_br_excerpt);
  
         if($content_length >= 180){
        $output .="..";
        }


        $output .="           </div>";



        }else{
            $output .="           </div>";
        }

        if($postCount == 2) {
        $output .="           <div class='read-more button clearfix margint30'><a href='".get_the_permalink()."'>".__('Read More ','artmag')."<span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>"; 
        }


        $output .="           </div>";
        $output .="     </div>";
        $output .="     </li>";
        


        endwhile; else : 
        
        $output .=  __('Not Post Found!','artmag');
        endif; 
        wp_reset_postdata();
                
        $output .="     </ul>";

        if($one_br_news_link_position == "bottom"){
                $output .="<div class='bottom-read-more'><div class='read-more  button clearfix'><a href='". $one_br_news_link_url ."'> ". $one_br_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div></div>";
            }

        if($one_br_pattern_seperator == "show" ){
        $output .="<div class='pattern-seperator margint60 clearfix'></div>";
        }



        $output .="     </div>";


        return $output;

    }
}
add_shortcode('t_one_big_right', 't_one_big_right');

/*-----------------------------------------------------------------------------------*/
/*   Slider
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_slider')) {
    function t_slider($atts, $content = null) {
        $args = array(
            "slider_height"          => "artmag-slider",
            "slider_title"          => "",
            "slider_title_seperator" => "",
            "slider_post_limit"     => "",
            "slider_cat_list"       => "",
            "slider_cat_lists"      => "",
            "slider_post_format"    => "",
            "slider_must_read"    => "",
        );

        extract(shortcode_atts($args, $atts));
            
            $output = "";

            if($slider_title_seperator == ""){ $slider_title_seperator = "top-line"; }
            
            

            if($slider_title != "" ){  
                if($slider_title_seperator != "two-line"){
                $output .="<div class='big-title clearfix ".$slider_title_seperator."'>
                <h1>".esc_attr($slider_title)."</h1>
                <span class='line-title'></span>";
                $output .="</div>";
                }else{
                $output .="<div class='title ".$slider_title_seperator."'>  <h6><span class='title-text'>".esc_attr($slider_title)."</span></h6> </div>";
                }

            } 
                    $output .= '<div id="owl-sli" class="owl-carousel owl-short vertical-slider marginb50">';
                    


                    global $post;

                if($slider_post_limit == ""){  $slider_post_limit = "3"; }

                    if($slider_post_format == "all" && $slider_must_read == "no"){
                        $args = array (
                        'post_type'       =>   "post",
                        'posts_per_page'  =>   $slider_post_limit,
                        'post_status'     =>   "publish",
                        'order'           => 'DESC',
                        'orderby'         => 'date',
                        'category_name'   =>   $slider_cat_list,
                        'ignore_sticky_posts'=> 1,
                        );
                    }elseif($slider_post_format != "all" && $slider_must_read == "no"){
                        $args = array (
                        'post_type'       =>   "post",
                        'posts_per_page'  =>   $slider_post_limit,
                        'post_status'     =>   "publish",
                        'order'           => 'DESC',
                        'orderby'         => 'date',
                        'category_name'   =>   $slider_cat_list,
                        'ignore_sticky_posts'=> 1,
                        'tax_query' => array( array(
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => 'post-format-'.$slider_post_format,
                            'operator' => 'IN'
                            )),
                        );
                    }elseif($slider_post_format == "all" && $slider_must_read == "yes"){
                        $args = array (
                        'post_type'       =>   "post",
                        'posts_per_page'  =>   $slider_post_limit,
                        'post_status'     =>   "publish",
                        'order'           => 'DESC',
                        'orderby'         => 'date',
                        'category_name'   =>   $slider_cat_list,
                        'ignore_sticky_posts'=> 1,
                        'meta_query'  => array( array(
                            'key' => 'artmag_fm_must_read',
                            'value' => 'yes',
                            'compare' => '='
                            ))
                        );
                    }elseif($slider_post_format != "all" && $slider_must_read == "yes"){
                        $args = array (
                        'post_type'       =>   "post",
                        'posts_per_page'  =>   $slider_post_limit,
                        'post_status'     =>   "publish",
                        'order'           => 'DESC',
                        'orderby'         => 'date',
                        'category_name'   =>   $slider_cat_list,
                        'ignore_sticky_posts'=> 1,
                        'tax_query' => array( array(
                            'taxonomy' => 'post_format',
                            'field' => 'slug',
                            'terms' => 'post-format-'.$slider_post_format,
                            'operator' => 'IN'
                            )),
                        'meta_query'  => array( array(
                            'key' => 'artmag_fm_must_read',
                            'value' => 'yes',
                            'compare' => '='
                            ))
                        );
                    }else{
                        $args = array (
                            'post_type'       =>   "post",
                            'category_name'   =>   $slider_cat_list,
                            'posts_per_page'  =>   $slider_post_limit,
                            'post_status'     =>   "publish",
                            'order'           => 'DESC',
                            'orderby'         => 'date',
                            'ignore_sticky_posts'=> 1,
                            
                        );
                    }

                    // The Query
                    $query = new WP_Query( $args );

                    // The Loop
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        $query->the_post();

                        $image = "";
                        if (has_post_thumbnail( $post->ID ) ):

                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $slider_height );
                        $image = $image[0];
                        endif;
                        if($image == ""){
                            $image = IMAGES."/slider-no-image-1.jpg";
                        }
                   
                    $output .= '<div class="item">';
                    $output .= '    <img alt="" class="img-responsive" src="'.esc_attr($image).'" />';
                    $output .= '    <div class="slider-content vertical-slider-middle slider-box">';
                    $output .= '        <div class="post-categories clearfix">';
                    $output .= '            <ul class="clearfix active-color">';
                      

                  $categories = get_the_category();
                    if($categories){
                    foreach($categories as $category) {  
                    
                        $output .= '                <li><h6><a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a></h6></li>';
                    }
                    }


                    $output .= '            </ul>';
                    $output .= '        </div>';

                    $title_length = strlen(get_the_title());

                    $output .= '        <div class="slider-title"><h2><a href="'. get_the_permalink() .'">';

                    if($title_length <=36){
                    $output .=              get_the_title(); 
                    }else{ 
                    $output .=              mb_substr(get_the_title(),0,34,'UTF-8')."..";
                    }

                    $output .= '            </a></h2>
                                        </div>';
                    $output .= '        <div class="post-element clearfix">';
                    $output .= '            <ul>';
                    

                    $username = get_userdata( $post->post_author );

                    $output .="                 <li><span class='author-by'>".__('by','artmag')." </span><a href='".get_author_posts_url( $post->post_author )."'>".$username->display_name."</a></li>";
                    $output .= '                <li><a title="'.$post_date = get_the_time('F j, Y g:i').'" href="' . get_the_permalink() . '" class="date">'. esc_attr($post_date = get_the_time('j F')) .'</a></li>';
                    $output .= '            </ul>';
                    $output .= '        </div>';
                    $output .= '        <div class="slider-post-text margint10 clearfix"><p>'. excerpt(21) .'</p></div>';
                    $output .= '        <div class="read-more"><a href="' . get_the_permalink() . '">'. __("Read More ","artmag") .'<span class="arrow-right">'. (is_rtl() ? "&#8592;" : "&#8594") .'</span></a></div>';
                    $output .= '    </div>';
                    $output .= '</div>';
                  
                    }
                    }
               

            $output .= '</div>';


                // Restore original Post Data
                wp_reset_postdata();



        return $output;

    }
}
add_shortcode('t_slider', 't_slider');


/*-----------------------------------------------------------------------------------*/
/*   Feature Post + Bottom Thumbnails
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_one_big_bottom')) {
    function t_one_big_bottom($atts, $content = null) {
        $args = array(
            "one_bb_featured_post"  => "",
            "one_bb_thumb_post_limit"  => "",
            "one_bb_cat"  => "",
            "one_bb_post_format"  => "",
            "one_bb_must_read"  => "",
            "one_bb_author_v"  => "",
            "one_bb_date_v"  => "",
            "one_bb_share_v"  => "",
            "one_bb_postview_v"  => "",
            "one_bb_cat_v"  => "",
            "one_bb_show_content"  => "",
            "one_bb_excerpt_value"  => "",
            "one_bb_show_title"  => "",
            "one_bb_title"  => "",
            "one_bb_title_seperator"  => "",
            "one_bb_news_link"  => "yes",
            "one_bb_news_link_position"  => "",
            "one_bb_news_link_url"  => "",
            "one_bb_news_link_text"  => "",
            "one_bb_order_by"  => "",
            "one_bb_sorting"  => "",
        );

        extract(shortcode_atts($args, $atts));

        if($one_bb_thumb_post_limit == ""){  $one_bb_thumb_post_limit = 4; }


        if($one_bb_featured_post != "hide" ){
        $one_bb_thumb_post_limit = $one_bb_thumb_post_limit+1;
        }else{
        $one_bb_thumb_post_limit = $one_bb_thumb_post_limit;
        }

            if($one_bb_post_format == "all" && $one_bb_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_bb_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_bb_order_by,
                'order'           =>   $one_bb_sorting,
                'category_name'   =>   $one_bb_cat,
                'ignore_sticky_posts'=> 1,
                );
            }elseif($one_bb_post_format != "all" && $one_bb_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_bb_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_bb_order_by,
                'order'           =>   $one_bb_sorting,
                'category_name'   =>   $one_bb_cat,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$one_bb_post_format,
                    'operator' => 'IN'
                    )),
                );
            }elseif($one_bb_post_format == "all" && $one_bb_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_bb_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_bb_order_by,
                'order'           =>   $one_bb_sorting,
                'category_name'   =>   $one_bb_cat,
                'ignore_sticky_posts'=> 1,
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }elseif($one_bb_post_format != "all" && $one_bb_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $one_bb_thumb_post_limit,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $one_bb_order_by,
                'order'           =>   $one_bb_sorting,
                'category_name'   =>   $one_bb_cat,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$one_bb_post_format,
                    'operator' => 'IN'
                    )),
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }else{
                $argswp = array( 
                    'post_type'       =>   "post",
                    'category_name'   =>   $one_bb_cat,
                    'posts_per_page'  =>   $one_bb_thumb_post_limit,
                    'post_status'     =>   "publish",
                    'meta_key'        =>   'post_views_count',
                    'orderby'         =>   $one_bb_order_by,
                    'order'           =>   $one_bb_sorting,
                    'ignore_sticky_posts'=> 1,
                    
                );
            }

        $output = $img_size = '';


        if($one_bb_featured_post == ""){  $one_bb_featured_post = "show"; }
        if($one_bb_news_link_text == ""){  $one_bb_news_link_text = "All News "; }
        if($one_bb_title_seperator == ""){ $one_bb_title_seperator = "top-line"; }
        if($one_bb_news_link_position == ""){ $one_bb_news_link_position = "bottom"; }


        $output .="<div class='big-feature-bottom-thumbnail marginb60'>";

        if($one_bb_show_title != "no" ){  
            if($one_bb_title == "" ) { $one_bb_title = __("LATEST POST","artmag"); }
            if($one_bb_title_seperator != "two-line"){
            $output .="<div class='big-title clearfix ".$one_bb_title_seperator."'>
            <h1>".esc_attr($one_bb_title)."</h1>
            <span class='line-title'></span>";

            if($one_bb_news_link == "yes"){
                if($one_bb_news_link_position == "right"){
                    $output .="<div class='read-more clearfix'><a href='". $one_bb_news_link_url ."'> ". $one_bb_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>";
                }
            }

            $output .="</div>";
            }else{
            $output .="<div class='title ".$one_bb_title_seperator."'>  <h6><span class='title-text'>".esc_attr($one_bb_title)."</span></h6> </div>";
            }
        } 

        if($one_bb_featured_post == "show"){
        $output .="<div class='big-featured'>";
        }
        
        $the_query = new WP_Query($argswp);
            if ($the_query->have_posts()) : $postCount = 1; while ($the_query->have_posts()) : $postCount++; $the_query->the_post(); 


        global $post;

        $padding_none = "";
        $post_format = get_post_format( $post->ID );
        

     
          


        $output .="                 <div class='big-featured-bottom clearfix'>";
        $output .="                     <div class='index-post-media'>";

        $output .="                         <div class='media-materials marginb10 clearfix'>";


if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, "artmag-list-thumbnail");
        $image = $image[0]; 
}else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "artmag-list-thumbnail" );
        $image = $image[0]; 
}       

        $output .="                         <a href='".get_the_permalink()."'><img alt='' class='img-responsive rsp-img-center' src='".esc_attr($image)."'></a>";                    

        if($one_bb_featured_post != "hide" ){
         if($postCount == 2){
                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            if($post_format == "gallery"){ $post_format_icon = "post-format-gallery"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            if($post_format != ""){

        $output .="                         <div class='post-format-icon'><i class='iconmag iconmag-".$post_format_icon."'></i></div>"; 
        
        }

        }
        }


        $output .="                     </div>";

            
        $output .="                <div class='blog-entry-title'>";
        if($one_bb_cat_v == "show" ) {

        $categories = get_the_category();
        if($categories){
        foreach($categories as $category) {  
        
        $output .="                     <div class='mini-post-cat active-color'><h6><a href='".get_category_link( $category->term_id )."'>".$category->cat_name."</a></h6></div>";
        }
        }

        }

        $title = get_the_title();
        $output .="                         <h5><a href='".get_the_permalink()."'>";
       
        if($title != "" ) { 
        $output .=                              esc_attr($title); 
        }  
        else { 
        $output .=                              esc_attr($post_date = get_the_time('F j')); 
        }  

        $output .="                         </a></h5>";
        $output .="                         <div class='post-element margint5 clearfix'>";
        $output .="                         <ul>";
        
        if (is_sticky()) { 
        $output .="                             <li>".__('STICKY','artmag')."</li>";
        }
        
        $username = get_userdata( $post->post_author );

        if($one_bb_author_v != "hide"){
        $output .="                             <li><span class='author-by'>".__('by','artmag')." </span><a href='".get_author_posts_url( $post->post_author )."'>".$username->display_name."</a></li>";
        }
        if($one_bb_date_v == "show"){
        $output .="                             <li><a title='".$post_date = get_the_time('F j, Y g:i')."' href='".get_the_permalink()."' class='date'>".esc_attr($post_date = get_the_time('j F'))."</a></li>";
        }
        if($one_bb_postview_v == "show"){
        $output .="                             <li><span class='vieweye'><i class='iconmag iconmag-eye'></i></span>". getPostViewsShortcode($post->ID) ."</li>";
        }


        if($one_bb_share_v == "show" ){ 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' );
        $output .='<li class="share-but"><a href="#"><i class="iconmag iconmag-share"></i>'.__("SHARE","artmag").'</a>
                    <div class="share-box">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u='. get_the_permalink() .'"><i class="iconmag iconmag-facebook"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/share?url='. get_the_permalink() .'&text='. str_replace(' ', '%20', get_the_title()) .'"><i class="iconmag iconmag-twitter"></i> Twitter</a></li>
                            <li><a href="http://pinterest.com/pin/create/button/?url='. get_the_permalink() .'&media='. esc_attr($src[0]) .'"><i class="iconmag iconmag-pinterest"></i> Pinterest</a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink() .'&title='. str_replace(' ', '%20', get_the_title()) .'&summary=&source="><i class="iconmag iconmag-linkedin"></i> <span>Linkedin</span></a></li>
                        </ul>
                    </div>          
        </li>';
        }
        $output .="                         </ul>";
        $output .="                     </div>";

        $output .="                 <div class='margint10 content-text clearfix'>";
        
        
        if($one_bb_excerpt_value == "" ){ $one_bb_excerpt_value = 19; }

        $content_length = strlen(strip_tags(get_the_content())); 

        
        $output .=                  excerpt($one_bb_excerpt_value);
        if($content_length >= 180){
        $output .="..";
        }

        

        $output .="           </div>";

        $output .="           </div>";
        $output .="     </div>";

        $output .="     </div>";

        endwhile; else : 
        
        $output .=  __('Not Post Found!','artmag');
        endif; 
        wp_reset_postdata();
        if($one_bb_news_link == "yes"){
            if($one_bb_news_link_position == "bottom"){
                $output .="<div class='bottom-read-more'><div class='read-more  button clearfix'><a href='". $one_bb_news_link_url ."'> ". $one_bb_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div></div>";
            }
        }

        if($one_bb_featured_post == "show"){
        $output .="</div>";
        }
        

        $output .="     </div>";


        return $output;

    }
}
add_shortcode('t_one_big_bottom', 't_one_big_bottom');


/*-----------------------------------------------------------------------------------*/
/*   Grid
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_grid_1')) {
    function t_grid_1($atts, $content = null) {
        $args = array(
            "cat_grid_column_size"  => "",
            "cat_centered_post"     => "",
            "cat_list"              => "",
            "post_format"           => "",
            "cat_must_read"         => "no",
            "cat_author_v"          => "",
            "cat_date_v"            => "",
            "cat_share_v"           => "",
            "cat_postview_v"        => "",
            "cat_cat_v"             => "",
            "cat_show_content"      => "",
            "cat_excerpt_value"     => "",
            "cat_show_title"        => "",
            "cat_read_more"         => "",
            "cat_title"             => "",
            "cat_title_seperator"   => "",
            "cat_news_link"         => "yes",
            "cat_news_link_url"         => "",
            "cat_news_link_position"=> "",
            "cat_news_link_text"    => "",
            "cat_post_count"        => "",
            "cat_order_by"          => "",
            "cat_sorting"           => "",
            "cat_pattern_seperator"           => "",
        );

        extract(shortcode_atts($args, $atts));

        if($cat_post_count == ""){  $cat_post_count = "3"; }
            if($post_format == "all" && $cat_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $cat_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $cat_order_by,
                'order'           =>   $cat_sorting,
                'category_name'   =>   $cat_list,
                'ignore_sticky_posts'=> 1,
                );
            }elseif($post_format != "all" && $cat_must_read == "no"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $cat_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $cat_order_by,
                'order'           =>   $cat_sorting,
                'category_name'   =>   $cat_list,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$post_format,
                    'operator' => 'IN'
                    )),
                );
            }elseif($post_format == "all" && $cat_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $cat_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $cat_order_by,
                'order'           =>   $cat_sorting,
                'category_name'   =>   $cat_list,
                'ignore_sticky_posts'=> 1,
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }elseif($post_format != "all" && $cat_must_read == "yes"){
                $argswp = array( 
                'post_type'       =>   "post",
                'posts_per_page'  =>   $cat_post_count,
                'post_status'     =>   "publish",
                'meta_key'        =>   'post_views_count',
                'orderby'         =>   $cat_order_by,
                'order'           =>   $cat_sorting,
                'category_name'   =>   $cat_list,
                'ignore_sticky_posts'=> 1,
                'tax_query' => array( array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-'.$post_format,
                    'operator' => 'IN'
                    )),
                'meta_query'  => array( array(
                    'key' => 'artmag_fm_must_read',
                    'value' => 'yes',
                    'compare' => '='
                    ))
                );
            }else{
                $argswp = array( 
                    'post_type'       =>   "post",
                    'category_name'   =>   $cat_list,
                    'posts_per_page'  =>   $cat_post_count,
                    'post_status'     =>   "publish",
                    'meta_key'        =>   'post_views_count',
                    'orderby'         =>   $cat_order_by,
                    'order'           =>   $cat_sorting,
                    'ignore_sticky_posts'=> 1,
                    
                );
            }

        $output = $col = $img_size = '';


        if($cat_news_link_text == ""){  $cat_news_link_text = "All News "; }
        if($cat_centered_post == "center"){  $cat_centered_post = "pos-center "; }
        if($cat_title_seperator == ""){ $cat_title_seperator = "top-line"; }
        if($cat_news_link_position == ""){ $cat_news_link_position = "right"; }
        if($cat_grid_column_size == ""){ $cat_grid_column_size = "three-column"; }
        if($cat_grid_column_size == ""){ $cat_grid_column_size = "three-column"; }


        if($cat_grid_column_size == "two-column"){ $col = "col-lg-6 col-sm-6"; $img_size="artmag-two-grid"; }
        else if($cat_grid_column_size == "three-column"){ $col = "col-lg-4 col-sm-4"; $img_size="artmag-list-thumbnail"; }
        if($cat_grid_column_size == "four-column"){ $col = "col-lg-3 col-sm-3"; $img_size="artmag-four-grid"; }
        if($cat_grid_column_size == "five-column"){ $col = "five-column"; $img_size="artmag-five-grid"; }





        $output .="<div class='cat-grid marginb50 clearfix'>";


        if($cat_pattern_seperator == "show" ){
        $output .="<div class='pattern-seperator marginb60 clearfix'></div>";
        }


        if($cat_show_title != "no" ){  
            if($cat_title == "" ) { $cat_title = __("LATEST POST","artmag"); }
            if($cat_title_seperator != "two-line"){
            $output .="<div class='big-title clearfix ".$cat_title_seperator."'>
            <h1>".esc_attr($cat_title)."</h1>
            <span class='line-title'></span>";


            if($cat_news_link_position == "right" & $cat_news_link == "yes"){
                $output .="<div class='read-more clearfix'><a href='". $cat_news_link_url ."'> ". $cat_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>";
            }

            $output .="</div>";
            }else{
            $output .="<div class='title ".$cat_title_seperator."'>  <h6><span class='title-text'>".esc_attr($cat_title)."</span></h6> </div>";
            }

        } 



        if($cat_grid_column_size != "five-column"){ 
            $output .="        <div class='row equal-wrapper'>";
        }else{
            $output .="        <div class='full-div equal-wrapper clearfix'>";
        }

        $the_query = new WP_Query($argswp);
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();


        global $post;

        $padding_none = "";
        $post_format = get_post_format( $post->ID );
        
        

    


        $output .="                 <div class='".$col." cat_grid equal ". $cat_grid_column_size . " ". $cat_centered_post ."'>";
        $output .="                     <div class='index-post-media'>";
        $output .="                         <div class='media-materials marginb10 clearfix'>";

if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, $img_size);
        $image = $image[0];
}else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $img_size );
        $image = $image[0]; 
}
        $output .="                         <a href='".get_the_permalink()."'><img alt='' class='img-responsive rsp-img-center' src='".esc_attr($image)."'></a>";                    

                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            if($post_format == "gallery"){ $post_format_icon = "post-format-gallery"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            if($post_format != ""){

        $output .="                         <div class='post-format-icon'><i class='iconmag iconmag-".$post_format_icon."'></i></div>"; 
        
        }


        $output .="                     </div>";

  
        $output .="                <div class='blog-entry-title margint15'>";
        if($cat_cat_v == "show" ) {

        $categories = get_the_category();
        if($categories){
        foreach($categories as $category) {  
        
        $output .="                     <div class='mini-post-cat margint10 active-color'><h6><a href='".get_category_link( $category->term_id )."'>".$category->cat_name."</a></h6></div>";
        }
        }

        }

        $title = get_the_title();
        $output .="                         <h4><a href='".get_the_permalink()."'>";
       
        if($title != "" ) { 
        $output .=                              esc_attr($title); 
        }  
        else { 
        $output .=                              esc_attr($post_date = get_the_time('F j')); 
        }  

        $output .="                         </a></h4>";
        $output .="                         <div class='post-element margint5 clearfix'>";
        $output .="                         <ul>";
        
        if (is_sticky()) { 
        $output .="                             <li>".__('STICKY','artmag')."</li>";
        }
        
        $username = get_userdata( $post->post_author );

        if($cat_author_v != "hide"){
        $output .="                             <li><span class='author-by'>".__('by','artmag')." </span><a href='".get_author_posts_url( $post->post_author )."'>".$username->display_name."</a></li>";
        }
        if($cat_date_v == "show"){
        $output .="                             <li><a title='".$post_date = get_the_time('F j, Y g:i')."' href='".get_the_permalink()."' class='date'>".esc_attr($post_date = get_the_time('j F'))."</a></li>";
        }

        if($cat_postview_v == "show"){
        $output .="                             <li><span class='vieweye'><i class='iconmag iconmag-eye'></i></span>". getPostViewsShortcode($post->ID) ."</li>";
        }


        if($cat_share_v == "show" ){ 
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' );
        $output .='<li class="share-but"><a href="#"><i class="iconmag iconmag-share"></i>'.__("SHARE","artmag").'</a>
                    <div class="share-box">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u='. get_the_permalink() .'"><i class="iconmag iconmag-facebook"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/share?url='. get_the_permalink() .'&text='. str_replace(' ', '%20', get_the_title()) .'"><i class="iconmag iconmag-twitter"></i> Twitter</a></li>
                            <li><a href="http://pinterest.com/pin/create/button/?url='. get_the_permalink() .'&media='. esc_attr($src[0]) .'"><i class="iconmag iconmag-pinterest"></i> Pinterest</a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink() .'&title='. str_replace(' ', '%20', get_the_title()) .'&summary=&source="><i class="iconmag iconmag-linkedin"></i> <span>Linkedin</span></a></li>
                        </ul>
                    </div>          
        </li>';
        }
        $output .="                         </ul>";
        $output .="                     </div>";



        if($cat_show_content == "show"){
        $output .="                 <div class='margint10 clearfix'>";
        
        
        if($cat_excerpt_value == "" ){ $cat_excerpt_value = 28; }

        $content_length = strlen(strip_tags(get_the_content()));  
        if($cat_show_content == "show"){
        if($cat_show_content == "full-content" ){ 
        $output .=                  get_the_content();
        }else{
        $output .=                  excerpt($cat_excerpt_value);
        if($content_length >= 180){

        $output .="..";
        }
        }
        }
        $output .="           </div>";

        }






        if($cat_read_more == "show" ){
        $output .="           <div class='read-more button clearfix margint30'><a href='".get_the_permalink()."'>".__('Read More ','artmag')."<span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>"; 
        }

        $output .="           </div>";
        $output .="     </div>";

        $output .="     </div>";

        endwhile; else : 
        
        $output .=  __('Not Post Found!','artmag');
        endif; 
        wp_reset_postdata();

        if($cat_news_link_position == "bottom" & $cat_news_link == "yes"){
                $output .="<div class='col-lg-12 bottom-read-more marginb30'><div class='read-more button clearfix'><a href='". $cat_news_link_url ."'> ". $cat_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div></div>";
            }

        $output .="     </div>";




        if($cat_pattern_seperator == "show" ){
        $output .="<div class='pattern-seperator marginb10 margint50'></div>";
        }



        $output .="     </div>";




        return $output;

    }
}
add_shortcode('t_grid_1', 't_grid_1');

/*-----------------------------------------------------------------------------------*/
/*   Recent Post
/*-----------------------------------------------------------------------------------*/

if (!function_exists('t_blog')) {
    function t_blog($atts, $content = null) {
        $args = array(
            "blog_style_show"           => "",
            "blog_centered_post"        => "",
            "blog_recent_pagination"    => "",
            "blog_recent_cat_list"    => "",
            "blog_image_crop"           => "",
            "blog_show_title"           => "",
            "blog_title"                => "LATEST NEWS",
            "blog_title_seperator"      => "",
            "blog_title_news_link"      => "no",
            "blog_title_news_link_url"  => "",
            "blog_title_news_link_text" => "All News",
            "blog_post_count"           => "4",
            "blog_order_by"             => "",
            "blog_sorting"              => "",
            "blog_show_share"           => "",
            "blog_show_postview"        => "hide",
            "blog_show_cat"             => "",
            "blog_show_content"         => "",
            "blog_read_more"            => "",
            "blog_excerpt_value"        => "",
        );

        extract(shortcode_atts($args, $atts));

        ob_start();

        global $artmag_opt;

          $paged="";
          if(get_query_var('page')){$paged = get_query_var('page');}else if(get_query_var('paged')){$paged = get_query_var('paged');}
          $argswp = array( 
            'post_type'       =>   "post",
            'posts_per_page'  =>   $blog_post_count,
            'post_status'     =>   "publish",
            'meta_key'        =>   'post_views_count',
            'orderby'         =>   $blog_order_by, 
            'paged'           =>   $paged,
            'order'           =>   $blog_sorting,
            'category_name'   =>   $blog_recent_cat_list,
            'ignore_sticky_posts'=> 1,
          );

        $output = $blog_style = $heading = '';


        $output .="<div class='recent-post-list-container marginb60 clearfix'>";
        $output .="<div class='recent-post-list'>";

        if($blog_centered_post == "yes"){  $blog_centered_post = "pos-center "; }
        if($blog_style_show == "full"){  $blog_style = "full-entry "; }

        if($blog_title_seperator == ""){ $blog_title_seperator = "two-line"; }


        if($blog_show_title != "no" ){  
            if($blog_title_seperator != "two-line"){
            $output .="<div class='big-title clearfix ".$blog_title_seperator."'>
            <h1>".esc_attr($blog_title)."</h1>
            <span class='line-title'></span>";
            $output .="</div>";
            }else{
            $output .="<div class='title ".$blog_title_seperator."'>  <h6><span class='title-text'>".esc_attr($blog_title)."</span></h6> </div>";
            }
        }
        $the_query = new WP_Query($argswp);
        $max_num = $the_query->max_num_pages;
        if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post();

        $output .="<div class='blog-entry ".$blog_centered_post.$blog_style."'>";
        $output .="    <article class='".join( ' ', get_post_class('clearfix') )."' id='post-".get_the_ID()."'>";
        $output .="        <div class='row'>";

        global $post;

        $padding_none = "";
        $post_format = get_post_format( $post->ID );
        
        

        $blog_slides = get_post_meta( get_the_ID( ), 'artmag_fm_galleryslides', false ); 
        if ( !is_array( $blog_slides ) )
            $blog_slides = ( array ) $blog_slides;
            if(has_post_thumbnail(get_the_id())){
            if($blog_style_show == "full"){ 
        $output .="             <div class='col-lg-12 col-sm-12'>";
        } else { 
        $output .="             <div class='col-lg-6 col-sm-6'>";
        }


        $output .="                 <div class='index-post-media'>";
        $output .="                     <div class='media-materials clearfix'>";


        if($blog_style_show == "full" && $blog_image_crop == "crop"  ){
            $img_size = "artmag-full-crop";
        }

        else if($blog_style_show == "full"){
            $img_size = "artmag-full";
        }

        else if($blog_image_crop == "crop"){
            $img_size = "artmag-list-thumbnail";
        }

        else{
            $img_size = "artmag-list-thumbnail-not-crop";
        }

        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $img_size );
        $image = $image[0]; 
         
        $output .="                         <a href='".get_the_permalink()."'><img alt='' class='img-responsive rsp-img-center' src='".esc_attr($image)."'></a>";                    

                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            else if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            else if($post_format == "gallery"){ $post_format_icon = "post-format-gallery"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            else{$post_format_icon = "post-format-link"; }
                            if($post_format != ""){

        $output .="                         <div class='post-format-icon'><i class='iconmag iconmag-".$post_format_icon."'></i></div>"; 
        
        }


        $output .="                     </div>";
        $output .="                 </div>";
        $output .="           </div>";



        } else if( $post_format == "gallery" &  !empty( $blog_slides ) ){ 

        if($artmag_opt['index-post-type'] == "full" ){
        $output .="           <div class='col-lg-12 col-sm-12'>";
        } else {
        $output .="           <div class='col-lg-6 col-sm-6'>"; 
        }





        $output .="                 <div class='index-post-media'>";
        $output .="                     <div class='media-materials clearfix'>";
        $output .="                         <div id='owl-post-slide' class='owl-carousel slider-index-list'>";
        
        if ( !empty( $blog_slides ) ) {

            foreach ( $blog_slides as $att ) {
                $image_src = wp_get_attachment_image_src( $att, "artmag-full-crop" );
                $image_src = $image_src[0];

        $output .="                             <div class='item'><img alt='' src='".$image_src."' /></div>"; 
       
            } 
        }
         
        $output .="                         </div>";  
        $output .="                     <div class='post-format-icon'><i class='iconmag iconmag-post-format-gallery'></i></div>";    
        $output .="                </div>";
        $output .="           </div>";
        $output .="       </div>";

        } else { 


            if($blog_style_show == "full"){ 
        $output .="             <div class='col-lg-12 col-sm-12'>";
        } else { 
        $output .="             <div class='col-lg-6 col-sm-6'>";
        }


        $output .="                 <div class='index-post-media'>";
        $output .="                     <div class='media-materials clearfix'>";


        if($blog_style_show == "full" & $blog_image_crop == "crop"  ){
            $img_size = "artmag-full-crop";
        }

        else if($blog_style_show == "full"){
            $img_size = "artmag-full";
        }

        else if($blog_image_crop == "crop"){
            $img_size = "artmag-list-thumbnail";
        }

        else{
            $img_size = "artmag-list-thumbnail-not-crop";
        }

        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, $img_size);
        $image = $image[0]; 
         
        $output .="                         <a href='".get_the_permalink()."'><img alt='' class='img-responsive rsp-img-center' src='".esc_attr($image)."'></a>";                    

                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            else if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            else if($post_format == "gallery"){ $post_format_icon = "post-format-gallery"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            else{$post_format_icon = "post-format-link"; }
                            if($post_format != ""){

        $output .="                         <div class='post-format-icon'><i class='iconmag iconmag-".$post_format_icon."'></i></div>"; 
        
        }


        $output .="                     </div>";
        $output .="                 </div>";
        $output .="           </div>";



        }


                if($blog_style_show == "full"){ $padding_none = "padding-none"; }
                if( $blog_style_show == "full"){
        $output .="       <div class='col-lg-12 col-sm-12'>";
        } else {
        $output .="       <div class='col-lg-6 col-sm-6'>";
        }
        
        $output .="            <div class='index-post-content-post ".$padding_none."'>";
        $output .="                <div class='blog-entry-title'>";
        
        if($blog_show_cat != "no" ) {

        $categories = get_the_category();
        if($categories){
        foreach($categories as $category) {  
        
        $output .="                     <div class='mini-post-cat active-color'><h6><a href='".get_category_link( $category->term_id )."'>".$category->cat_name."</a></h6></div>";
        }
        }

        }

        $title = get_the_title();
        $output .="                         <h2><a href='".get_the_permalink()."'>";
       
        if($title != "" ) { 
        $output .=                              esc_attr($title); 
        }  
        else { 
        $output .=                              esc_attr($post_date = get_the_time('F j')); 
        }  

        $output .="                         </a></h2>";
        $output .="                         <div class='post-element margint5 clearfix'>";
        $output .="                         <ul>";
        
        if (is_sticky()) { 
        $output .="                             <li>".__('STICKY','artmag')."</li>";
        }
        
        $username = get_userdata( $post->post_author );

        $output .="                             <li><span class='author-by'>".__('by','artmag')." </span><a href='".get_author_posts_url( $post->post_author )."'>".$username->display_name."</a></li>";
        $output .="                             <li><a title='".$post_date = get_the_time('F j, Y g:i')."' href='".get_the_permalink()."' class='date'>".esc_attr($post_date = get_the_time('j F'))."</a></li>";
        if($blog_show_postview != "hide"){
        $output .="                             <li><span class='vieweye'><i class='iconmag iconmag-eye'></i></span>". getPostViewsShortcode($post->ID) ."</li>";
        }


        if($blog_show_share != "no" ){
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' );
        $output .='<li class="share-but"><a href="#"><i class="iconmag iconmag-share"></i>'.__("SHARE","artmag").'</a>
                    <div class="share-box">
                        <ul>
                            <li><a href="http://www.facebook.com/sharer.php?u='. get_the_permalink() .'"><i class="iconmag iconmag-facebook"></i> Facebook</a></li>
                            <li><a href="https://twitter.com/share?url='. get_the_permalink() .'&text='. str_replace(' ', '%20', get_the_title()) .'"><i class="iconmag iconmag-twitter"></i> Twitter</a></li>
                            <li><a href="http://pinterest.com/pin/create/button/?url='. get_the_permalink() .'&media='. esc_attr($src[0]) .'"><i class="iconmag iconmag-pinterest"></i> Pinterest</a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url='. get_the_permalink() .'&title='. str_replace(' ', '%20', get_the_title()) .'&summary=&source="><i class="iconmag iconmag-linkedin"></i> <span>Linkedin</span></a></li>
                        </ul>
                    </div>          
        </li>';
        }
        $output .="                         </ul>";
        $output .="                     </div>";
        $output .="                 </div>";
        $output .="                 <div class='post-index-text margint15 clearfix'>";
        
        
        if($blog_excerpt_value == "" ){ $blog_excerpt_value = 28; }

        $content_length = strlen(strip_tags(get_the_content()));  
        if($blog_show_content != "no"){
        if($blog_show_content == "full-content" ){ 
        $output .=                  get_the_content();
        }else{
        $output .=                  excerpt($blog_excerpt_value);
        if($content_length >= 180){

        $output .="..";
        }
        }
        }
        $output .="           </div>";

        if($blog_read_more == "yes" ){
        $output .="           <div class='read-more button clearfix margint30'><a href='".get_the_permalink()."'>".__('Read More ','artmag')."<span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div>"; 
        }

        $output .="           </div>";
        $output .="     </div>";
        $output .="     </div>";

        $output .= "</article>";
        $output .="     </div>";
        endwhile; 

        if($blog_recent_pagination == "yes"){
        $output .=     artmag_fm_pagination_shortcode($max_num);
        }
        
        wp_reset_postdata();

        ?>

<?php
        else : 
        $output .=  __('Not Post Found!','artmag');
        endif;

        $output .="     </div>";

        if($blog_title_news_link == "yes"){
                $output .="<div class='margint30 bottom-read-more'><div class='read-more button clearfix'><a href='". $blog_title_news_link_url ."'> ". $blog_title_news_link_text ." <span class='arrow-right'>". (is_rtl() ? '&#8592;' : '&#8594') ."</span></a></div></div>";
            }

        $output .="     </div>";
        $output .=  ob_get_contents();
        ob_end_clean();
        return $output;

    }
}
add_shortcode('t_blog', 't_blog');



?>