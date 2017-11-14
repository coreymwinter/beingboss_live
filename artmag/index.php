<?php get_header(); 
	$default_sidebar = esc_attr($artmag_opt['blog_sidebar']); // Default Sidebar ?>
<div class="fitvids container clearfix margint50">
	<div class="row clearfix blog-index">
        <?php if($artmag_opt['sidebar-type'] == "left" ){ ?> <!-- Sidebar Left (If selected) -->
            <aside class="col-lg-3 col-sm-4 sidebar left">
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
        <?php } if($artmag_opt['sidebar-type'] == "none" ){ ?> <div class="col-lg-12 col-sm-12" ><?php } else { ?> <div class="col-lg-8 col-sm-8" > <?php } ?> <!-- Entry Loop -->
			<?php 
			if (have_posts()) : while(have_posts()) :  the_post();
			get_template_part('inc/content');
			endwhile; else : ?>
			<div class="margint30"><h4><?php echo esc_attr__('Not Post Found!','artmag'); ?></h4></div>
			<?php 
			endif;
			artmag_fm_pagination();
			wp_reset_postdata(); ?>

		</div>
        
        <?php if($artmag_opt['sidebar-type'] == "right" ){ ?> <!-- Sidebar Right (If selected) -->
        	<aside class="col-lg-1"></aside>
            <aside class="col-lg-3 col-sm-4 sidebar right">
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
	</div>
</div>
<?php get_footer(); ?>