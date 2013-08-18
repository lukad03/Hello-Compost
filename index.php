<?php get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

				<header class="entry-header">
					<h1 class="entry-title">Nothing Found</h1>
				</header>

				<div class="entry-content">
					<p>Sorry! No posts found.</p>
				</div>
			<?php endif; ?>

			</article>

		<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>