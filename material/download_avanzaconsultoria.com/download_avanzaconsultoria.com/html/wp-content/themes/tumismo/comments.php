<?php
// Do not access this file directly
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) { die (__('Please do not load this page directly. Thanks!','unnamed')); }
		
// Password Protection
if (!empty($post->post_password)) { if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
?>
		
		<p class="center"><?php _e('Este articulo esta protegido con clave. Introduce tu clave para escribir un comentario.','unnamed'); ?></p>
		<?php return; } } ?>
		
		<?php if (($comments) or ('open' == $post->comment_status)) : ?>
		
		<div class="comment-section">
			<h4 id="comments" class="section-title"><?php printf(__('%1$s %2$s en &#8220;%3$s&#8221;','unnamed'), '<span id="comments">' . get_comments_number() . '</span>', (1 == $post->comment_count) ? __('Comentario','unnamed'): __('Comentarios','unnamed'), the_title('', '', false)); ?></h4>
			<?php /* Seperate comments and pings */
					if ( $post->comment_count > 0 ) {
						$countComments = 0;
						$countPings    = 0;
						
						$comment_list = array();
						$ping_list    = array();
		
						foreach ($comments as $comment) {
							if ( 'comment' == get_comment_type() ) {
								$comment_list[++$countComments] = $comment;
							} else {
								$ping_list[++$countPings] = $comment;
							}
						}
					}
			?>
				
			<hr />
			<?php /* Check for comments */ if ( $countComments > 0 ) { ?>
			<ol id="commentlist">
				
				<?php foreach ($comment_list as $comment_index => $comment) { ?>
				<li id="comment-<?php comment_ID(); ?>">
				<?php if (function_exists('gravatar')) { ?> <a href="http://www.gravatar.com/" title="<?php _e('Que es esto?','unnamed'); ?>"><img src="<?php gravatar("X", 32,  get_bloginfo('template_url')."/images/default_gravatar.png"); ?>" class="gravatar" alt="<?php _e('Gravatar Icono','unnamed'); ?>" /></a>
				<?php } ?>
					<div class="comment-header"><a href="#comment-<?php comment_ID(); ?>" class="counter" title="<?php _e('Enlace permanente a este comentario','unnamed'); ?>"><?php echo $comment_index; ?></a><?php comment_author_link() ?></div>
					<div class="comment-content"><?php comment_text() ?></div>
					<div class="comment-footer">
						<span class="metacmt"><?php _e('Comentado el ','unnamed') ?> <a href="#comment-<?php comment_ID() ?>" title="Enlace permanente al comentario"> <?php comment_date(__('j M, Y','unnamed')) ?> <?php _e(' a las ','unnamed') ?><?php comment_time() ?></a></span>&nbsp;&nbsp;<?php if ( $user_ID ) { edit_comment_link(__('Editar','unnamed'),'<span class="metaedit">','</span>'); } ?>
					</div>
					
					<?php if ('0' == $comment->comment_approved) { ?>
					<p class="alert"><strong><?php _e('Tu comentario esta pendiente de aprobacion.','unnamed'); ?></strong></p>
					<?php } ?>
				</li>
				<?php } /* End foreach comment */ ?>
				
			</ol>
			<!-- END #commentlist -->
			<?php } /* end comment check */ ?>
			
			<?php /* Check for Pings */ if ( $countPings > 0 ) { ?>
			<ol id="pinglist">
			
				<?php foreach ($ping_list as $ping_index => $comment) { ?>
				<li id="comment-<?php comment_ID(); ?>">
					<div class="comment-header"><a href="#comment-<?php comment_ID() ?>" title="<?php _e('Enlace permanente a este comentario','unnamed'); ?>" class="counter"><?php echo $ping_index; ?></a><?php comment_author_link() ?></div>
					<div class="comment-content"><?php comment_text() ?></div>
					<div class="comment-footer"><span class="metacmt"><?php comment_type(); ?><?php _e(' on ','unnamed') ?> <a href="#comment-<?php comment_ID() ?>" title="Enlace permanente al comentario"> <?php comment_date(__('j M, Y','unnamed')) ?> <?php _e(' a las ','unnamed') ?> <?php comment_time() ?> </a></span>&nbsp;&nbsp;<?php if ( $user_ID ) { edit_comment_link(__('Editar','unnamed'),'<span class="metaedit">','</span>'); } ?></div>
				</li>
				<?php } /* end foreach ping */ ?>
				
			</ol>
			<!-- END #pinglist -->
			<?php } /* end ping check */ ?>
			
			<?php /* Comments open, but empty */ if ( ($post->comment_count < 1) and ('open' == $post->comment_status) ) { ?>
			<ol id="commentlist">
				<li id="leavecomment"> <?php _e('No hay comentarios','unnamed'); ?> </li>
			</ol>
			<?php } ?> <?php /* Comments closed */ if (('open' != $post->comment_status) and is_single()) { ?>
			<div> <?php _e('Comentarios cerrados.','unnamed'); ?> </div>
			<?php } ?>
		
		</div>
		<!-- END .comments 1 -->
		<?php endif; ?>
		
		<?php /* Reply Form */ if ('open' == $post->comment_status) { ?>
		<div class="comment-section">
			<h4 id="respond" class="section-title"> <?php _e('Escribe un comentario','unnamed');  ?> </h4>
			<?php if (get_option('comment_registration') and !$user_ID) { ?>
			<p><?php printf(__('Debes <a href="%s">acceder</a> para escribir un comentario.','unnamed'), get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink()); ?></p>
			<?php } else { ?>
			
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			
				<?php if ( $user_ID ) { ?>
				<div class="metalinks"><?php printf(__('Registrado como %s.','unnamed'), '<a href="' . get_option('siteurl') . '/wp-admin/profile.php">' . $user_identity . '</a>') ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Salir de esta cuenta','unnamed'); ?>"> <?php _e('Salir','unnamed'); ?> &raquo;</a></div>
				<?php } elseif ($comment_author != "") { ?>
				<p><?php printf(__('Bienvenido de nuevo <strong>%s</strong>.','unnamed'), $comment_author) ?>&nbsp;&nbsp;<?php if(get_option('unnamed_shelf') == 1) { ?> <span><a href="#" onclick="Effect.toggle('authorinfo','BLIND'); return false;"><?php _e('Cambiar/Cerrar','unnamed'); ?></a></span><?php } ?></p>
				<?php } ?> <?php if ( !$user_ID ) { ?>
				
				<div id="authorinfo" <?php if ($comment_author != "" && get_option('unnamed_shelf') == 1 ) { ?>style="display:none;"<?php } ?>>
					<p>
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
						<label for="author"><strong> <?php _e('Nombre','unnamed'); ?> </strong> <?php if ($req) __('(requerido)','unnamed'); ?> </label>
					</p>
					<p>
						<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
						<label for="email"><strong> <?php _e('E-Mail','unnamed'); ?> </strong> <?php _e('(no sera visible)','unnamed'); ?> <?php if ($req) __('(required)','unnamed'); ?> </label>
					</p>
					<p>
						<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
						<label for="url"><strong> <?php _e('Tu web','unnamed'); ?> </strong></label>
					</p>
				</div>
				<?php 
/****** Math Comment Spam Protection Plugin ******/
if ( function_exists('math_comment_spam_protection') ) { 
	$mcsp_info = math_comment_spam_protection();
?> 	<p><input type="text" name="mcspvalue" id="mcspvalue" value="" size="22" tabindex="4" />
	<label for="mcspvalue"><small>Protección de Spam: Suma de <?php echo $mcsp_info['operand1'] . ' + ' . $mcsp_info['operand2'] . ' ?' ?></small></label>
	<input type="hidden" name="mcspinfo" value="<?php echo $mcsp_info['result']; ?>" />
</p>
<?php } // if function_exists... ?>
				
				<?php } ?>
				<p>
					<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
				</p>
				
				<p>
					<?php if(get_option('unnamed_ajaxcommenting') == 1) { ?>
					<input id="previewcomment" type="button" value="<?php _e('Vista previa','unnamed'); ?>"/>
					<?php } ?>
					<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Enviar','unnamed'); ?>" />
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					<?php do_action('comment_form', $post->ID); ?>
				</p>
				
			</form>
			
			<!--<p><?php printf(__('<strong>XHTML:</strong> You can use these tags %s:','unnamed'), allowed_tags()) ?></p>-->
			
			<?php } // If registration required and not logged in ?>
		
		</div>
		<!-- END .comments #2 -->
		
		<?php } // comment_status ?>
	
		<?php include (TEMPLATEPATH . '/navigation.php'); ?>