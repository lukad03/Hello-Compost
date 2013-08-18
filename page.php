<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="content content-left">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

			</div><!-- .content-inner -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>