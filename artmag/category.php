<?php get_header(); ?>
<div class="fitvids container pageback"><!-- Container Start -->
<?php $default_sidebar = esc_attr($artmag_opt['blog_sidebar']); ?>
	<div class="row clearfix"><!-- Row Start -->

		<?php if($artmag_opt['sidebar-type'] == "left" ){ ?> 
		    <aside class="col-lg-3 col-sm-4 sidebar">
		        <?php if ( is_active_sidebar( $default_sidebar ) ) { ?>
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($default_sidebar)) :  ?>
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
		<?php } ?>

	    <?php if($artmag_opt['sidebar-type'] == "none" ){ ?> 
	    <div class="col-lg-12 col-sm-12" ><?php } else { ?> <div class="col-lg-8 col-sm-8" > <?php } ?> <!-- If Sidebar is not defined, then Post will be Full Screen -->
	    	<div class="cat-title"><h6><?php printf( __( 'Category: %s', 'artmag' ), single_cat_title( '', false ) ); ?></h6></div>
	    	<?php if (have_posts()) : while(have_posts()) :  the_post(); ?>
	    	<?php get_template_part('inc/content'); ?>
	    	<?php endwhile; else : ?>
	    	<div class="margint30"><h4><?php echo esc_html__('Not Post Found!','artmag') ?></h4></div>
	    	<?php endif; ?>
		<?php if ( is_category( '41' ) ) {?>
			<a href="/clubhouse"><img src="http://beingboss.club/wp-content/uploads/2016/04/SecretEpisodes_Clubouse.jpg" style="max-width: 100%;"></a>
		<?php } ?>
	    	<?php artmag_fm_pagination(); ?>
	    </div>

		<?php if($artmag_opt['sidebar-type'] == "right" ){ ?> 
		    <aside class="col-lg-1"></aside>
		    <aside class="col-lg-3 col-sm-4 sidebar">
		        <?php if ( is_active_sidebar( $default_sidebar ) ) { ?>
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($default_sidebar)) :  ?>
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
		<?php } ?>

	</div><!-- Row Finish -->
</div> <!-- Container Finish -->
<?php get_footer(); ?>