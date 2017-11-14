<!DOCTYPE html>
<!--[if IE 6]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<?php global $artmag_opt; ?>

	<!-- *********	PAGE TOOLS	*********  -->

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- *********	MOBILE TOOLS	*********  -->

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- *********	WORDPRESS TOOLS	*********  -->
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<!-- *********	FAVICON TOOLS	*********  -->
	
	<?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
    
	<link rel="shortcut icon" href="https://beingboss.club/wp-content/uploads/2016/01/favicon.png" />
	
	<?php }
	else {

    if(empty($artmag_opt['favicon']['url'])){
		$artmag_opt['favicon']['url'] = "";
	}

	if(empty($artmag_opt['ipad_retina_icon']['url'])){
		$artmag_opt['ipad_retina_icon']['url'] = "";
	}

	if(empty($artmag_opt['iphone_icon_retina']['url'])){
		$artmag_opt['iphone_icon_retina']['url'] = "";
	}	

	if(empty($artmag_opt['ipad_icon']['url'])){
		$artmag_opt['ipad_icon']['url'] = "";
	}		

	if(empty($artmag_opt['iphone_icon']['url'])){
		$artmag_opt['iphone_icon']['url'] = "";
	}			

	if($artmag_opt['favicon']['url'] != "") { ?> <link rel="shortcut icon" href="<?php echo esc_attr($artmag_opt['favicon']['url']); ?>" /><?php } 
			else { ?> <link rel="shortcut icon" href="<?php echo THEMEROOT."/images/favicon.ico"; ?>" /> <?php } ?>
	
	<?php if($artmag_opt['ipad_retina_icon']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_attr($artmag_opt['ipad_retina_icon']['url']); ?>" /> <?php } ?>
	
	<?php if($artmag_opt['iphone_icon_retina']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_attr($artmag_opt['iphone_icon_retina']['url']); ?>" /> <?php } ?>
	
	<?php if($artmag_opt['ipad_icon']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_attr($artmag_opt['ipad_icon']['url']); ?>" /> <?php } ?>
	
	<?php if($artmag_opt['iphone_icon']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo esc_attr($artmag_opt['iphone_icon']['url']); ?>" /> <?php } 

	} ?>

	<?php wp_head(); ?>
<script src="https://app.convertkit.com/assets/CKJS4.js?v=21"></script>
<script src="https://use.typekit.net/imk5mvu.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1744799069130179');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1744799069130179&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<meta name="google-site-verification" content="Z9Ma9QlSkHuLy4E6_JaJ3-pQENo5cS72ar9YYtWgCz4" />
  <script type="text/javascript" src="jquery.sticky.js"></script>
  <script>
    $(window).load(function(){
      $("#clubhouse-sticky-bar").sticky({ topSpacing: 0 });
    });
  </script>

<!-- Hotjar Tracking Code for www.beingboss.club -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:563397,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>

</head>
<body <?php body_class(); ?>>

<?php get_header(); global $artmag_opt; ?>
<?php if($artmag_opt['top-menu'] != false){ ?>
<div class="pre-header clearfix">
	<div class="container">
		<div class="pull-left">
			<nav id="top-menu">
				<?php
		        	if (has_nav_menu('top-menu')) {
					 	wp_nav_menu(
					 		array(
					 			'theme_location' => 'top-menu',
					 			'container' => '',
					 			'menu_class' => 'top-menu',
					 			'menu_id' => 'topmenu',
					 			'walker' => new description_walker() 
					 		)
					 	);
				 	}
				?>
			</nav>
		</div>
		<div class="pull-right top-menu-text">
			<?php echo esc_attr($artmag_opt['top-menu-textly']); ?>
		</div>
	</div>
</div>
<?php } ?>
<?php
if(is_home() || is_front_page()){
if($artmag_opt['header-slider'] != false){ ?>
	<div class="mOver-slider">
		<div class="mOver-loading"><div class="mOver-spinner"></div></div>
		<div class="mOver-background">
			<div class="mOver-bg mOver-bg-1" style="background:url('https://beingboss.club/wp-content/uploads/2016/05/BB_HeaderPodcast.jpg');">
				<div class="mOver-bg-text">
					<img src="https://beingboss.club/wp-content/uploads/2016/05/BB_HeaderPodcast_Text.png" style="margin:0px auto; display: table;">
				</div>
			</div>
			<div class="mOver-bg mOver-bg-2" style="background:url('https://beingboss.club/wp-content/uploads/2016/05/BB_HeaderMinisodes.jpg');">
				<div class="mOver-bg-text">
					<img src="https://beingboss.club/wp-content/uploads/2016/05/BB_HeaderMinisodes_Text.png" style="margin:0px auto; display: table;">
				</div>
			</div>
			<div class="mOver-bg mOver-bg-3" style="background:url('https://beingboss.club/wp-content/uploads/2016/06/BB_HeaderImages-PLAB_Image.jpg');">
				<div class="mOver-bg-text">
					<img src="https://beingboss.club/wp-content/uploads/2017/10/podcastlikeaboss-logo.png" style="margin:0px auto; display: table;">
				</div>
			</div>
			<div class="mOver-bg mOver-bg-4" style="background:url('https://beingboss.club/wp-content/uploads/2016/10/BB_HeaderImages-IAMBEINGBOSS.jpg');">
				<div class="mOver-bg-text">
					<img src="https://beingboss.club/wp-content/uploads/2016/10/BB_HeaderImages-IAMBEINGBOSS_Text-2.png" style="margin:0px auto; display: table;">
				</div>
			</div>
		</div>
		<div class="mOver-wraplist">
			<div class="mOver-mask"></div>
			<div class="container">
				<ul class="mOver-list">
					<li data-video-line="1">
						<div class="mo-title"><a href="/category/podcast/full-episodes">FULL EPISODES</a></div>
						<div class="read-more-mo"><a href="/category/podcast/full-episodes">Listen Now</a></div>
					</li>
					<li data-video-line="2">
						<div class="mo-title"><a href="/category/podcast/minisodes">MINISODES</a></div>
						<div class="read-more-mo"><a href="/category/podcast/minisodes">Listen Now</a></div>
					</li>
					<li data-video-line="3">
						<div class="mo-title"><a href="https://podcastlikeaboss.com/">PODCAST LIKE A BOSS</a></div>
						<div class="read-more-mo"><a href="https://podcastlikeaboss.com/">Learn More</a></div>
					</li>
					<li data-video-line="4">
						<div class="mo-title"><a href="https://beingboss.club/iambeingboss">#IamBeingBoss</a></div>
						<div class="read-more-mo"><a href="https://beingboss.club/iambeingboss">Learn More</a></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div id="owl-sli-m" class="owl-carousel owl-short mOver-mobile">
		<div class="item">
        		<a href="/category/podcast/full-episodes"><img alt="" class="img-responsive" src="https://beingboss.club/wp-content/uploads/2016/04/BB_HeaderImages_PodcastFULL.jpg" /></a>
        	</div>
		<div class="item">
        		<a href="/category/podcast/minisodes"><img alt="" class="img-responsive" src="https://beingboss.club/wp-content/uploads/2016/05/BB_HeaderImages_Minisodes.jpg" /></a>
        	</div>
		<div class="item">
        		<a href="https://podcastlikeaboss.com/"><img alt="" class="img-responsive" src="https://beingboss.club/wp-content/uploads/2017/10/PLAB_Events_mobile.jpg" /></a>
       		</div>
		<div class="item">
        		<a href="https://beingboss.club/iambeingboss"><img alt="" class="img-responsive" src="https://beingboss.club/wp-content/uploads/2016/10/BB_HeaderImages-IAMBEINGBOSS_mobile.png" /></a>
        	</div>
	</div>
<?php }} ?>
	<div class="main-header clearfix"><!-- Main Header Start -->
	    <div class="header-container<?php if($artmag_opt['head-color-type'] == false){ echo ' dark'; } ?>"<?php if($artmag_opt['head-style-type'] == 'image'){ ?> style="background: url('<?php echo esc_attr($artmag_opt['head-image']['url']); ?>');"<?php } ?><?php if($artmag_opt['head-style-type'] == 'colored'){ ?> style="background: <?php echo esc_attr($artmag_opt['head-colored']); ?>;"<?php } ?>>
<?php if($artmag_opt['head-style-type'] == "video"){?>
            <div class="video_sections">
            	<?php
            	$video_url = $artmag_opt['head-video'];
                $youtube = "youtube";
                $vimeo = "vimeo";
                $youtubesec = "youtu.be";
                if (strlen(strstr($video_url,$youtube))>0) {
                  	$videotype = "youtube";
                  	parse_str( parse_url( $video_url, PHP_URL_QUERY ), $videoid );
                  	$videopath = $videoid['v'];  
                }elseif(strlen(strstr($video_url,$youtubesec))>0) {
					$needle = "youtu.be/";
			        $pos = strpos($video_url, $needle);
			        $start = $pos + strlen($needle);
			        $vid_id = substr($video_url, $start, 11);
					$videotype = "youtube";
					$videopath = $vid_id; 
				}elseif(strlen(strstr($video_url,$vimeo))>0){
                  	$videotype = "vimeo";
                  	sscanf(parse_url($video_url, PHP_URL_PATH), '/%d', $videoid);
                  	$videopath = $videoid;
                }else{
                  	$videotype = "mp4";
                  	$videopath = $video_url;
                }
                $randomKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                ?>
                <div class="video-area">
                  <div class="video-section" data-video-height="200">
                    <div class="video-wrapper">
                    <?php if($videotype == "youtube"){ ?>
                      	<div id="youtube-bg<?php echo esc_attr($randomKey); ?>" class="youtube-bg" data-video-url="<?php echo esc_attr($videopath); ?>" data-video-uid="<?php echo esc_attr($randomKey); ?>"></div>
                    <?php }elseif($videotype == "vimeo"){ ?>
                    	<iframe id="player<?php echo esc_attr($randomKey); ?>" class="vimeo-bg" src="http://player.vimeo.com/video/<?php echo esc_attr($videopath); ?>?portrait=0&byline=0&player_id=player<?php echo esc_attr($randomKey); ?>&title=0&badge=0&loop=1&autopause=0&api=1&rel=0&autoplay=1" frameborder="0"></iframe>
                    <?php }else{ $videoPathHtml = substr($videopath, 0, -4); ?>
                    	<video class="mediaElement" preload="false" loop="true" autoPlay="true" poster="<?php echo IMAGES.'/dummy.png'; ?>" muted>
                            <source type="video/mp4" src="<?php echo esc_attr($videoPathHtml); ?>.mp4">
                            <source type="video/webm" src="<?php echo esc_attr($videoPathHtml); ?>.webm">
                        	<source type="video/ogg" src="<?php echo esc_attr($videoPathHtml); ?>.ogg">
                        </video>
                    <?php } ?>
                    	<div class="video-cover" style="background: url('<?php echo esc_url($artmag_opt['head-video-image']['url']); ?>') no-repeat;"></div>
                    </div>
                    <div class="video-content"><div class="video-child">
<?php } ?>
	    	<div class="container">
	        	<div class="row vertical">
                	<div class="col-lg-4 col-sm-4 col-user vertical-middle">
                		<?php if($artmag_opt['author-info-visibility'] == 1 ){ ?>
                		<div class="user-info">
                			<div class="user-info-img pull-left"><a href="<?php echo esc_url($artmag_opt['author-link']); ?>"><img alt='' class="img-responsive" src="<?php echo esc_url($artmag_opt['author-image']['url']); ?>"></a></div>
                			<div class="user-info-content pull-left">
                				<h6><a href="<?php echo esc_url($artmag_opt['author-link']); ?>"><?php echo esc_attr($artmag_opt['author-name']); ?></a></h6>
                				<p><?php echo esc_attr($artmag_opt['author-info']); ?> <a href="<?php echo esc_url($artmag_opt['author-link']); ?>"></a></p>
                			</div>
                		</div>
                		<?php } ?>
                	</div>
                	<div class="col-lg-4 col-sm-4 col-logo vertical-middle">
						<div class="logo pos-center"><!-- Logo Start -->
		                    <?php

		                    if( empty($artmag_opt['logo']['url']) ) {
		                    	$artmag_opt['logo']['url'] = "";
		                    }
		                    if($artmag_opt['logo']['url'] != "" && $artmag_opt['logo-type'] == "image" ){ ?>
		                    	<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="logo" src="<?php echo esc_attr($artmag_opt['logo']['url']); ?>"></a>
		                    <?php } else { ?>

								<div class="logo-text pos-center">
			                   		<h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php if($artmag_opt['logo-custom-title'] == "") {  bloginfo('name'); } else { echo esc_attr($artmag_opt['logo-custom-title']); }  ?></a></h1>
			                   		<div class="blog-tagline"><p><?php if($artmag_opt['logo-custom-title'] == "") { bloginfo('description'); } else { echo esc_attr($artmag_opt['logo-custom-description']); }  ?></p></div>
		                   		</div>

		                   	<?php } ?>

						</div><!-- Logo Finish -->
					</div>
					<?php if($artmag_opt['social-media-visibility'] == 1 ){ ?>
					<div class="col-lg-4 col-sm-4 col-social vertical-middle">
						<div class="social-area pull-right">
							<ul>
<?php if ($artmag_opt['custom-site-name-1'] != "") { ?><li class="custom-logo"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($artmag_opt['custom-site-name-1']); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['custom-site-url-1']); ?>"><img alt="<?php echo esc_attr($artmag_opt['custom-site-name-1']); ?>" src="<?php echo esc_attr($artmag_opt['custom-site-logo-1']['url']); ?>"></a></li><?php } ?>
<?php if ($artmag_opt['soundcloud-header'] != "") { ?><li class="soundcloud"><a data-toggle="tooltip" data-placement="top"  title="<?php echo esc_html_e("Soundcloud","artmag"); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['soundcloud-header']); ?>"><img src="https://beingboss.club/wp-content/uploads/2016/02/Social_Header_Soundcloud.png"></a></li><?php } ?>	
  <?php if ($artmag_opt['custom-site-name-2'] != "") { ?><li class="custom-logo"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($artmag_opt['custom-site-name-2']); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['custom-site-url-2']); ?>"><img alt="<?php echo esc_attr($artmag_opt['custom-site-name-2']); ?>" src="<?php echo esc_attr($artmag_opt['custom-site-logo-2']['url']); ?>"></a></li><?php } ?> 
<?php if ($artmag_opt['custom-site-name-3'] != "") { ?><li class="custom-logo"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($artmag_opt['custom-site-name-3']); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['custom-site-url-3']); ?>"><img alt="<?php echo esc_attr($artmag_opt['custom-site-name-1']); ?>" src="<?php echo esc_attr($artmag_opt['custom-site-logo-3']['url']); ?>"></a></li><?php } ?>                           
<?php if ($artmag_opt['twitter-header'] != "") { ?><li class="twitter"><a data-toggle="tooltip" data-placement="top"  title="<?php echo esc_html_e("Twitter","artmag"); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['twitter-header']); ?>"><img src="https://beingboss.club/wp-content/uploads/2016/02/Social_Header_Twitter.png"></a></li><?php } ?>
<?php if ($artmag_opt['facebook-header'] != "") { ?><li class="facebook"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_html_e("Facebook","artmag"); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['facebook-header']); ?>"><img src="https://beingboss.club/wp-content/uploads/2016/02/Social_Header_Facebook.png"></a></li><?php } ?>
								<?php if($artmag_opt['search-visibility'] == 1 ){ ?><li class="searchli">
									<a class="search_button isOpenNo" href="#"><img src="https://beingboss.club/wp-content/uploads/2016/03/Search_Icon.png"></a>
									<div id="search-wrapper">
			                            <form action="<?php echo home_url('/'); ?>" id="searchform" method="get">
			                                <input type="search" id="s" name="s" class="s-input" placeholder="<?php echo esc_attr__("Write keyword and press enter","artmag"); ?>" required />
			                            </form>
			                        </div>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php } ?>
                </div>
            </div>
<?php if($artmag_opt['head-style-type'] == "video"){?>
                    </div></div>
                  </div>
                </div>
            </div>
<?php } ?>
    	</div>
	</div><!-- Main Header Finish -->

	<div class="mobile-main-header">
		<div class="mobile-pre-header clearfix">
			<div class="pull-left">
				<div class="social-area clearfix">
					<ul>
	<?php if ($artmag_opt['custom-site-name-1'] != "") { ?><li class="custom-logo"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($artmag_opt['custom-site-name-1']); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['custom-site-url-1']); ?>"><img alt="<?php echo esc_attr($artmag_opt['custom-site-name-1']); ?>" src="<?php echo esc_attr($artmag_opt['custom-site-logo-1']['url']); ?>"></a></li><?php } ?>
<?php if ($artmag_opt['soundcloud-header'] != "") { ?><li class="soundcloud"><a data-toggle="tooltip" data-placement="top"  title="<?php echo esc_html_e("Soundcloud","artmag"); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['soundcloud-header']); ?>"><img src="https://beingboss.club/wp-content/uploads/2016/02/Social_Header_Soundcloud.png"></a></li><?php } ?>	                            
<?php if ($artmag_opt['twitter-header'] != "") { ?><li class="twitter"><a data-toggle="tooltip" data-placement="top"  title="<?php echo esc_html_e("Twitter","artmag"); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['twitter-header']); ?>"><img src="https://beingboss.club/wp-content/uploads/2016/02/Social_Header_Twitter.png"></a></li><?php } ?>
<?php if ($artmag_opt['facebook-header'] != "") { ?><li class="facebook"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_html_e("Facebook","artmag"); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['facebook-header']); ?>"><img src="https://beingboss.club/wp-content/uploads/2016/02/Social_Header_Facebook.png"></a></li><?php } ?>
	                            <?php if ($artmag_opt['custom-site-name-2'] != "") { ?><li class="custom-logo"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($artmag_opt['custom-site-name-2']); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['custom-site-url-2']); ?>"><img alt="<?php echo esc_attr($artmag_opt['custom-site-name-2']); ?>" src="<?php echo esc_attr($artmag_opt['custom-site-logo-2']['url']); ?>"></a></li><?php } ?>
	                            <?php if ($artmag_opt['custom-site-name-3'] != "") { ?><li class="custom-logo"><a data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr($artmag_opt['custom-site-name-3']); ?>" target="_blank" href="<?php echo esc_attr($artmag_opt['custom-site-url-3']); ?>"><img alt="<?php echo esc_attr($artmag_opt['custom-site-name-3']); ?>" src="<?php echo esc_attr($artmag_opt['custom-site-logo-3']['url']); ?>"></a></li><?php } ?>
						<?php if($artmag_opt['search-visibility'] == 1 ){ ?><li class="searchli">
							<a class="search_button_mobile isOpenNoM" href="#"><img src="https://beingboss.club/wp-content/uploads/2016/03/Search_Icon.png"></a>
							<div id="search-wrapper-mobile">
	                            <form action="<?php echo home_url('/'); ?>" id="searchformm" method="get">
	                                <input type="search" name="s" class="s-input" placeholder="<?php echo esc_attr__("Write keyword and press enter","artmag"); ?>" required />
	                            </form>
	                        </div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="pull-right">
				<div class="user-info">
        			<div class="user-info-img pull-left"><a href="<?php echo esc_url($artmag_opt['author-link']); ?>"><img alt='' class="img-responsive" src="<?php echo esc_url($artmag_opt['author-image']['url']); ?>"></a></div>
        		</div>
			</div>
		</div>
		<div class="logo pos-center<?php if($artmag_opt['head-color-type'] == false){ echo ' dark'; } ?>"<?php if($artmag_opt['head-style-type'] == 'image'){ ?> style="background: url('<?php echo esc_attr($artmag_opt['head-image']['url']); ?>');"<?php } ?><?php if($artmag_opt['head-style-type'] == 'video'){ ?> style="background: url('<?php echo esc_attr($artmag_opt['head-video-image']['url']); ?>');"<?php } ?><?php if($artmag_opt['head-style-type'] == 'colored'){ ?> style="background: <?php echo esc_attr($artmag_opt['head-colored']); ?>;"<?php } ?>><!-- Logo Start -->
            <?php

            if( empty($artmag_opt['logo']['url']) ) {
            	$artmag_opt['logo']['url'] = "";
            }
            if($artmag_opt['logo']['url'] != "" && $artmag_opt['logo-type'] == "image" ){ ?>
            	<a href="<?php echo esc_url(home_url('/')); ?>"><img alt="logo" src="<?php echo esc_attr($artmag_opt['logo']['url']); ?>"></a>
            <?php } else { ?>

				<div class="logo-text pos-center">
               		<h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php if($artmag_opt['logo-custom-title'] == "") {  bloginfo('name'); } else { echo esc_attr($artmag_opt['logo-custom-title']); }  ?></a></h1>
               		<div class="blog-tagline"><p><?php if($artmag_opt['logo-custom-title'] == "") { bloginfo('description'); } else { echo esc_attr($artmag_opt['logo-custom-description']); }  ?></p></div>
           		</div>

           	<?php } ?>

		</div><!-- Logo Finish -->
		<nav id="mobile-menu">
	        <?php
	        	if (has_nav_menu('mobile-menu')) {
					 	wp_nav_menu(
					 		array(
					 			'theme_location' => 'mobile-menu', 
					 			'container' => '', 
					 			'menu_class' => 'mobile-menu', 
					 			'menu_id' => 'mobilemenu',
					 			'walker' => new description_walker() 
					 		)
					 	);
				 	}
			?>
	    </nav>
	    <div id="mobileMenuWrap"></div>
	</div>
        <?php if ($artmag_opt['navigation-visibility']) { ?><!-- Main Menu Start -->
        <div class="main-menu marginb20 clearfix pos-center">
            <nav id="main-menu">
            <div class="container">
                <?php 
                    if (has_nav_menu('main-menu')) {
					 	wp_nav_menu(
					 		array(
					 			'theme_location' => 'main-menu', 
					 			'container' => '', 
					 			'menu_class' => 'nav-collapse mini-menu', 
					 			'menu_id' => 'navmain',
					 			'walker' => new description_walker() 
					 		)
					 	);
				 	}
					else {
                    ?><div class="empty-menu"><?php 
					        $allowed_tag = array(
					            'a' => array(
					                'href' => array(),
					            ),
					        );
					    ?>                     
					    <?php echo sprintf(wp_kses( __( 'Please Add Menu from <a href="%s">here</a>', 'artmag' ), $allowed_tag),"wp-admin/nav-menus.php" ); ?>
					    </div>
                    <?php } ?>
            </div>
            </nav>
            <div class="hideSubMenuLoading"></div>
        </div>
        <?php }else{ echo "<div class='clearfix marginb30'></div>"; } ?><!-- Main Menu Finish -->