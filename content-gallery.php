<div id="main-gallery" class="flexslider">
  <ul class="slides">

    <?php query_posts('post_type=gallery&orderby=menu_order&order=asc'); ?>
    <?php while ( have_posts() ) : the_post(); ?>

    <?php
    $galleryurl= get_post_meta(get_the_ID(), 'lk_hello_gallery_url', TRUE);
    $buttontxt= get_post_meta(get_the_ID(), 'lk_hello_gallery_buttontxt', TRUE);   
    $buttonurl = get_post_meta(get_the_ID(), 'lk_hello_gallery_buttonurl', TRUE);
    $mailchimp= get_post_meta(get_the_ID(), 'lk_hello_gallery_mailchimp', TRUE);       
    ?>

    <li id="post-<?php the_ID(); ?>" class="slide play3">
     <?php if (has_post_thumbnail()) { the_post_thumbnail('gallery-massive'); }?>
     
     <?php if($buttontxt != ''||$buttonurl != ''){ ?>

     <?php if($buttonurl != ''){ ?>
          <?php video_embed($galleryurl);?>
     <?php }?>

      <div class="flex-caption main-caption">
      	<h1 class="fadeInUpBig animated"><?php the_title();?></h1>
      		<div id="play-<?php the_ID(); ?>" class="fadeInUpBig animated fadein <?php if($buttonurl != ''){?>button-video<?php }else{?>button-gallery<?php };?>">
      			 <?php if($buttonurl != ''){ ?>Learn More<?php }else{?><div class="fadeout"><?php echo '<a class ="butz" href="'.$buttonurl.'">'.$buttontxt.'</a>'; ?></div><?php }?>
      		</div>
      </div>
      <?php }?>

    </li>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
  </ul>
</div>