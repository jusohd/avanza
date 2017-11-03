			<div class="col1 fr">

				<div class="ads">
					<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/ads/ad125x125.png" alt="Ad Spot" /></a>
					<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/ads/ad125x125.png" alt="Ad Spot"/></a>
					<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/ads/ad125x125.png" class="last" alt="Ad Spot" /></a>
				</div><!--/ads-->				

				<div class="col2">

					<h3 class="hdr1">POSTSRECIENTES</h3>
					<ul class="comments">
						<?php if (function_exists('mdv_recent_posts')) { mdv_recent_posts(5); } ?>
					</ul>

					<h3 class="hdr5"><em>MIS</em>SPONSORS</h3>
					<ul class="comments">
						 <?php get_links(2, '<li>', '</li>','', false, 'rand', false,false); ?> 
					</ul>					

					<h3 class="hdr2"><em>MIS</em>ARCHIVOS</h3>
					<ul class="comments">
						<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 1, 1, 1, 1, 0,'','','','','11,14,15,16,17') ?>
					</ul>
				</div><!--/col2-->

				<div class="col3">
					<h3 class="hdr3"><em>QUIEN</em>COMENTO</h3>
					<ul class="comments">
						<?php if (function_exists('mdv_recent_comments')) { mdv_recent_comments(5, 5, '<li>', '</li>', true, 0); } ?>
					</ul>

					<h3 class="hdr4"><em>MAS</em>COMENTADOS</h3>
					<ul class="comments">
						<?php if (function_exists('mdv_most_commented')) {  mdv_most_commented(5); } ?>
					</ul>

					<h3 class="hdr5"><em>MI</em>BLOGROLL</h3>
					<ul class="comments">
						<?php get_links(2, '<li>', '</li>','', false, 'rand', false,false); ?> 
					</ul>

				</div><!--/col3-->
				
				<div class="fix"></div>

				<h3><span>Lectores recientes, gente muy cool que me lee!</span><img src="<?php bloginfo('stylesheet_directory'); ?>/images/hdr-recent-readers.gif" alt="Recent Readers" /></h3>

				<div class="recent"><script type="text/javascript" src="http://pub.mybloglog.com/comm2.php?mblID=2007032603461024&amp;c_width=425&amp;c_sn_opt=n&amp;c_rows=2&amp;c_img_size=f&amp;c_heading_text=Recent+Readers&amp;c_color_heading_bg=FFFFFF&amp;c_color_heading=ffffff&amp;c_color_link_bg=FFFFFF&amp;c_color_link=FFFFFF&amp;c_color_bottom_bg=FFFFFF"></script></div><!--/recent-->

			</div><!--/col1-->

