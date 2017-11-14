<?php get_header();
global $artmag_opt; 
$temp_post = get_post_meta( get_the_ID(), 'artmag_fm_selectpostsidebar', true );

if($temp_post == ""){
    $temp_post = esc_attr($artmag_opt['page-blog_sidebar']);
}
$temp_default = esc_attr($artmag_opt['page-blog_sidebar']);
if($temp_post == $temp_default){
    $blog_post_sidebar = $temp_default;
}else{
    $blog_post_sidebar = $temp_post;
}
?>
<div class="container fitvids pageback"><!-- Container Start --> 
    <div class="row clearfix">

        <?php if($artmag_opt['page-sidebar-type'] == "left" ){ ?> <!-- Sidebar Left Start (If selected) -->
            <aside class="col-lg-3 col-sm-4 sidebar">
                <?php if ( is_active_sidebar( $blog_post_sidebar ) ) { ?>
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
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
        <?php } ?><!-- Sidebar Left Finish (If selected) -->

        <?php if($artmag_opt['page-sidebar-type'] == "none" ){ ?> <div class="col-lg-12 col-sm-12" ><?php } else { ?> <div class="col-lg-9 col-sm-8" > <?php } ?>
            <div class="page-text clearfix">
                <?php  if ( have_posts() ) : while ( have_posts() ) : the_post();
                the_content();
                endwhile; endif;
                wp_reset_postdata();
                ?>
            </div>
        <?php if($artmag_opt['page-comment-visibility'] == 1 ){ comments_template(); }  ?><!-- Comments -->
    </div><!-- Blog Entry Finish -->     
    <?php if($artmag_opt['page-sidebar-type'] == "right" ){ ?> <!-- Sidebar Right Start (If selected) -->
        <aside class="col-lg-3 col-sm-4 sidebar">
            <?php if ( is_active_sidebar( $blog_post_sidebar ) ) { ?>
                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
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
    <?php } ?><!-- Sidebar Right Start (If selected) -->
    </div>
</div><!-- Container Finish --> 
<?php get_footer(); ?>