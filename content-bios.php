
		<?php if (has_post_thumbnail()) {?><figure class="bio-img"><?php the_post_thumbnail('bio');?></figure> <?php };?>
		
		<?php $title= get_post_meta(get_the_ID(), 'lk_hello_bio_title', TRUE); ?> 

		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<h2 class="entry-subtitle"><?php echo $title; ?></h2>
		</header><!-- .entry-header -->
		<div class="entry-content bio-entry">
			<?php the_content(); ?>
		</div><!-- .entry-content -->


