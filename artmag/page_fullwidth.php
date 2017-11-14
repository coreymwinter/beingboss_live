<?php get_header();
/**
 * Template Name: Full Width Page Template
 *
 * Template for displaying a blank page.
 *
 */

?>
<div class="fitvids pageback"><!-- Container Start --> 
    <div class="row clearfix" style="margin-left: 0px; margin-right: 0px;">

        <div class="col-lg-12 col-sm-12" style="padding-right: 0px; padding-left: 0px;" >
            <div class="page-text clearfix" style="padding: 25px 0 0;">
                <?php  if ( have_posts() ) : while ( have_posts() ) : the_post();
					the_content();
					endwhile; endif;
					wp_reset_postdata();
                ?>
            </div>
		</div><!-- Blog Entry Finish -->     
    </div>
</div><!-- Container Finish --> 
<?php get_footer(); ?>