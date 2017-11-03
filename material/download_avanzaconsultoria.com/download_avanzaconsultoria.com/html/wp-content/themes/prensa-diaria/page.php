<?php get_header(); ?>
<?php include(TEMPLATEPATH."/sidebar-left.php");?>
	<div class="content-area">
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="entry">
        <div class="entryin">
		
							<!--header-->
                        <div class="entryhead"> 
							
                            <!--title-->
							<div class="entrytitle">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></div>
                       </div><!--end header-->
					  
						
                       <!--entry -->
					   <div class="entrybody">
                            <div class="entryinbody">
							  <?php the_content('Leer mas … '); ?>
							  
                            
							</div><!--end entry body, inner-->
		  </div>	

		  </div></div><!-- end entry,entry-inner -->

			
		<?php endwhile; endif; ?>
	</div>
<?php include(TEMPLATEPATH."/sidebar-right.php");?>
</div>
<?php get_footer(); ?>