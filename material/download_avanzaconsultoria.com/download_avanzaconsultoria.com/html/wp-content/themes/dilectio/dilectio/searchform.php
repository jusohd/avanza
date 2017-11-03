<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" class="key"  value="Buscar..." name="s" id="s" onfocus="if(this.value=='Search...')this.value=''" onblur="if(this.value=='')this.value='Search...'" />
<div class="bt">
<input name="submit" type="image" class="search" title="Search" src="<?php bloginfo('template_url'); ?>/images/ButtonTransparent.png" alt="Buscar" />
</div>
</form>