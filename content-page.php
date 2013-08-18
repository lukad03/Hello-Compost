
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<figure></figure>
		<header class="page-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	</article><!-- #post -->

