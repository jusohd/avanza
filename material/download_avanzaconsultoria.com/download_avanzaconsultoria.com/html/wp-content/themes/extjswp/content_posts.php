<?php
if(!function_exists('get_option'))
require_once('../../../wp-config.php');

  global $comments, $post, $wpdb;
?>

<div id="content">
<?php if (is_archive() || is_search()) : ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
        <div class="page"><div class="page-title">Entradas de la categoría &#8216;<?php single_cat_title(); ?>&#8217;</div></div>
    <?php /* If this is a tag */ } elseif (function_exists('is_tag') && is_tag()) { ?>
        <div class="page"><div class="page-title">Entradas con tags &#8216;<?php single_tag_title(); ?>&#8217;</div></div>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <div class="page"><div class="page-title">Entradas del día <?php the_time('j F, Y'); ?></div></div>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <div class="page"><div class="page-title">Entradas del mes <?php the_time('F, Y'); ?></div></div>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <div class="page"><div class="page-title">Entradas del año <?php the_time('Y'); ?></div></div>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <div class="page"><div class="page-title">Archivo del Autor</div></div>
    <?php /* If this is an author archive */ } elseif (is_search()) { ?>
        <div class="page"><div class="page-title">Resultados de búsqueda para &#8216;<?php echo $_POST['s'];?>&#8217;</div></div>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <div class="page"><div class="page-title">Archivo del Blog</div></div>
    <?php } ?>


    <?php if (have_posts()) : ?>
    	<ol class="commentlist">
        <?php while (have_posts()) : the_post(); ?>
    		<li class="commentsitem <?php echo $oddcomment; ?>">
    			<div class="commentauthor"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></div>
    			<div class="commentmetadata">
                    <?php the_time('j F, Y') ?> por <?php the_author() ?> 
                    <?php if (!is_single() && !is_page()) : ?> 
                        | <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?>
                    <?php endif; ?>
                </div>
                <?php the_content('Mas...'); ?>
    		</li>
    	<?php $oddcomment = ( empty( $oddcomment ) ) ? 'alt' : ''; ?>
        <?php endwhile; ?>
    	</ol>
    <?php else : ?>
        <div class="page">
        <br><p class="center">Lo siento pero lo que buscas no está aquí.</p>
        </div>
    <?php endif; ?>
    <div class="navigation">
        <?php next_posts_link('&laquo; Entradas anteriores') ?>&nbsp;&nbsp;&nbsp;<?php previous_posts_link('Entradas siguientes &raquo;') ?>
    </div>
<?php else : ?>

    <?php if (have_posts()) : ?>
    
        <?php while (have_posts()) : the_post(); ?>
            <div class="post" id="post-<?php the_ID(); ?>">
                <!-- POST HEADER -->
                <div class="post-head">
                    <div class="post-title">
                            <?php if ($post->post_parent) : ?>
                        <a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; 
                        <?php endif; ?>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="post-date">
                        <?php if (is_single() || is_page()) : ?>
                            <span class="about published" style="float:left"><?php the_time('l, j F, Y') ?> a las <?php the_time() ?> por <?php the_author() ?></span>
                            <?php if (!is_page()) : ?><!-- Pages are not categorized --><span class="about category" style="float:right">Categoría: <?php the_category(', ') ?></span><?php endif; ?>
                        <?php else: ?>
                            <?php the_time('j F, Y') ?> por <?php the_author() ?> 
                            | <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- POST CONTENT -->
                <div class="post-content">
                    <?php if (is_attachment()) : ?>
                    <?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
                    <?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
                    <p align="center" class="<?php echo $classname; ?>"><?php echo $attachment_link ?><br /><?php echo basename($post->guid); ?></p>
                    <?php endif; ?>

                    <?php the_content('Mas...'); ?>
                </div>

                <!-- PAGES LKINKS -->
                <div class="navigation">
                    <?php wp_link_pages(array('before' => '<p><strong>Páginas:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                </div>

                <!-- TAGS -->
                <?php if(function_exists('the_tags') && is_single() ) : ?>
                    <?php the_tags( '<div class="post-about"><span class="about tag">Tags: ', ', ', '</span></div>'); ?>
                <?php endif; ?>            

                <!-- ABOUT -->
                <?php if ( is_single() || is_page() ) : ?>
                    <?php if ('open' == $post-> comment_status) : ?>
                 <div class="post-about">
                    <table width="97%" cellspacing="0" border="0">
                    <tr>
                        <td width="25%" align="left"><span class="about feed"><?php comments_rss_link('Comments feed'); ?></span></td>
                        <td width="25%" align="center"><span class="about comment_add"><?php if ('open' == $post-> comment_status) : ?><a href="#respond" rel="noajax">Escribe un comentario</a><?php else: ?>Los comentarios están cerrados<?php endif; ?></span></td>
                        <td width="25%" align="right"><span class="about url"><?php if ('open' == $post-> ping_status) : ?><a href="<?php trackback_url(true); ?>" rel="trackback">Haz Trackback desde tu web</a><?php else: ?>Los pings no están habilitados<?php endif; ?></span></td>
                        <?php edit_post_link('Editar', '<td width="25%" align="right"><span class="about edit">', '</span></td>'); ?>
                    </tr>
                    </table>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php comments_template(); ?>
        
        <?php endwhile; ?>
    
        <div class="navigation">
            <?php next_posts_link('&laquo; Entradas anteriores') ?>&nbsp;&nbsp;&nbsp;<?php previous_posts_link('Entradas siguientes &raquo;') ?>
        </div>
    
    <?php else : ?>
    
        <div class="page"><div class="page-title">No Encontrado</div>
        <br><p class="center">Lo siento pero lo que buscas no está aquí.</p>
        </div>
        
    
    <?php endif; ?>

<?php endif; ?>
</div>

