<?php get_header(); ?>

	<div id="primary" class="site-content home">
		<section id="home-gallery">
			<?php get_template_part('content-gallery'); ?>
		</section><!-- #home-gallery -->
		
		<section id="mission-statement" class="content">

			<?php query_posts('page_id=17'); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
		
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>

		</section><!-- #mission-statement -->

		<section id="how-it-works" role="main" class="content home-content">
			<?php get_template_part('content-how_it_works'); ?>
		</section>
		<section id="press" role="main" class="content home-content">
			<?php get_template_part('content-press'); ?>
		</section>
	</div>

<?php get_footer(); ?>