<?php get_header();?>

<?php 
global $options;  
?>

<div id="left">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    
				<div class="post-content">

                    <?php if ( has_post_thumbnail() ) :

						  	$thumbid = get_post_thumbnail_id($post->ID);
							$img = wp_get_attachment_image_src($thumbid,'full');
							$img['title'] = get_the_title($thumbid); ?>
								       
                            <div class="thumb loading raised"> 
                            	<?php the_post_thumbnail("large"); ?>
                            	<a href="<?php echo $img[0]; ?>" class="zoom-icon" title="<?php echo $img['title'];?>" ></a>                                    		
							</div> <!-- .thumbnail  -->                        
					<?php endif; ?>   
                        
					<div id="single-title"> 
                    	<h1 class="title"><?php  the_title();  ?></h1>
                    </div>

                    <?php the_content(); ?> 

				</div>  <!-- .post-content  -->
					
					<footer class="meta">
						<?php echo get_the_term_list( $post->ID, 'pcategory', 'Category: ', ', ', '' )."</br>";
							  echo get_the_term_list( $post->ID, 'ptag', 'Tags: ', ', ', '' )."</br>"; ?>
					</footer><!-- #entry-meta -->
					
					<?php previous_post_link( '<div class="alignleft pagination-prev">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'HyperSpace' ) . '</span> %title' ); ?>
					<?php next_post_link( '<div class="alignright pagination-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'HyperSpace' ) . '</span>' ); ?>


			<?php endwhile; else: ?>

			<p><?php _e('Sorry, no posts matched your criteria.','HyperSpace'); ?></p>

		<?php endif; ?>
		
	</article> 
</div> <!--  #left  -->
<?php get_footer(); ?>