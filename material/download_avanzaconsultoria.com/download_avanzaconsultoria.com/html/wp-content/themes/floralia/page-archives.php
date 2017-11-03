<?php get_header();?>
      <div class="post">
        <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <div class="entry">
          <h2>Ultimos 20 posts</h2>
          <ul>
            <?php wp_get_archives('type=postbypost&limit=20'); ?>
          </ul>
          <h2>Por categoria</h2>
          <ul>
            <?php wp_list_cats('optioncount=1');?>
          </ul>
          <h2>Por mes</h2>
          <ul>
            <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
          </ul>
          <?php if (function_exists('wp_tag_cloud')) {	?>
          <h2>
            <?php _e('Tags'); ?>
          </h2>
          <p>
            <?php wp_tag_cloud(); ?>
          </p>
          <?php } ?>
        </div>
        <p class="comments"></p>	          
      </div>      
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>