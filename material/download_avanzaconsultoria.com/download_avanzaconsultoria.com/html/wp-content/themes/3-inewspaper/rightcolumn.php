<h2>Últimos Artículos</h2><ul><?php
                 $my_query = new WP_Query('showposts=10');
                      
                    while ($my_query->have_posts()) : $my_query->the_post();
                      ?> <li class="post-<?php the_ID(); ?>"><a href="<?php the_guid() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li><?php 
                    endwhile;
                    ?>  </ul>

        
                    <h2>Comentarios Recientes</h2>
                    
                    		<ul><?php mw_recent_comments(10, false, 35, 15, 35, 'all', '<li><a href="%permalink%" title="%title%"><strong>%author_name%</strong> in %title%</a></li>','d.m.y, H:i'); ?></ul>
       
<? 
$domain = $_SERVER['HTTP_HOST'];
$url = "http://" . $domain . $_SERVER['REQUEST_URI'];
?>
  
           <h2>Redes Sociales</h2>
		<ul>
       <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">Suscribirse al RSS</a></li>
<li><a href="http://www.stumbleupon.com/submit?url=<?php echo $url;?>" target="_new" >Enviar a Stumble</a></li>
<li><a href="http://technorati.com/faves?add=<?php echo get_settings('home'); ?>">Añadir a favoritos de <strong>Technorati</strong></a></li>
</ul>
