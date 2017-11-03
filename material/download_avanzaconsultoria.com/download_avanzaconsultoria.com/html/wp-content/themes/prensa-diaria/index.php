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
							<!--time-->
							<div class="entrytime">
							Por <?php the_author() ?> | <?php the_date('j F, Y') ?> a las <?php the_time('G:i'); ?> - Escrito en        				   <?php the_category(', ') ?> <?php edit_post_link(__('Editar'), ''); ?>
							</div>
								
                       </div><!--end header-->
					  
						
                       <!--entry -->
					   <div class="entrybody">
                            <div class="entryinbody">
							  <?php the_content('Leer mas …'); ?>
							  
                            
							</div><!--end entry body, inner-->
		  </div>	
						
						
						<!--footer -->
						<div class="entryfoot">
						
						<div class="entrymcomm">
						<div class="entrymcommtxt">
						<?php comments_popup_link('(Se el primero en escribir un comentario)', '1 Comentario', '% Comentarios'); ?>
                        </div>
						</div><!-- end comments-->
						
						
                    </div><!-- end entry footer -->
					
		  </div></div><!-- end entry,entry-inner -->


<div class="spaceforentry"></div> 


<a name="comments"></a>
			<?php comments_template(); ?>
			
			<!--
			<?php trackback_rdf(); ?>
			-->
			
		<?php endwhile; ?>
		
		
					
        <div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>
					  
						
                       
				
					
				
	<?php else : ?>

		<h2 class="center">No encontrado</h2>
		<p class="center"><?php _e("Lo siento, pero lo que buscas no esta aqui."); ?></p>
		
	<?php endif; ?>
	</div>
<?php include(TEMPLATEPATH."/sidebar-right.php");?>
</div>
<?php get_footer(); ?>