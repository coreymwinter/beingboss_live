<?php
/**
 * Template Name: Full Width - Header Image
 *
 *
 */
get_header();
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<?php $postid = get_the_ID(); ?>
							<?php $header_image = get_post_meta( $postid, 'bbpage_header_image', true ); ?>
							<?php $header_text = get_post_meta( $postid, 'bbpage_header_text', true ); ?>							


							<header class="entry-header">

								<figure class="bbpage-header">
									<img src="<?php echo $header_image; ?>" style="position:relative;">
									<div class="container headertext"><?php echo $header_text; ?></div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php the_content(); ?>

							</div><!-- .entry-content -->

							<footer class="entry-footer">


							</footer><!-- .entry-footer -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
