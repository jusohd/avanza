<?php get_header(); ?>

	<div id="right">
		
		<div class="leftcol">	
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>""><h3><?php the_title(); ?></h3></a>
			<p>
			<?php the_content(''); ?>
			</p>
			<?php comments_template(); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<h3>No encontrado</h3>
			<p>Lo siento pero lo que buscas no está aquí.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
		<?php endif; ?>		
			<div style="clear:both"></div>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Anteriores') ?></div>
				<div class="alignright"><?php previous_posts_link('Siguientes &raquo;') ?></div>
			</div>		
		</div>

		<div class="special">
			<p>Este es un campo de texto que puedes utilizar para añadir lo que te apetezca. Puede ser un buen lugar para incluir alguna cita o información adicional que desées que sea visible en las entradas de "pagina" de tu blog. Lo puedes modificar en /wp-content/themes/artificial-intelligence-10/page.php.</p>	
		</div>

	</div>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>