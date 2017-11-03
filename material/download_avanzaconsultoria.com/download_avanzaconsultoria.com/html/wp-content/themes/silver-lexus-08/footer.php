<div id="footer">
    <p>&copy; <?php first_year() ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. Todos los derechos reservados.</p>
    <p><?php bloginfo('name'); ?> creado con la plantilla <a href="http://www.highlandsbydesign.com/theme/silver-lexus-theme/" title="Silver Lexus theme">Silver Lexus</a>, traducida por <a href="http://ayudawordpress.com">Fernando</a> y <a href="http://wordpress.org/" title="Wordpress">WordPress</a>.</p>
</div>

</div>

<?php wp_footer(); ?>

<div id="breadcrumbs">
<?php get_breadcrumb() ?>
</div>

<div id="searchCSS">
    <?php include (TEMPLATEPATH . '/searchform.php'); ?></div>

</div>
</div>


        <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->

</body>
</html>
