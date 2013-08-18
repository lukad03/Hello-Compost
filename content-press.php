<div class="content-inner">
  <h1>Press</h1>

  <div id="press-gallery" class="flexslider">
    <ul class="slides">

  <?php query_posts('post_type=press'); ?>
  <?php while ( have_posts() ) : the_post(); ?>

    <?php
    $quote = get_post_meta(get_the_ID(), 'lk_hello_quote', TRUE);
    $source = get_post_meta(get_the_ID(), 'lk_hello_quote_name', TRUE);   
    $organization = get_post_meta(get_the_ID(), 'lk_hello_quote_title', TRUE); 
    $url = get_post_meta(get_the_ID(), 'lk_hello_quote_url', TRUE);            
    ?>

    <li class="slide">
      	<p class="quote"><?php echo $quote;?></p>
        <p class="quote-attr"><?php echo $source;?>, <?php if($url != ''){?><a href="<?php echo $url;?>"><?php echo $organization;?></a><?php } else{?> <?php echo $organization;?> <?php }?></p>
    </li>

  <?php endwhile; ?>
  <?php wp_reset_query(); ?>
      </ul>
  </div>
</div>