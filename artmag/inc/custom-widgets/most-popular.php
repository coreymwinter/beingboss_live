<?php

//remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

global $exclude;
$exclude=array();

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
        
            if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }   
    return $count.' Views'; 
}
/*
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
*/
// Add view counter to each page

add_filter ('the_content', 'view_counter');
function view_counter($content) {
  if(is_single() && !is_page()) {
      //setPostViews(get_the_ID());
  }
   return $content;
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views','artmag');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

// add widget to sidebar

class PopularPostsWidget extends WP_Widget
{
  function PopularPostsWidget()
  {
    $widget_ops = array('classname' => 'PopularPostsWidget', 'description' => 'Displays a list of the most viewed content.' );
    parent::__construct('PopularPostsWidget',esc_html__('[ CUSTOM ] Most Popular Post ','theme'),$widget_ops);
      }
 


    function form( $instance ) {

    $defaults = array(
            'title' => 'Most Popular',
            'max' => '4',
            'slider' => '',
      );
        $instance = wp_parse_args( (array) $instance, $defaults );?>


        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_attr__('Title:','artmag_bg_fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'max' ); ?>"><?php echo esc_attr__('Number of posts/pages to show:','artmag_bg_fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'max' ); ?>" name="<?php echo $this->get_field_name( 'max' ); ?>" value="<?php echo $instance['max']; ?>" />
        </p>
        
         <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['slider'], 'on'); ?> id="<?php echo $this->get_field_id('slider'); ?>" name="<?php echo $this->get_field_name('slider'); ?>" /> 
            <label for="<?php echo $this->get_field_id('slider'); ?>"><?php echo esc_attr__('Show in Slider', 'artmag_bg_fm'); ?></label>
        </p>


        <?php
 }
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['max'] = $new_instance['max'];
    $instance['exclude'] = $new_instance['exclude'];
    $instance['showviews'] = $new_instance['showviews'];
    $instance['reset'] = $new_instance['reset'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 $exclude=array();
  echo $before_widget;


  $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
  $max = empty($instance['max']) ? ' ' : apply_filters('widget_title', $instance['max']);
  $showviews = empty($instance['showviews']) ? ' ' : apply_filters('widget_title', $instance['showviews']);
  $exclude = empty($instance['exclude']) ? ' ' : apply_filters('widget_title', $instance['exclude']);
  $reset = empty($instance['reset']) ? ' ' : apply_filters('widget_title', $instance['reset']);
     if (!empty($title))
      echo $before_title . $title . $after_title;      
 
    // WIDGET CODE GOES HERE        
?>

   
      <div class="recent-post-custom">
     

<?php 
//setPostViews(get_the_ID());
$ex=explode(",",$exclude);
$argswp = array('meta_key'=> 'post_views_count','posts_per_page'=>$max,'ignore_sticky_posts'    => 1,'orderby'=>'meta_value_num','order'=>'DESC','post_type' => array('post'), 'post__not_in' =>$ex); ?>
<?php
$the_query = new WP_Query($argswp);
if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 
if ($reset=="Yes") { 
$id=get_the_ID();
update_post_meta($id, 'post_views_count','0');
}
else {
$reset="No";
}

?>


               <div class="recent-post-box marginb20 clearfix">
                  <div class="recent-post-image"> 
                    <?php if (has_post_thumbnail() ){ the_post_thumbnail('thumbnail'); } else { echo '<img alt="" src="'.IMAGES.'/slider-no-image-3.jpg">'; } ?> 
                  </div>
                  <div class="recent-post-title-cont"> 
                    <a class="widgetlink" href="<?php the_permalink(); ?>"> <?php if(get_the_title() != "" ) { the_title(); } else { echo get_the_time('j F'); } ?> </a>
                     <div class="post-element clearfix">
                          <ul>
                              <li><span class="author-by"><?php echo esc_attr__("by","artmag"); ?></span> <?php the_author_posts_link(); ?></li>
                          </ul>
                      </div>
                  </div>
                </div>

          

<?php endwhile; wp_reset_postdata(); endif; ?>
       
          </div>
<?php 

// END WIDGET CODE

    echo $after_widget;  
}
}
add_action( 'widgets_init', create_function('', 'return register_widget("PopularPostsWidget");') );

?>