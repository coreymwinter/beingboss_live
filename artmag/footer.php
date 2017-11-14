<?php global $artmag_opt; ?>
<?php if($artmag_opt['instagram-bar-visibility'] == 1){ ?>
<div class="instagram-bar">
	<div class="instagram-bar-title">INSTA<i class="iconmag iconmag-instagram"></i>GRAM</div>
	<div class="instagram-bar-subtitle"><?php echo esc_attr($artmag_opt['instagram-subtitle']); ?></div>
</div>
<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('instagram-footer')) :  ?>
    <div class="no-widget pos-center">
    <?php 
        $allowed_tag = array(
            'a' => array(
                'href' => array(),
            ),
        );
    ?>                     
    <?php echo sprintf(wp_kses( __( 'Please Add Widget from <a href="%s">here</a>', 'artmag' ), $allowed_tag),"wp-admin/widgets.php" ); ?>
    </div>
<?php endif; ?>
<?php } ?>

<div class="bottom-footer pos-center">
	<div class="container">
		<div class="row equal-footer">
			<div class="footer-left">
				<div class="footer-menu">
					<div class="footer-menu-column">
						<strong>INFO</strong><br />
						<a href="/about">About</a><br />
						<a href="/events">Events</a><br />
					</div>
					<div class="footer-menu-column">
						<strong>PODCAST</strong><br />
						<a href="/category/podcast/full-episodes">Full Episodes</a><br />
						<a href="/category/podcast/minisodes">Minisodes</a><br />
						<a href="/category/podcast/secret-episodes">Secret Episodes</a><br />
						<a href="/category/podcast">View All</a>
					</div>
					<div class="footer-menu-column">
						<strong>ARTICLES</strong><br />
						<a href="/category/articles/boss-habits">Boss Habits</a><br />
						<a href="/category/articles/boss-mindset">Boss Mindset</a><br />
						<a href="/category/articles/boss-life">Boss Life</a><br />
						<a href="/category/articles">View All</a>
					</div>
					<div class="footer-menu-column">
						<strong>JOIN US</strong><br />
						<a href="/vacations">Boss Vacations</a><br />
						<a href="/clubhouse">Boss Clubhouse</a><br />
						<a href="/bundle">Boss Bundle</a>
					</div>
				</div>
				<div class="footer-social">
					<a href="https://itunes.apple.com/us/podcast/being-boss/id956310359"><img src="/wp-content/uploads/2016/02/Social_Apple.png"></a>
					<a href="https://soundcloud.com/beingboss"><img src="/wp-content/uploads/2016/02/Social_Soundcloud.png"></a>
					<a href="https://twitter.com/beingbossclub"><img src="/wp-content/uploads/2016/02/Social_Twitter.png"></a>
					<a href="https://www.facebook.com/groups/beingboss/"><img src="/wp-content/uploads/2016/02/Social_Facebook.png"></a>
				</div>
				<div class="footer-copyright">
					&trade; and &copy; 2015-2017 Being Boss LLC / All Rights Reserved<br />
					<a href="http://beingboss.club/terms" style="color: #fff;">Terms + Conditions</a> / <a href="http://beingboss.club/privacy" style="color: #fff;">Privacy Policy</a><br />
					hello@beingboss.club
				</div>
			</div>
			<div class="footer-right">
				<h4>GET EXCLUSIVE CONTENT</h4>
				<p>episode worksheets, secret episodes, special offers, & more</p>
				<script src="https://app.convertkit.com/landing_pages/30075.js"></script>
			</div>
		</div>
	</div>
</div>
<a href="#" class="scrollup"><i class="iconmag iconmag-arrow-up"></i><span class="hide-mobile"><?php echo esc_attr__("TOP","artmag"); ?></span></a>
<?php wp_footer(); ?>
</body>
</html>