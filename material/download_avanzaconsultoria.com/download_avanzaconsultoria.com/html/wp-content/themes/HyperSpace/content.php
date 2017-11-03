<?php 
global $options;
$location = icore_get_location(); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content">
		
		<?php if( isset($options['blog_style']) && $options['blog_style'] == '1' ) { ?>
			
			<div class="post-content-full">
                <h2><a href="<?php the_permalink() ?>" class="title" title="Read <?php the_title_attribute(); ?>"><?php the_title();  ?></a></h2>
                <div class="meta">
                    <?php the_time('M j, Y | ');  _e('Posted by ','HyperSpace');  the_author_posts_link(); ?> <?php _e('in ','HyperSpace');  the_category(', ') ?> | <?php comments_popup_link(__('0 comments','HyperSpace'), __('1 comment','HyperSpace'), '% '.__('comments','HyperSpace')); ?>
                </div>  <!-- .meta  -->
                 <?php the_content(); ?>
			</div>

		<?php } else { ?>
	
              	<h2><a href="<?php the_permalink() ?>" class="title" title="Read <?php the_title_attribute(); ?>"><?php the_title();  ?></a></h2>
        
            	<?php if ( has_post_thumbnail() && isset($options[$location . '_thumb']) && $options[$location . '_thumb'] == '1' ) : ?>
                		<div class="index-thumb loading raised drop-shadow"> 
            				<a href="<?php the_permalink() ?>" title="Read <?php the_title_attribute(); ?>"><?php the_post_thumbnail("entry-thumb"); ?></a>
            			</div> 
            	<?php endif; ?>

            <div class="post-desc">      
            	<?php the_excerpt(); ?>         
            </div>
			
            <div class="meta"> 
                <ul class="meta-list">                    
                    <li class="author"><?php the_author_posts_link(); ?></li>                    
                    <li class="date"><?php the_time('M j, Y'); ?></li>                 
                    <li class="category"><?php the_category(', ') ?></li>               
                    <li class="comments"><?php comments_popup_link(__('0 comments','HyperSpace'), __('1 comment','HyperSpace'), '% '.__('comments','HyperSpace')); ?></li>
                </ul>
            </div><!-- .meta  -->
   
		<?php } ?>  
            
	</div><!-- .post-content  -->         
</article>