<?php get_header();?>
<div id="main">
	<div id="content">
	        <div class="post">
            <p class="date">
              <span class="month">
                <?php echo date('M'); ?>
              </span>
              <span class="day">
                <?php echo date('d'); ?>
              </span>
              <span class="year">
                <?php echo date('Y'); ?>
              </span>
            </p>
            <h2 class="title">404 - No encontrado !</h2>
            <div class="entry">
              <p>El articulo o pagina que buscas no esta disponible en este momento.
              Puede que haya sido movido o borrado.</p>
              <p>Navega por el archivo o busca en la web.</p>
      			</div>
            <p class="comments">
              Publicado como "No encontrado"  
            </p>	          
	        </div>      
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>