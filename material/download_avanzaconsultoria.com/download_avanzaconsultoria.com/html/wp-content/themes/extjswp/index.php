<?php get_header(); ?>

<!-- Center for posts -->
<div id="wp-posts" class="x-layout-inactive-content">
<?php include('content_posts.php'); ?>
</div>

<!-- List of pages  -->
<div id="wp-tb-items" style="display:none">
<ul><?php wp_list_pages('title_li=&' ); ?></ul>
</div>

<div id="panelNorth" class="x-layout-inactive-content">
    <div id="seachFormContainer" style="float:right;border:0px solid navy;margin:4px;margin-top:12px;">
    <form id="liveSeachForm" style="display:inline;margin:0;padding:0">
        <input name="liveseach" id="liveseach">
    </form>
    </div>
    <div id="header"><a href="<?php bloginfo('url'); ?>" rel="rawLink"><?php bloginfo('name'); ?></a></div>
</div>

<div id="panelCenter" class="x-layout-inactive-content">
    <!-- North for toolbar -->
    <div id="wp-toolbar" class="x-layout-inactive-content">
    </div>
</div>

<div id="panelEast" class="x-layout-inactive-content">
<?php get_sidebar(); ?>
</div>

<div id="panelSouth" class="x-layout-inactive-content">
    <p>Creado con la <a href="http://extjs.com/" rel="rawLink">plantilla</a> <a href="http://extjswordpress.net/" rel="rawLink">ExtJS</a> traducida por <a href="http://ayudawordpress.com" rel="rawLink">Ayuda Wordpress</a>.</p>
</div>

<?php get_footer(); ?>
