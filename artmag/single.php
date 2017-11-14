<?php get_header(); 
global $artmag_opt; 
if( have_posts() ) the_post(); 
$temp_post = get_post_meta( get_the_ID(), 'artmag_fm_selectpostsidebar', true );
if($temp_post == ""){
    $temp_post = esc_attr($artmag_opt['blog_sidebar']);
}
$temp_default = esc_attr($artmag_opt['blog_sidebar']);
if($temp_post == $temp_default){
    $blog_post_sidebar = $temp_default;
}else{
    $blog_post_sidebar = $temp_post;
}

$temp_feat = get_post_meta( get_the_ID(), 'artmag_fm_blogfeaturedimage', true );
if($temp_feat == ""){
    $temp_feat = esc_attr($artmag_opt['blog_featured_image']);
}
$temp_default_feat = esc_attr($artmag_opt['blog_featured_image']);
if($temp_feat == $temp_default_feat){
    $feat_image_style = $temp_default_feat;
}else{
    $feat_image_style = $temp_feat;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
setPostViews(get_the_ID());
function getPostViewsSingle($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
        
            if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }   
    return $count.' Views'; 
}
$postView = getPostViewsSingle(get_the_ID());
?>
<div class="stick-header-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 stickprev">
            <?php
            $next_post = get_next_post();
            if (!empty( $next_post )): 
                $next_title = strlen($next_post->post_title);
            if(is_rtl()){
            ?>
            <a class="prev" href="<?php echo get_permalink( $next_post->ID ); ?>">
                <h4><i class="iconmag iconmag-chevron-right"></i> <?php if($next_title <=31){echo esc_attr($next_post->post_title);}else{echo mb_substr($next_post->post_title,0,30,'UTF-8')."..";} ?></h4>
            </a>
            <?php 
            }else{
            ?>
            <a class="prev" href="<?php echo get_permalink( $next_post->ID ); ?>">
                <h4><i class="iconmag iconmag-chevron-left"></i> <?php if($next_title <=31){echo esc_attr($next_post->post_title);}else{echo mb_substr($next_post->post_title,0,30,'UTF-8')."..";} ?></h4>
            </a>
            <?php
            }
            endif; ?>
            </div>
            <div class="col-lg-6 pos-relative">
                <span class="reading-text"><?php echo esc_html__("READING","artmag"); ?></span>
                <h2>
                    <?php $title = get_the_title(); $title_length = strlen($title); if($title != "") { if($title_length >= 51) { echo mb_substr($title,0,50,'UTF-8')."..."; }else{echo esc_attr($title);} }  else { echo esc_attr($post_date = the_time('F j')); } ?>
                   
                </h2>
		<div class="sticky-social">
			<a class="progress-share-icon pbfb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="iconmag iconmag-facebook-2"></i></a>
                    <a class="progress-share-icon pbtw" href="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="iconmag iconmag-twitter-2"></i></a>
                    <a class="progress-share-icon pbpn" href="http://pinterest.com/pin/create/button/?source_url=<?php the_permalink();?>&media=<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' ); echo esc_attr($src[0]); ?>&description=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pinterest"><i class="iconmag iconmag-pinterest-p"></i></a>
                    <a class="progress-share-icon pbln" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="iconmag iconmag-linkedin-1"></i></a>
		</div>
	    </div>
            <div class="col-lg-3 alignright sticknext">
            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): 
                $prev_title = strlen($prev_post->post_title);
            if(is_rtl()){
            ?>
            <a class="next" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <h4><?php if($prev_title <=31){echo esc_attr($prev_post->post_title);}else{echo mb_substr($prev_post->post_title,0,30,'UTF-8')."..";} ?> <i class="iconmag iconmag-chevron-left"></i></h4>
            </a>
            <?php 
            }else{
            ?>
            <a class="next" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <h4><?php if($prev_title <=31){echo esc_attr($prev_post->post_title);}else{echo mb_substr($prev_post->post_title,0,30,'UTF-8')."..";} ?> <i class="iconmag iconmag-chevron-right"></i></h4>
            </a>
            <?php
            }
            endif; ?>
            </div>
        </div>
    </div>
    <div class="reading-progress-bar"></div>
