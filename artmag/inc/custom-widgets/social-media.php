<?php 

    add_action('widgets_init','artmag_fm_social_links');

    function artmag_fm_social_links() {
       register_widget('artmag_fm_social_links');
    }

class artmag_fm_social_links extends WP_Widget {
    
    function artmag_fm_social_links() {
        $widget_ops = array('classname' => 'social-links','description' => __('Social Links','artmag-admin-fm'));   
        parent::__construct('social_links',esc_html__('[ CUSTOM ] Social Links ','theme'),$widget_ops);
        }
    
    function widget( $args, $instance ) {
        extract( $args );
    $title = apply_filters('widget_title', esc_attr($instance['title']) );
    $behance = esc_url($instance['behance']);
    $blogger = esc_url($instance['blogger']);
    $dribbble = esc_url($instance['dribbble']);
    $facebook = esc_url($instance['facebook']);
    $flickr = esc_url($instance['flickr']);
    $foursquare = esc_url($instance['foursquare']);
    $googleplus = esc_url($instance['googleplus']);
    $instagram =esc_url($instance['instagram']);
    $linkedin = esc_url($instance['linkedin']);
    $medium = esc_url($instance['medium']);
    $pinterest = esc_url($instance['pinterest']);
    $soundcloud = esc_url($instance['soundcloud']);
    $skype = esc_url($instance['skype']);
    $tumblr = esc_url($instance['tumblr']);
    $twitter = esc_url($instance['twitter']);
    $vimeo = esc_url($instance['vimeo']);
    $whatsapp = esc_url($instance['whatsapp']);
    $youtube = esc_url($instance['youtube']);
    ?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <div class="social-links custom-widget clearfix">
            <ul>
            <?php if ($behance != "") { ?><li class="behance"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Behance","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($behance); ?>"><i class="iconmag iconmag-behance "></i></a></li><?php } ?>
            <?php if ($blogger != "") { ?><li class="blogger"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Blogger","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($blogger); ?>"><i class="iconmag iconmag-blogger "></i></a></li><?php } ?>
            <?php if ($dribbble != "") { ?><li class="dribbble"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Dribbble","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($dribbble); ?>"><i class="iconmag iconmag-dribbble "></i></a></li><?php } ?>
            <?php if ($facebook != "") { ?><li class="facebook"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Facebook","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($facebook); ?>"><i class="iconmag iconmag-facebook "></i></a></li><?php } ?>
            <?php if ($flickr != "") { ?><li class="flickr"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Flickr","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($flickr); ?>"><i class="iconmag iconmag-flickr "></i></a></li><?php } ?>
            <?php if ($foursquare != "") { ?><li class="foursquare"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Foursquare","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($foursquare); ?>"><i class="iconmag iconmag-foursquare "></i></a></li><?php } ?>
            <?php if ($googleplus != "") { ?><li class="google-plus"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Google +","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($googleplus); ?>"><i class="iconmag iconmag-google "></i></a></li><?php } ?>
            <?php if ($instagram != "") { ?><li class="instagram"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Instagram","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($instagram); ?>"><i class="iconmag iconmag-instagram "></i></a></li><?php } ?>
            <?php if ($linkedin != "") { ?><li class="linkedin"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Linkedin","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($linkedin); ?>"><i class="iconmag iconmag-linkedin "></i></a></li><?php } ?>
            <?php if ($medium != "") { ?><li class="medium"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Medium","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($medium); ?>"><i class="iconmag iconmag-medium "></i></a></li><?php } ?>
            <?php if ($pinterest != "") { ?><li class="pinterest"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Pinterest","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($pinterest); ?>"><i class="iconmag iconmag-pinterest "></i></a></li><?php } ?>
            <?php if ($soundcloud != "") { ?><li class="soundcloud"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Soundcloud","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($soundcloud); ?>"><i class="iconmag iconmag-soundcloud "></i></a></li><?php } ?>
            <?php if ($skype != "") { ?><li class="skype"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Skype","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($skype); ?>"><i class="iconmag iconmag-skype "></i></a></li><?php } ?>
            <?php if ($tumblr != "") { ?><li class="tumblr"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Tumblr","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($tumblr); ?>"><i class="iconmag iconmag-tumblr "></i></a></li><?php } ?>
            <?php if ($twitter != "") { ?><li class="twitter"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Twitter","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($twitter); ?>"><i class="iconmag iconmag-twitter "></i></a></li><?php } ?>
            <?php if ($whatsapp != "") { ?><li class="whatsapp"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Whatsapp","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($whatsapp); ?>"><i class="iconmag iconmag-whatsapp "></i></a></li><?php } ?>
            <?php if ($vimeo != "") { ?><li class="vimeo"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Vimeo","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($vimeo); ?>"><i class="iconmag iconmag-vimeo "></i></a></li><?php } ?>
            <?php if ($youtube != "") { ?><li class="youtube"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr__("Youtube","artmag-admin-fm"); ?>" target="_blank" href="<?php echo esc_attr($youtube); ?>"><i class="iconmag iconmag-youtube "></i></a></li><?php } ?>

            </ul>
        </div>
        <?php echo $after_widget; ?>
        <?php 
        }
    
    function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['behance'] = strip_tags( $new_instance['behance'] );
            $instance['blogger'] = strip_tags( $new_instance['blogger'] );
            $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
            $instance['facebook'] = strip_tags( $new_instance['facebook'] );
            $instance['flickr'] = strip_tags( $new_instance['flickr'] );
            $instance['foursquare'] = strip_tags( $new_instance['foursquare'] );
            $instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
            $instance['instagram'] = strip_tags( $new_instance['instagram'] );
            $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
            $instance['medium'] = strip_tags( $new_instance['medium'] );
            $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
            $instance['skype'] = strip_tags( $new_instance['skype'] );
            $instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
            $instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
            $instance['twitter'] = strip_tags( $new_instance['twitter'] );
            $instance['whatsapp'] = strip_tags( $new_instance['whatsapp'] );
            $instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
            $instance['youtube'] = strip_tags( $new_instance['youtube'] );

            return $instance;
    }
    
    function form( $instance ) {

        $defaults = array(
            'title' => __('Socials Links', 'artmag-admin-fm'),
            'behance' => '',
            'blogger' => '',
            'dribbble' => '',
            'facebook' => 'http://facebook.com/2035themes',
            'flickr' => '',
            'foursquare' => '',
            'googleplus' => '',
            'instagram' => '',
            'linkedin' => '',
            'medium' => '',
            'pinterest' => '',
            'skype' => '',
            'soundcloud' => '',
            'tumblr' => '2035themes.twitter.com',
            'twitter' => 'http://twitter.com/2035themes',
            'whatsapp' => '',
            'vimeo' => '',
            'youtube' => '',

            );
            $instance = wp_parse_args( (array) $instance, $defaults );?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_attr__('Title:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php echo esc_attr__('Behance Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'blogger' ); ?>"><?php echo esc_attr__('Blogger Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'blogger' ); ?>" name="<?php echo $this->get_field_name( 'blogger' ); ?>" value="<?php echo $instance['blogger']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php echo esc_attr__('Dribbble Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php echo esc_attr__('Facebook Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php echo esc_attr__('Flickr Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php echo esc_attr__('Foursquare Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" value="<?php echo $instance['foursquare']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php echo esc_attr__('Google Plus Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php echo esc_attr__('Instagram Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php echo esc_attr__('Linkedin Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'medium' ); ?>"><?php echo esc_attr__('Medium Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'medium' ); ?>" name="<?php echo $this->get_field_name( 'medium' ); ?>" value="<?php echo $instance['medium']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php echo esc_attr__('Pinterest Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'skype' ); ?>"><?php echo esc_attr__('Skype Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'skype' ); ?>" name="<?php echo $this->get_field_name( 'skype' ); ?>" value="<?php echo $instance['skype']; ?>"  />
        </p> 
        <p>
        <label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>"><?php echo esc_attr__('Soundcloud Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" value="<?php echo $instance['soundcloud']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php echo esc_attr__('Tumblr Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php echo esc_attr__('Twitter Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>"  />
        </p>   

        <p>
        <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php echo esc_attr__('Vimeo Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>"  />
        </p>   

        <p>
        <label for="<?php echo $this->get_field_id( 'whatsapp' ); ?>"><?php echo esc_attr__('Whatsapp Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'whatsapp' ); ?>" name="<?php echo $this->get_field_name( 'whatsapp' ); ?>" value="<?php echo $instance['whatsapp']; ?>"  />
        </p>   

        <p>
        <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php echo esc_attr__('Youtube Url:', 'artmag-admin-fm'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>"  />
        </p>                

   <?php }} 