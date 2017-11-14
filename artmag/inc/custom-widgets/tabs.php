<?php
class wpt_widget extends WP_Widget {
    function __construct() {
        
        // add image sizes and load language file
        add_action( 'init', array(&$this, 'wpt_init') );
        
        // ajax functions
        //add_action('wp_ajax_wpt_widget_content', array(&$this, 'ajax_wpt_widget_content'));
        //add_action('wp_ajax_nopriv_wpt_widget_content', array(&$this, 'ajax_wpt_widget_content'));
        
        // css
        //add_action('wp_enqueue_scripts', array(&$this, 'wpt_register_scripts'));
        //add_action('admin_enqueue_scripts', array(&$this, 'wpt_admin_scripts'));
        
        $widget_ops = array('classname' => 'widget_wpt', 'description' => esc_html__('Display selected categories in menu', 'artmag_bg_fm'));
        $control_ops = array('width' => 300, 'height' => 350);
        parent::__construct('wpt_widget', esc_html__('[ CUSTOM ] Mega Menu Tabs ', 'artmag_bg_fm'), $widget_ops, $control_ops);
    }   
    
    function wpt_init() {

        
        //add_image_size( 'wp_review_small', 65, 65, true ); // small thumb
        //add_image_size( 'wp_review_large', 320, 240, true ); // large thumb
    }

    function getCatName($catname){
        $cat = get_term_by( 'slug', $catname, 'category');
        if(!empty($cat)){
            return $cat->name;
        }
    }
/*
    function wpt_admin_scripts($hook) {
        if ($hook != 'widgets.php')
            return;
        wp_register_script('wpt_widget_admin', get_template_directory_uri() . '/js/widget/wpt-admin.js', array('jquery'));  
        wp_enqueue_script('wpt_widget_admin');
    }
    function wpt_register_scripts() { 
        // JS    
        wp_register_script('wpt_widget', get_template_directory_uri() . '/js/widget/wp-tab-widget.js', array('jquery'));     
        wp_localize_script( 'wpt_widget', 'wpt',         
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )) 
        );        
    }  
*/        
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'category1' => '', 'category2' => '', 'category3' => '', 'category4' => '') );
        extract($instance);
        ?>
        <div class="wpt_options_form">
        
        <h4><?php esc_html_e('Select Tabs(Please write category slug)', 'artmag_bg_fm'); ?></h4>
        
        <div class="wpt_select_tabs">
            <p>
                <label for="<?php echo $this->get_field_id( 'category1' ); ?>"><?php echo esc_attr__('Category 1:','artmag_bg_fm'); ?></label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'category1' ); ?>" name="<?php echo $this->get_field_name( 'category1' ); ?>" value="<?php echo $instance['category1']; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'category2' ); ?>"><?php echo esc_attr__('Category 2:','artmag_bg_fm'); ?></label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'category2' ); ?>" name="<?php echo $this->get_field_name( 'category2' ); ?>" value="<?php echo $instance['category2']; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'category3' ); ?>"><?php echo esc_attr__('Category 3:','artmag_bg_fm'); ?></label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'category3' ); ?>" name="<?php echo $this->get_field_name( 'category3' ); ?>" value="<?php echo $instance['category3']; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'category4' ); ?>"><?php echo esc_attr__('Category 4:','artmag_bg_fm'); ?></label>
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'category4' ); ?>" name="<?php echo $this->get_field_name( 'category4' ); ?>" value="<?php echo $instance['category4']; ?>" />
            </p>
        </div>
        <div class="clear"></div>

        </div><!-- .wpt_options_form -->
        <?php 
    }   
    
    function update( $new_instance, $old_instance ) {   
        $instance = $old_instance;    
        $instance['tabs'] = $new_instance['tabs'];  
        $instance['category1'] = $new_instance['category1'];  
        $instance['category2'] = $new_instance['category2'];  
        $instance['category3'] = $new_instance['category3'];  
        $instance['category4'] = $new_instance['category4'];   
        return $instance;   
    }   

    function widget( $args, $instance ) {   
        extract($args);     
        extract($instance);    
        wp_enqueue_script('wpt_widget'); 
        wp_enqueue_style('wpt_widget');  
        if (empty($tabs)) $tabs = array('category2' => 1, 'category1' => 1, 'category3' => 1, 'category4' => 1);    
        $tabs_count = count($tabs);     
        if ($tabs_count <= 1) {       
            $tabs_count = 1;       
        } elseif($tabs_count > 3) {   
            $tabs_count = 4;      
        }


        
        
        $available_tabs = array('category1' => $this->getCatName($instance['category1']), 
            'category2' => $this->getCatName($instance['category2']), 
            'category3' => $this->getCatName($instance['category3']), 
            'category4' => $this->getCatName($instance['category4']));
            
        //array_multisort($tab_order, $available_tabs);

        $ibo = array_filter($available_tabs);
        $randid = rand(10000,99999);
        $randid1 = $randid + 1;
        $randid2 = $randid + 2;
        $randid3 = $randid + 3;
        $randid4 = $randid + 4;
        $ct = 1;
        ?>  
       
        <div class="wpt_widget_content" id="<?php echo esc_attr($widget_id); ?>_content">     
            <div class="wpt-tabs tabbed-area col-lg-2 col-sm-2 <?php echo "has-$tabs_count-"; ?>tabs">
                <?php foreach ($ibo as $tab => $label) { ?>
                    <?php if (!empty($tabs[$tab])): ?>
                        <div class="tab_title"><a href="#<?php echo $tab; ?>-tab-content<?php echo $randid + $ct; ?>" id="<?php echo $tab; ?>-tab<?php echo $randid + $ct; ?>"><?php echo $label; ?></a></div>   
                    <?php endif; $ct++;?>
                <?php } ?> 
            </div> <!--end .tabs--> 
            <div class="inside tab-content col-lg-10 col-sm-10">        
                <?php if (!empty($tabs['category1'])): ?> 
                    <div id="category1-tab-content<?php echo $randid1; ?>" class="tab-content tab-pane fade active in">      
                <?php
                $argswp = array('post_type' => "post", 'posts_per_page'  => 3, 'post_status' => "publish", 'category_name' =>  $category1, 'ignore_sticky_posts'=> 1);
                $the_query = new WP_Query($argswp);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, 'artmag-two-grid');
        $image = $image[0];
}else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'artmag-two-grid');
        $image = $image[0]; 
}
                ?>
                    <div class="category1-post-box col-lg-4 col-sm-4 clearfix">
                        <div class="index-post-media">
                            <div class="media-materials clearfix">
                            <a href="<?php the_permalink(); ?>"><img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>" /></a>
                            </div>                
                            <div class="blog-entry-title">                         
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                            </div>
                        </div>
                    </div>
                    <?php 
                endwhile; wp_reset_postdata(); endif;?>
                    </div> <!--end #category1-tab-content-->       
                <?php endif; ?>       
                <?php if (!empty($tabs['category2'])): ?>  
                    <div id="category2-tab-content<?php echo $randid2; ?>" class="tab-content tab-pane fade">        
                <?php
                $argswp = array('post_type' => "post", 'posts_per_page'  => 3, 'post_status' => "publish", 'category_name' =>  $category2, 'ignore_sticky_posts'=> 1);
                $the_query = new WP_Query($argswp);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, 'artmag-two-grid');
        $image = $image[0];
}else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'artmag-two-grid');
        $image = $image[0]; 
}
                ?>
                    <div class="category1-post-box col-lg-4 col-sm-4 clearfix">
                        <div class="index-post-media">
                            <div class="media-materials clearfix">
                            <a href="<?php the_permalink(); ?>"><img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>" /></a>
                            </div>                
                            <div class="blog-entry-title">                         
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                            </div>
                        </div>
                    </div>
                    <?php 
                endwhile; wp_reset_postdata(); endif;?>
                    </div> <!--end #category2-tab-content-->       
                <?php endif; ?>                     
                <?php if (!empty($tabs['category3'])): ?>      
                    <div id="category3-tab-content<?php echo $randid3; ?>" class="tab-content tab-pane fade">
                <?php
                $argswp = array('post_type' => "post", 'posts_per_page'  => 3, 'post_status' => "publish", 'category_name' =>  $category3, 'ignore_sticky_posts'=> 1);
                $the_query = new WP_Query($argswp);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, 'artmag-two-grid');
        $image = $image[0];
}else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'artmag-two-grid');
        $image = $image[0]; 
}
                ?>
                    <div class="category1-post-box col-lg-4 col-sm-4 clearfix">
                        <div class="index-post-media">
                            <div class="media-materials clearfix">
                            <a href="<?php the_permalink(); ?>"><img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>" /></a>
                            </div>                
                            <div class="blog-entry-title">                         
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                            </div>
                        </div>
                    </div>
                    <?php 
                endwhile; wp_reset_postdata(); endif;?>
                    </div> <!--end #category3-tab-content-->     
                <?php endif; ?>            
                <?php if (!empty($tabs['category4'])): ?>       
                    <div id="category4-tab-content<?php echo $randid4; ?>" class="tab-content tab-pane fade">  
                <?php
                $argswp = array('post_type' => "post", 'posts_per_page'  => 3, 'post_status' => "publish", 'category_name' =>  $category4, 'ignore_sticky_posts'=> 1);
                $the_query = new WP_Query($argswp);
                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