</div>

<div class="container fitvids marginb60 pageback"><!-- Container Start --> 
    <div class="row clearfix">
        <div class="col-lg-12 col-sm-12" >
	<div id="post-detail">
        <div class="blog-entry"><!-- Blog Entry Start -->
            <article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
                <?php if($feat_image_style != "half"){ ?>
                <div class="blog-entry-title marginb20 pos-center"><!-- Blog Title Start -->
                    <?php if (is_sticky()) { ?> <span class="sticky-post"><i title="Stick Post" class="fa fa-bookmark"></i></span> <?php } ?><!-- Sticky Post -->
                    <h1><a href="<?php the_permalink(); ?>"> <?php $title = get_the_title(); if($title != "" ) { echo esc_attr($title); }  else { echo esc_attr($post_date = the_time('F j')); }  ?></a></h1>
                        <div class="post-element margint10 pos-center clearfix">
                            <ul>
                                <?php if (is_sticky()) { ?> <li><?php echo esc_attr__("STICKY","artmag"); ?></li><?php } ?>
                                <li><span class="author-by"><?php echo esc_attr__("by","artmag"); ?></span> <?php the_author_posts_link(); ?></li>
                                <li><a title="<?php echo esc_attr($post_date = the_time('F j, Y g:i')); ?>" href="<?php the_permalink(); ?>" class="date"><?php echo esc_attr($post_date = the_time('j F')); ?></a></li>
                                <li><?php the_category(', '); ?></li>
                                <?php if($artmag_opt['single-postview'] == true ){ ?><li><?php echo esc_attr($postView); ?></li><?php } ?>
                            </ul>
                        </div>
                </div><!-- Blog Title Finish -->
                <?php } ?>
                <?php if($feat_image_style == "full" || $feat_image_style == "fullwidth"){ ?>
                <div class="media-materials clearfix marginb40 <?php if($feat_image_style == "fullwidth"){echo esc_attr('fullwidthimage');} ?>"><!-- Media Start -->
                    <?php 
                    if($feat_image_style == "fullwidth"){$image_size = "artmag-full-featured";}else{$image_size = "artmag-full";}
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $image_size );
                    $image = $image[0];
                    $audio = get_post_meta( get_the_ID(), 'artmag_fm_audio', true ); 
                    $video = get_post_meta( get_the_ID(), 'artmag_fm_video_embed', true ); 
                    $gallery = get_post_meta( get_the_ID(), 'artmag_fm_galleryslides', true ); 
                    $link = get_post_meta( get_the_ID(), 'artmag_fm_link', true ); 
                    $quote = get_post_meta( get_the_ID(), 'artmag_fm_quote', true ); 
                    if($audio != "" ){ echo $audio; }
                    else if ($video != "" ){ echo $video; }
                    else if ($gallery != "" ){

                    $blog_slides = get_post_meta( get_the_ID( ), 'artmag_fm_galleryslides', false ); 
                    ?>
                    <div id="owl-post-slide" class="owl-carousel slider-index-list">
                        <?php
                            if ( !empty( $blog_slides ) ) {

                                foreach ( $blog_slides as $att ) {
                                    $image_src = wp_get_attachment_image_src( $att, "artmag-full-crop" );
                                    $image_src = $image_src[0];?>
                                    <div class='item'><?php echo '<img alt="" src="'.esc_url($image_src).'" />'; ?></div> 
                                <?php 
                                } 
                            }
                        ?>
                    </div>
                    <?php } else if ($link != "" ){ ?>
                    <div class="link-post-format">
                        <div class="link-post-icon pos-center">
                            <a href="<?php echo esc_url($link); ?>">
                                <i class="fa fa-external-link"></i>
                            </a>
                        </div>
                        <div class="margint10 pos-center">
                            <a href="<?php echo esc_url($link); ?>"><?php echo esc_attr($link); ?></a> 
                        </div>
                    </div> 
                    <?php }  else if ($quote != "" ){ ?>
                    <div class="quote-post-format">
                        <div class="link-post-icon clearfix marginb20 pos-center">
                            <i class="fa fa-quote-right"></i>
                        </div><?php echo esc_attr($quote); ?>
                    </div> 
                    <?php } else { if($artmag_opt['single-featured-image'] == true){ ?> <img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>"> <?php }} ?>
                    <?php $photo_credits = get_post_meta( get_the_ID(), 'artmag_fm_photo_credits', true );  ?>
                    <?php if($photo_credits != ""){ ?>
                    <div class="featured-image-credits">
                        <?php  echo esc_attr($photo_credits); ?>
                    </div><hr class="credit-bottom">
                    <?php } ?>
                </div><!-- Media Finish -->
                <?php } ?>
                <div class="row">
                    <?php if($artmag_opt['sidebar-type'] == "left" ){ ?> <!-- Sidebar Left Start (If selected) -->
                        <aside class="col-lg-3 col-sm-4 sidebar<?php if($feat_image_style == "half" ){echo esc_attr(' margint10'); } ?>">
                            <?php if ( is_active_sidebar( $blog_post_sidebar ) ) { ?>
                                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
                                    <?php 
                                        $allowed_tag = array(
                                            'a' => array(
                                                'href' => array(),
                                            ),
                                        );
                                    ?>                     
                                    <?php echo sprintf(wp_kses( __( 'Please Add Widget from <a href="%s">here</a>', 'artmag' ), $allowed_tag),"wp-admin/widgets.php" ); ?>
                                <?php endif; ?>
                            <?php } ?>
                        </aside>
                        <aside class="col-lg-1"></aside>
                    <?php } ?><!-- Sidebar Left Finish (If selected) -->
                    <?php if($artmag_opt['sidebar-type'] == "none" ){ ?> <div class="col-lg-12 col-sm-12" ><?php } else { ?> <div class="col-lg-8 col-sm-8" > <?php } ?> <!-- Entry Loop -->
                        <?php if($feat_image_style == "half"){ ?>
                        <div class="blog-entry-title marginb20 pos-center"><!-- Blog Title Start -->
                            <?php if (is_sticky()) { ?> <span class="sticky-post"><i title="Stick Post" class="fa fa-bookmark"></i></span> <?php } ?><!-- Sticky Post -->
                            <h1><a href="<?php the_permalink(); ?>"> <?php $title = get_the_title(); if($title != "" ) { echo esc_attr($title); }  else { echo esc_attr($post_date = the_time('F j')); }  ?></a></h1>
                                <div class="post-element margint10 pos-center clearfix">
                                    <ul>
                                        <?php if (is_sticky()) { ?> <li><?php echo esc_attr__("STICKY","artmag"); ?></li><?php } ?>
                                        <li><span class="author-by"><?php echo esc_attr__("by","artmag"); ?></span> <?php the_author_posts_link(); ?></li>
                                        <li><a title="<?php echo esc_attr($post_date = the_time('F j, Y g:i')); ?>" href="<?php the_permalink(); ?>" class="date"><?php echo esc_attr($post_date = the_time('j F')); ?></a></li>
                                        <li><?php the_category(', '); ?></li>
                                        <?php if($artmag_opt['single-postview'] == true ){ ?><li><?php echo esc_attr($postView); ?></li><?php } ?>
                                    </ul>
                                </div>
                        </div><!-- Blog Title Finish -->
                        <div class="media-materials clearfix marginb40"><!-- Media Start -->
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "artmag-full" );
                            $image = $image[0];
                            $audio = get_post_meta( get_the_ID(), 'artmag_fm_audio', true ); 
                            $video = get_post_meta( get_the_ID(), 'artmag_fm_video_embed', true ); 
                            $gallery = get_post_meta( get_the_ID(), 'artmag_fm_galleryslides', true ); 
                            $link = get_post_meta( get_the_ID(), 'artmag_fm_link', true ); 
                            $quote = get_post_meta( get_the_ID(), 'artmag_fm_quote', true ); 
                            if($audio != "" ){ echo esc_attr($audio); }
                            else if ($video != "" ){ echo esc_attr($video); }
                            else if ($gallery != "" ){ 

                            $blog_slides = get_post_meta( get_the_ID( ), 'artmag_fm_galleryslides', false ); 
                            ?>
                            <div id="owl-post-slide" class="owl-carousel slider-index-list">
                                <?php
                                    if ( !empty( $blog_slides ) ) {

                                        foreach ( $blog_slides as $att ) {
                                            $image_src = wp_get_attachment_image_src( $att, "artmag-full-crop" );
                                            $image_src = $image_src[0];?>
                                            <div class='item'><?php echo '<img alt="" src="'.esc_url($image_src).'" />'; ?></div> 
                                        <?php 
                                        } 
                                    }
                                ?>
                            </div>
                            <?php } else if ($link != "" ){ ?>
                            <div class="link-post-format">
                                <div class="link-post-icon pos-center">
                                    <a href="<?php echo esc_url($link); ?>">
                                        <i class="fa fa-external-link"></i>
                                    </a>
                                </div>
                                <div class="margint10 pos-center">
                                    <a href="<?php echo esc_url($link); ?>"><?php echo esc_attr($link); ?></a> 
                                </div>
                            </div> 
                            <?php }  else if ($quote != "" ){ ?>
                            <div class="quote-post-format">
                                <div class="link-post-icon clearfix marginb20 pos-center">
                                    <i class="fa fa-quote-right"></i>
                                </div><?php echo esc_attr($quote); ?>
                            </div> 
                            <?php } else { if($artmag_opt['single-featured-image'] == true){ ?> <img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>"> <?php }} ?>
                            <?php $photo_credits = get_post_meta( get_the_ID(), 'artmag_fm_photo_credits', true );  ?>
                            <?php if($photo_credits != ""){ ?>
                            <div class="featured-image-credits">
                                <?php  echo esc_attr($photo_credits); ?>
                            </div><hr class="credit-bottom">
                            <?php } ?>
                        </div><!-- Media Finish -->
                        <?php } ?>
                        <div class="post-text clearfix">
                            <?php 
                                the_content(); wp_link_pages('before=<div class="post-paginate">&after=</div>');
                            ?>
                            <a href="/clubhouse" class="post-bottom-image"><img src="http://beingboss.club/wp-content/uploads/2016/04/ClubhouseFooter700px.jpg" style="margin-top: 25px;"></a>
                        </div>
                        <?php if(has_tag()){ ?>
                        <div class="blog-post-tag clearfix">
                            <?php echo '<span class="pull-left tag-title"><h6>'. __("TAGS","artmag") .'</h6></span><span class="pull-left">';  the_tags('  ',', ','  '); echo "</span>";
                            ?>
                        </div>
                        <?php } ?>
                        <?php if($artmag_opt['single-author'] == true ){ ?>
                            <?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?>
                    <?php } ?>
                    
                </div>
                <?php if($artmag_opt['sidebar-type'] == "right" ){ ?> <!-- Sidebar Right Start (If selected) -->
                    <aside class="col-lg-1"></aside>
                    <aside class="col-lg-3 col-sm-4 sidebar<?php if($feat_image_style == "half" ){echo esc_attr(' margint10'); } ?>">
                        <?php if ( is_active_sidebar( $blog_post_sidebar ) ) { ?>
                            <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
                                <?php 
                                    $allowed_tag = array(
                                        'a' => array(
                                            'href' => array(),
                                        ),
                                    );
                                ?>                     
                                <?php echo sprintf(wp_kses( __( 'Please Add Widget from <a href="%s">here</a>', 'artmag' ), $allowed_tag),"wp-admin/widgets.php" ); ?>
                            <?php endif; ?>
                        <?php } ?>
                    </aside>
                <?php } ?><!-- Sidebar Right Start (If selected) -->
            </div>
        </article>
        </div>
</div>
    </div>
    </div>
<script>fbq('track', 'ViewContent’);</script>
<!-- Blog Entry Finish -->     
</div><!-- Container Finish --> 



<?php get_footer(); ?>