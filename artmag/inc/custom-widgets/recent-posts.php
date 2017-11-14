<?php

//Start footer recent posts widgets
class artmag_fm_Footer_Recent_Posts_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_footer_recent_entries', 'description' => __( "The most recent posts", "artmag_bg_fm") );
		parent::__construct('blogy-footer-recent-posts', __('[ CUSTOM ] Recent Posts  ', 'artmag_bg_fm'), $widget_ops);
		$this->alt_option_name = 'widget_footer_recent_entries';
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_footer_recent_posts', 'widget');
		if ( !is_array($cache) )
			$cache = array();
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		ob_start();
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('[ CUSTOM ] Recent Posts  ', 'artmag_bg_fm') : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) $number = 10;
		
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title;  ?>


			<div class="recent-post-custom">
	<?php 
		

						// WP_Query arguments
						$args = array (
						'order'                  => 'DESC',
						'orderby'                => 'date',
						'posts_per_page'         => $number, // Slider Post Count
						'ignore_sticky_posts'    => 1,
						 'post_status'=>'publish',
						);

						// The Query
						$query = new WP_Query( $args );

						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
							$query->the_post();

							$image = "";
							

							$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-slider-3-grid' );
							$image = $image[0];
					
							if($image == ""){

								$image = IMAGES."/slider-no-image-3.jpg"; 

							}
						?>
						
							
			               <div class="recent-post-box marginb20 clearfix">
			                  <div class="recent-post-image"> 
			                    <?php if (has_post_thumbnail() ){ the_post_thumbnail('thumbnail'); } else { echo '<img alt="" src="'.IMAGES.'/slider-no-image-3.jpg">'; } ?> 
			                  </div>
			                  <div class="recent-post-title-cont"> 
			                    <a class="widgetlink" href="<?php the_permalink(); ?>"> <?php echo get_the_title(); ?> </a>
			                     <div class="post-element clearfix">
			                          <ul>
			                              <li><span class="author-by"><?php echo esc_attr__("by","artmag"); ?></span> <?php the_author_posts_link(); ?></li>
			                          </ul>
			                      </div>
			                  </div>
			                </div>
						



						<?php 
						}
					}else {
						echo esc_attr__("<h4>Not Post Found!</h4>","artmag");
					}

					// Restore original Post Data
					wp_reset_postdata();

					?>
					</div>



		<?php echo $after_widget; ?>
<?php
		
		//$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_footer_recent_posts', $cache, 'widget');
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_footer_recent_entries']) )
			delete_option('widget_footer_recent_entries');
		return $instance;
	}
	function flush_widget_cache() {
		wp_cache_delete('widget_footer_recent_posts', 'widget');
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Post';
		$number = isset($instance['number']) ? absint($instance['number']) : 3;
		$thumb = isset($instance['thumb']) ? absint($instance['thumb']) : 5;


?>


		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'artmag_bg_fm'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'artmag_bg_fm'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        
<?php
	}
} 
register_widget('artmag_fm_Footer_Recent_Posts_Widget');
//End footer recent posts widgets

?>