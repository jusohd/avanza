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
							Por <?php the_author() ?> | <?php the_date('F j, Y') ?> - <?php the_time('G:i a'); ?> - Publicado en        				   <?php the_category(', ') ?> <?php edit_post_link(__('Editar'), ''); ?>
							</div>
								
                       </div><!--end header-->
					  
						
                       <!--entry -->
					   <div class="entrybody">
                            <div class="entryinbody">
							  <?php the_content('Leer mas … '); ?>
							  
                           
	
				<p class="singleinfo">
					<small>
						Este articulo fue publicado
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						el <?php the_time('j F de Y') ?> a las <?php the_time() ?>
						y esta archivado en <?php the_category(', ') ?>.
						Puedes suscribirte a los comentarios en el  <?php comments_rss_link('RSS 2.0'); ?> feed. 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir un comentario</a>, o hacer <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu propia web.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios estan cerrados pero puedes hacer <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu propia web.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes ir al final y escribir un comentario. Actualmente no estan habilitados los pings.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Tanto los comentarios como los pings estan cerrados.			
						
						<?php } edit_post_link('Editar esta entrada.','',''); ?>
						
					</small>
				</p>
							</div><!--end entry body, inner-->
						</div>	
						
						
						<!--footer -->
						<div class="entryfoot">
						
						<div class="entrymcomm">
						<div class="entrymcommtxt">
						<?php comments_popup_link('(Se el primero en escribir un comentario)', '1 comentario', '% Comentarios'); ?>
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

		<h2 class="center">Not Found</h2>
		<p class="center"><?php _e("Lo siento, pero estas buscando algo que no esta aqui."); ?></p>
		
	<?php endif; ?>
	</div>
<?php include(TEMPLATEPATH."/sidebar-right.php");?>
</div>
<?php get_footer(); ?>