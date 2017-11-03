<?php get_header();?>

<?php 
global $shortname;
$location = icore_get_location();   
?>

    <div id="left">
            
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   
                    <div class="post-content"> 
                        <div id="single-title"> 
                               <h1 class="title"><?php  the_title();  ?></h1>
                               </div>
                              <?php if ( has_post_thumbnail() && isset($options[$location . '_thumb']) && $options[$location . '_thumb'] == '1' ) :

								  	$thumbid = get_post_thumbnail_id($post->ID);
									$img = wp_get_attachment_image_src($thumbid,'full');
									$img['title'] = get_the_title($thumbid); ?>

		                            <div class="thumb loading raised"> 
		                            	<?php the_post_thumbnail("large"); ?>
		                            	<a href="<?php echo $img[0]; ?>" class="zoom-icon" rel="shadowbox" title="<?php echo $img['title'];?>" ></a>                                    		
									</div> <!-- .thumbnail  -->                        
							<?php endif; ?>
                        
                        <?php the_content(); ?> 
                        
                         <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                        
                        
                    </div>  <!--  end .post-content  -->
                    <div class="meta">
                        <?php the_time('M j, Y | ');  _e('Posted by ','HyperSpace');  the_author_posts_link(); ?> | <?php comments_popup_link(__('0 comments','HyperSpace'), __('1 comment','HyperSpace'), '% '.__('comments','HyperSpace')); ?>
                    </div>  <!--  end .meta  -->
	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','HyperSpace'); ?></p>

<?php endif; ?>
            
    </div> <!--  end #left  -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
