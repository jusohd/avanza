<!--create the searchfield-->
<div id="search">
<form method="get" action="<?php bloginfo('home'); ?>/">
<div><input name="s" type="text" id="s" value="<?php echo wp_specialchars($s, 1); ?>" size="40" />
<input type="submit" id="searchsubmit" value="BUSCAR" />
</div>
</form>
</div>
<!--searchform.php end-->
