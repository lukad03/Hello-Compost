<?php
/*
Template Name: Our Team
*/
get_header();?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="content content-left">

				<?php
				// get all the categories from the database
				$cats = get_categories('taxonomy=groups&orderby=asc'); 

				// loop through the categries
				foreach ($cats as $cat) {
				// setup the cateogory ID
				$cat_id= $cat->term_id;
				$cat_slug= $cat->slug;
				// Make a header for the cateogry
				echo '<header class="bios-header"><h1>'.$cat->name.'</h1></header>';
				// create a custom wordpress query

				query_posts("groups=$cat_slug&post_per_page=-1&orderby=title&order=asc");?>

				<?php if (have_posts()) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('bio-images'); ?>>
				<?php get_template_part( 'content', 'bios' ); ?>
				</article>

				<?php endwhile; endif; // done our wordpress loop. Will start again for each category ?>
				<?php wp_reset_query(); ?>
				<?php } // done the foreach statement ?>

			</div><!-- .content-left -->
			<?php get_sidebar('page');  ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>