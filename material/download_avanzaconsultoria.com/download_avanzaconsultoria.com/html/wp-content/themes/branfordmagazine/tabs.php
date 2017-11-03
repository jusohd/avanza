<div class="tabs-block">
  <div class="menu tabbed">
    <ul class="tabs">
      <li class="t1"><a class="t1 tab" title="Artículo de Portada">Artículo de Portada</a></li>
      <li class="t3"><a class="t3 tab" title="Artículos mas leídos">Artículos mas leídos</a></li>
	  <li class="t4"><a class="t4 tab" title="Artículos recientes">Artículos recientes</a></li>
      <li class="t2"><a class="t2 tab" title="About this Theme">Mas información</a></li>	  
      <!-- Añade cuantas pestañas quieras siguiendo este esquema:
    <li class="tX"><a class="tX tab" title="Título aqui">Nombre del enlace</a></li> -->
    </ul>
    
    
    <!-- LEAD ARTICLE -->
    <div class="t1 feature" id="lead">
      <ul id="leadarticle">
        <?php 
// Lead Story module begins   
   query_posts('showposts=1&cat=1'); //selects 1 article of the category with ID 1 ?>
        <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/<?php 
// this is where the Lead Story image gets printed	
	$values = get_post_custom_values("leadimage"); echo $values[0]; ?>" alt="" id="leadpic" /></a>
        <h3>
          <?php 
	// this is where the name of the Lead Story category gets printed	  
	wp_list_categories('include=1&title_li=&style=none'); ?>
        </h3>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title">
        <?php 
// this is where the title of the Lead Story gets printed	  
	the_title(); ?>
        </a>
        <?php 
// this is where the excerpt of the Lead Story gets printed	  
	the_excerpt() ; ?>
        <?php endwhile; ?>
      </ul>
    </div>
    
    
    <!-- ABOUT -->
    <div class="t2">
      <ul class="about">
        <h3>Mas información</h3>
        <p>Aquí tienes una muestra mas de como incluir pestañas para añadir la información que tu quieras, enlaces a secciones o lo que te parezca.</p>
        <p>Puede ser un buen lugar para añadir información sobre el blog o los autores, por ejemplo. </p>
        <p>Este texto lo puedes encontrar en el archivo tabs.php de la plantilla. </p>
        <p>La plantilla ha sido traducida por <a href="http://ayudawordpress.com">Ayuda Wordpress </a></p>
      </ul>
    </div>
    
    
    <!-- POPULAR POSTS -->
    <div class="t3">
       <ul class="popular">
        <h3>Artículos mas leídos</h3>
        <p>Este es un buen sitio para mostrar a tus lectores los artículos mas populares. Para ello te vendrá bien el plugin
		<a href="http://alexking.org/projects/wordpress" target="_new">"Popularity contest"</a> de Alex King.</p>
      </ul>
    </div>
	
	<!-- RECENT POSTS -->
    <div class="t4">
       <ul class="recentposts">
        <h3>Artículos publicados recientemente</h3>
        <p> 
		<ul class="bullets">
      <?php wp_get_archives('type=postbypost&limit=7'); ?>
    </ul>
	</p>
      </ul>
    </div>
    
  </div>
  <!-- tabbed -->
</div>
