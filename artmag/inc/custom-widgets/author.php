<?php  

    add_action( 'widgets_init', 'init_author_widget' );
    function init_author_widget() { return register_widget('author_widget'); }
    
    class author_widget extends WP_Widget {
        function author_widget() {
            parent::__construct( 'init_author_widget', $name = '[ CUSTOM ] Author Box Widget ');
        }

	
	function widget( $args, $instance ) {
		extract( $args );
    $title = $instance['title'];
    $author_image = $instance['author_image'];
    $description = $instance['description'];
    ?>
        <?php echo $before_widget; ?>
        <?php if(!empty($title)) { echo $before_title . $title . $after_title; }; ?>
        <div class="author-widget custom-widget clearfix">
                <?php if($author_image){ ?>
                <div class="author-avatar">
                    <img alt="Author" class="img-responsive" src="<?php echo esc_attr($author_image); ?>">
                </div>
                <?php } ?>
                <div class="margint10 author-text">
                    <?php if($description != "" ){ ?><p><?php echo esc_attr($description); ?></p><?php } ?>
                </div>

        </div>
        <?php echo $after_widget; ?>
        <?php 
	    }
	
	function update( $new_instance, $old_instance ) {
		    $instance = $old_instance;
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['author_image'] = strip_tags( $new_instance['author_image'] );
            $instance['description'] = strip_tags( $new_instance['description'] );
		    return $instance;
	}
	
    function form( $instance ) {

		$defaults = array(
            'title' => 'Manifesto',
            'author_image' => '',
            'description' => '',
 			);
		    $instance = wp_parse_args( (array) $instance, $defaults );?>
        
        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_attr__('Title:', 'artmag_bg_fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>"  />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('author_image')); ?>">Author Image :</label><br />
            <?php
                if ( $instance['author_image'] != '' ) :
                    echo '<img alt="" class="custom_media_image_2" src="' . $instance['author_image'] . '" style="margin:0;padding:0;width:100%;float:left;display:inline-block" /><br />';
                endif;
            ?>

            <input type="text" class="widefat custom_media_url_2" name="<?php echo esc_attr($this->get_field_name('author_image')); ?>" id="<?php echo esc_attr($this->get_field_id('author_image')); ?>" value="<?php echo esc_attr($instance['author_image']); ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_2" id="custom_media_button_2" name="<?php echo esc_attr($this->get_field_name('author_image')); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>

        <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'description' )); ?>"><?php echo esc_attr__('Description:', 'artmag_bg_fm'); ?></label>
        <textarea class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'description' )); ?>"><?php echo esc_attr($instance['description']); ?></textarea>
        </p>



            

   <?php }} 