if(!has_post_thumbnail(get_the_id())){
        global $artmag_opt;
        $no_image = $artmag_opt['post-no-image']['id'];
        $image = wp_get_attachment_image_src( $no_image, 'artmag-two-grid');
        $image = $image[0];
}else{
        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'artmag-two-grid');
        $image = $image[0]; 
}
                ?>
                    <div class="category1-post-box col-lg-4 col-sm-4 clearfix">
                        <div class="index-post-media">
                            <div class="media-materials clearfix">
                            <a href="<?php the_permalink(); ?>"><img alt="" class="img-responsive rsp-img-center" src="<?php echo esc_attr($image); ?>" /></a>
                            </div>                
                            <div class="blog-entry-title">                         
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4> 
                            </div>
                        </div>
                    </div>
                    <?php 
                endwhile; wp_reset_postdata(); endif;?>
                    </div> <!--end #category4-tab-content-->  
                <?php endif; ?> 
            </div> <!--end .inside -->  
        </div><!--end #tabber -->    
        <?php    
        // inline script 
        // to support multiple instances per page with different settings   
        
        unset($instance['tabs'], $instance['tab_order']); // unset unneeded  
        ?>  

       
        <?php 
    }  
    
     
    function ajax_wpt_widget_content() {     
        $tab = $_POST['tab'];       
        $args = $_POST['args'];  
        if (!is_array($args))      
        return '';
        $category1 = $args['category1']; 
        $category2 = $args['category2']; 
        $category3 = $args['category3']; 
        $category4 = $args['category4'];

        /* ---------- Tab Contents ---------- */    
        switch ($tab) {        
        
        }              
        die(); // required to return a proper result  
    }    
}
add_action( 'widgets_init', create_function( '', 'register_widget( "wpt_widget" );' ) );

// unregister MTS Tabs Widget and Tabs Widget v2
add_action('widgets_init', 'unregister_mts_tabs_widget', 100);
function unregister_mts_tabs_widget() {
    unregister_widget('mts_Widget_Tabs_2');
    unregister_widget('mts_Widget_Tabs');
}

?>