<?php header("HTTP/1.1 404 Not Found"); ?>
<?php get_header(); ?>

    <h2 class="center">Error 404 - No encontrado</h2>

        <p>La página que busas no está aquí</p>
        <p>Puede que se haya movido o renombrado. Utiliza los enlaces o haz una búsqueda para encontrar lo que querías.</p>

        <p>Si no sabes por donde empezar utiliza la búsqueda o los enlaces facilitados</p>

        <?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
