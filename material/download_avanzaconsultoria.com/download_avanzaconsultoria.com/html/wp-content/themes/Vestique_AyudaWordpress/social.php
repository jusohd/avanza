<div class="post-social">
<p class="cats"><?php _e('Categoria:'); ?>&nbsp;<?php the_category(', ') ?></p>
<p class="cats"><?php if(function_exists("UTW_ShowTagsForCurrentPost")) : ?><?php UTW_ShowTagsForCurrentPost("commalist", array('last'=>' and %taglink%', 'first'=>'Etiquetas: %taglink%',)) ?><?php else : ?><?php if(function_exists("the_tags")) : ?><?php the_tags() ?><?php endif; ?><?php endif; ?></p>

<div class="p-bottom">
<p class="digg"><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>">Subir a Digg</a></p>
<p class="deli"><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="nofollow">Agregar a del.icio.us</a></p>
<p class="tech"><a href="http://technorati.com/faves?add=<?php the_permalink(); ?>" rel="nofollow">Marcar en Technorati</a></p>
<p class="stumble"><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" rel="nofollow">Stumblealo!</a></p>
<p class="cc-counter"><?php comments_popup_link('Sin comentarios', '1 Comentario', '% Comentarios'); ?> </p>
</div>

</div>