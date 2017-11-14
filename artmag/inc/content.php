<?php  global $artmag_opt; ?>                   

<!--**************************************************************************************************/
/* Blog Post
************************************************************************************************** -->
    <div class="blog-entry <?php if($artmag_opt['index-post-type'] == "full" ){ ?>full-entry <?php } ?>"><!-- Blog Entry Start -->
        <article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
            <div class="row">
                <?php       
                $padding_none = "";        
                $post_format = get_post_format( $post->ID );

                $blog_slides = get_post_meta( get_the_ID( ), 'artmag_fm_galleryslides', false ); 

                if ( !is_array( $blog_slides ) )
                $blog_slides = ( array ) $blog_slides;
                if(has_post_thumbnail(get_the_id())){
                if($artmag_opt['index-post-type'] == "full" ){ ?><div class="col-lg-12"><?php } else { ?> <div class="col-lg-6"> <?php }?>
                    <div class="index-post-media">
                        <div class="media-materials clearfix"><!-- Media Start -->
                            <?php   
                                    if($artmag_opt['index-post-type'] == "full" & $artmag_opt['featured-image-cropping'] == "yes"  ){
                                        $img_size = "artmag-full-crop";
                                    }

                                    else if($artmag_opt['index-post-type'] == "full" ){
                                        $img_size = "artmag-full";
                                    }

                                    else if($artmag_opt['featured-image-cropping'] == "yes" ){
                                        $img_size = "artmag-list-thumbnail";
                                    }

                                    else{
                                        $img_size = "artmag-list-thumbnail-not-crop";
                                    }

                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $img_size );
                                    $image = $image[0]; 
         
                                ?> 
                                <a href="<?php the_permalink(); ?>"><img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>"></a> 
                            <?php 

                            if($post_format == "audio"){ $post_format_icon = "post-format-microphone"; }
                            if($post_format == "image"){ $post_format_icon = "post-format-image"; }
                            else if($post_format == "video"){ $post_format_icon = "post-format-play"; }
                            else if($post_format == "link"){ $post_format_icon = "post-format-link"; }
                            else if($post_format == "quote"){ $post_format_icon = "post-format-quote"; }
                            if($post_format != "" && $post_format != "gallery"){ ?><div class="post-format-icon"><i class="iconmag iconmag-<?php echo esc_attr($post_format_icon); ?>"></i></div><?php } ?>
                        </div><!-- Media Finish -->
                    </div>
                </div> <!-- col lg Finish -->


                <?php } else if( $post_format == "gallery" &  !empty( $blog_slides ) ){  ?>

                <?php if($artmag_opt['index-post-type'] == "full" ){ ?><div class="col-lg-12"><?php } else {?> <div class="col-lg-6"> <?php }?>
                    <div class="index-post-media">
                        <div class="media-materials clearfix"><!-- Media Start -->
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
                            <div class="post-format-icon"><i class="iconmag iconmag-post-format-gallery"></i></div>    
                        </div><!-- Media Finish -->
                    </div>
                </div>
                <?php } else { $padding_none = "padding-none"; } ?>
                <?php
                if(!has_post_thumbnail(get_the_id())){
                if($artmag_opt['index-post-type'] == "full" ){ ?><div class="col-lg-12"><?php } else { ?> <div class="col-lg-6"> <?php }?>
                    <div class="index-post-media">
                        <div class="media-materials clearfix"><!-- Media Start -->
                            <?php   
                                    if($artmag_opt['index-post-type'] == "full" & $artmag_opt['featured-image-cropping'] == "yes"  ){
                                        $img_size = "artmag-full-crop";
                                    }

                                    else if($artmag_opt['index-post-type'] == "full" ){
                                        $img_size = "artmag-full";
                                    }

                                    else if($artmag_opt['featured-image-cropping'] == "yes" ){
                                        $img_size = "artmag-list-thumbnail";
                                    }

                                    else{
                                        $img_size = "artmag-list-thumbnail-not-crop";
                                    }

                                    if(!has_post_thumbnail(get_the_id())){
                                            global $artmag_opt;
                                            if(!empty($artmag_opt['post-no-image'])){
                                                $no_image = $artmag_opt['post-no-image']['id'];
                                                $image = wp_get_attachment_image_src( $no_image, "artmag-full");
                                                $image = $image[0]; 
                                            }else{
                                                $image = get_template_directory_uri() . '/images/empty.png';
                                            }
                                    }else{
                                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "artmag-full" );
                                            $image = $image[0]; 
                                    }
         
                                ?> 
                                <a href="<?php the_permalink(); ?>"><img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>"></a>
                        </div><!-- Media Finish -->
                    </div>
                </div> <!-- col lg Finish -->
                <?php } ?>

                <?php if($artmag_opt['index-post-type'] == "full"){ $padding_none = "padding-none"; } ?>
                <?php if( $artmag_opt['index-post-type'] == "full" ){  ?><div class="col-lg-12"><?php } else { ?><div class="col-lg-6"><?php } ?>
                    <div class="index-post-content <?php echo esc_attr($padding_none); ?>">
                        <div class="blog-entry-title"><!-- Blog Title Start -->
                            <?php if($artmag_opt['index-list-cat-visibility'] == "yes" ) { ?><div class="mini-post-cat h6block"><h6><?php the_category(' '); ?></h6></div><?php } ?>
                            <h2><a href="<?php the_permalink(); ?>"> <?php $title = get_the_title(); if($title != "" ) { echo esc_attr($title); }  else { echo esc_attr($post_date = the_time('F j')); }  ?></a></h2>
                            <div class="post-element margint5 clearfix">
                                <ul>
                                    <?php if (is_sticky()) { ?> <li><?php echo esc_attr__("STICKY","artmag"); ?></li><?php } ?>
                                    <li><span class="author-by"><?php echo esc_attr__("by","artmag"); ?></span> <?php the_author_posts_link(); ?></li>
                                    <li><a title="<?php echo esc_attr($post_date = the_time('F j, Y g:i')); ?>" href="<?php the_permalink(); ?>" class="date"><?php echo esc_attr($post_date = the_time('j F')); ?></a></li>
                                    <?php if($artmag_opt['index-list-share-visibility'] == "yes" ){ ?>
                                    <li class="share-but"><a href="#"><i class="iconmag iconmag-share"></i> <?php echo esc_attr__("SHARE","artmag"); ?> </a>
                                        <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' ); ?>
                                        <div class='share-box'>
                                            <ul>
                                                <li><a href='http://www.facebook.com/sharer.php?u=<?php echo get_the_permalink(); ?>'><i class='iconmag iconmag-facebook'></i> Facebook</a></li>
                                                <li><a href='https://twitter.com/share?url=<?php echo get_the_permalink(); ?>&text=<?php echo str_replace(' ', '%20', get_the_title()); ?>'><i class='iconmag iconmag-twitter'></i> Twitter</a></li>
                                                <li><a href='http://pinterest.com/pin/create/button/?url=<?php echo get_the_permalink(); ?>&media=<?php esc_attr($src[0]); ?>&description=<?php get_the_title(); ?>'><i class='iconmag iconmag-pinterest'></i> Pinterest</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div><!-- Blog Title Finish -->
                        <div class="post-index-text margint15 clearfix"><!-- Post Text Start -->
                            <?php $content_length = strlen(strip_tags(get_the_content()));  if($artmag_opt['index-content-full'] == "yes"){ echo get_the_content();  echo "abc";} else{echo excerpt(26); if($content_length >= 180){ echo "..";}} ?>
                        </div><!-- Post Text Finish -->
                        <?php if($artmag_opt['index-read-more'] == "yes" ){ ?>
                            <div class="read-more button clearfix margint30"><a href="<?php the_permalink(); ?>"><?php echo esc_attr__("Read More","artmag"); ?> <span class="arrow-right"><?php if(is_rtl()){ echo "&#8592;";}else{ echo "&#8594";} ?></span></a></div>
                        <?php } ?>
                    </div>
                </div>
            </article>
        </div><!-- Blog Entry Finish -->
