<?php
/*
Template Name: How it Works
*/
get_header();?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="content content-left">
				<header class="bios-header"><h1><?php the_title();?></h1></header>

				<div class="steps">

				<?php
				query_posts("post_type=how&post_per_page=-1&orderby=title&order=asc");?>

				<?php if (have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'how' ); ?>

				<?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
				<?php wp_reset_query(); ?>

				</div>

			</div><!-- .content-left -->
			<?php get_sidebar('page');  ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>