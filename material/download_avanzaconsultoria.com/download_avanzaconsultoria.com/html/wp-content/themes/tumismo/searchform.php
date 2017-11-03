		<li id="search">
		  <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
			<div>
			  <input type="text" id="s" name="s" class="searchinput" value="<?php the_search_query(); ?>" />
			  <input style="display:none;" type="submit" id="searchsubmit" value="<?php echo attribute_escape(__('Buscar','unnamed')); ?>" />
			</div>
		  </form>
		</li>