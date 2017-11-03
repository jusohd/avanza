<?php get_header(); ?>
    
<div id="content">
    <div id="left">
		<?php if (have_posts()) : ?>
			
			<?php if ( 'gallery' == get_post_type() ) { ?>
				  	<div class="galleries">
			<?php } ?>
			
			<!-- The Loop -->
    		<?php while (have_posts()) : the_post(); ?>
					
				<?php if ( 'gallery' == get_post_type() ) { ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="gallery-image-wrap">
					            <?php if ( has_post_thumbnail() ) { ?>
						
									<?php	$thumbid = get_post_thumbnail_id($post->ID);
										$img = wp_get_attachment_image_src($thumbid,'full');
										$img['title'] = get_the_title($thumbid); ?>
										
											<?php the_post_thumbnail("gallery-thumb"); ?>
										
										<a href="<?php echo $img[0]; ?>" class="zoom-icon" rel="shadowbox" ></a>
										
										<a href="<?php the_permalink(); ?>" class="link-icon"></a>
			            		<?php } else { ?>
										<a href="<?php the_permalink(); ?>">
										<?php echo '<img src="'.get_stylesheet_directory_uri().'/images/no-portfolio-archive.png" class="wp-post-image"/>'; ?>			</a>
								<?php } ?>
								
						</div>
						<h2 class="gallery-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</article><!-- #post-<?php the_ID(); ?> -->

				<?php } else { ?>
 
    	 		<?php get_template_part( 'content', get_post_format() ); ?>
				
				<?php } ?>
				
				

  			<?php endwhile; ?>

			<?php if ( 'gallery' == get_post_type() ) { ?>
					</div> <!-- .galleries -->
			<?php } ?>
			
			<?php if(function_exists('wp_pagenavi')) { ?>
				 
					<?php wp_pagenavi(); ?>
				
				<?php } else { ?> 
						
					<?php get_template_part( 'navigation', 'index' ); ?>
						 
				<?php } else : ?>
			
					<?php get_template_part( 'no-results', 'index' ); ?>
			
				<?php endif; ?>
       
    </div> <!--  #left  -->   
	<?php if ( 'gallery' != get_post_type() ) get_sidebar(); ?>
</div>   <!--  #content  -->
<?php get_footer();?>
