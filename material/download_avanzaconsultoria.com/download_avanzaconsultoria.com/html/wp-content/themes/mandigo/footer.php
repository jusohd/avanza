<?php /*

  Hi,

  Please DO NOT remove the link to my website from the footer. I have
  been working hard to make this theme and you have downloaded it for
  FREE. This is all I ask from you in return for Mandigo which didn't
  cost you a cent.

  Thank you.

  tom

*/

  global $dirs, $wpmu;
?>
</tr>
</table>
<?php echo get_option('mandigo_inserts_footer'); ?>
</div>
<div id="footer" class="png">
	<p>
<?php if ($wpmu): $current_site = get_current_site(); ?>
		<?php _e('Creado con <a href="http://mu.wordpress.org/">WordPress MU</a>','mandigo'); ?> &amp; alojado en <a href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_site->site_name ?></a>. Plantilla <a href="http://www.onehertz.com/portfolio/wordpress/" target="_blank" title="WordPress themes">Mandigo</a> traducida por <a href="http://ayudawordpress.com/">Fernando</a>.

<?php else: ?>
		<?php _e('Creado con <a href="http://wordpress.org/">WordPress</a>','mandigo'); ?>. Plantilla <a href="http://www.onehertz.com/portfolio/wordpress/" target="_blank" title="WordPress themes">Mandigo</a> traducida por <a href="http://ayudawordpress.com/">Fernando</a>.

<?php endif; ?>
		<br /><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php echo $dirs['www']['scheme']; ?>images/rss_s.gif" alt="" /> <?php _e('Entradas (RSS)','mandigo'); ?></a>
		<?php _e('and','mandigo'); ?> <a href="<?php bloginfo('comments_rss2_url'); ?>"><img src="<?php echo $dirs['www']['scheme']; ?>images/rss_s.gif" alt="" /> <?php _e('Comentarios (RSS)','mandigo'); ?></a>.
		<?php if (get_option('mandigo_footer_stats')): ?>
		<br /><?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> segundos.
		<?php endif; ?>
	</p>
</div>
</div>

<?php
	wp_footer();

	if (get_option('mandigo_1024')) {
		if (get_option('mandigo_3columns')) {
			$maxw = 455;
		}
		elseif (get_option('mandigo_nosidebars')) {
			$maxw = 915;
		}
		else {
			$maxw = 685;
		}
	}
	else {
	}
?>

<script type="text/javascript">
<!-- // <![CDATA[
	jQuery('#rssicon, #searchsubmit').hover(
		function() { this.src = this.src.replace('.gif','_hover.gif'); },
		function() { this.src = this.src.replace('_hover.gif','.gif'); }
	);

	if (jQuery.browser.msie) {
		if (/^[56]/.test(jQuery.browser.version)) {
			jQuery.ifixpng('<?php echo $dirs['www']['images']; ?>1x1.gif');
			jQuery('.png').ifixpng();
		}
		jQuery('.entry object, .entry img').load(function() {
			o = jQuery(this);
			if (o.width() > 300) { // dont bother resizing below this width
				d = parseInt(o.css('padding-left')      )
				  + parseInt(o.css('padding-right')     )
				  + parseInt(o.css('margin-left')       )
				  + parseInt(o.css('margin-right')      )
				  + parseInt(o.css('border-left-width') )
				  + parseInt(o.css('border-right-width'));
				if (o.width() > <?php echo $maxw; ?>-d) o.width(<?php echo $maxw; ?>-d);
			}
		});

<?php if (get_option('mandigo_fixes_whitespace_pre')): ?>
		jQuery('*').each(function() { if (this.style.whiteSpace == 'pre') jQuery(this).css({'white-space':'normal'}); });
<?php endif; ?>
	}

<?php if (get_option('mandigo_fixes_comments_1')): ?>
	jQuery('.commentlist p a').each(function() { if (jQuery(this).width() > <?php echo $maxw; ?>) jQuery(this).text(this.innerHTML.replace(/\/([^\/])/g,'/\n$1')); });
<?php endif; ?>
<?php if (get_option('mandigo_fixes_comments_2')): ?>
	jQuery('.commentlist p a').each(function() { if (jQuery(this).width() > <?php echo $maxw; ?>) jQuery(this).text('link'); });
<?php endif; ?>
<?php if (!get_option('mandigo_no_animations')): ?>
	<?php if (get_option('mandigo_collapse_posts')): ?>
	jQuery('.entry').hide();
	<?php endif; ?>
	togglePost = function(id) {
		if (!id) return;
		icon = jQuery('#switch-post-'+id+' img');
		icon.attr('src',/minus/.test(icon.attr('src')) ? icon.attr('src').replace('minus','plus') : icon.attr('src').replace('plus','minus'));
		jQuery('#post-'+id+' .entry').animate({ height: 'toggle', opacity: 'toggle' }, 1000);
	}

	toggleSidebars = function() {
		icon = jQuery('.switch-sidebars img');
		icon.attr('src',/hide/.test(icon.attr('src')) ? icon.attr('src').replace('hide','show') : icon.attr('src').replace('show','hide'));
		jQuery('.sidebars').animate({ width: 'toggle', height: 'toggle', padding: 'toggle', border: 'toggle' }, 1000);
	}

<?php /* there's also "#wp-calendar caption", but it doesn't work too well */ ?>
	jQuery('.widgettitle, .linkcat *:first, .commentlist li cite, .wpg2blockwidget h3').click(function() {
		jQuery(this).siblings().animate({ height: 'toggle', opacity: 'toggle' }, 1000);
	});
<?php endif; ?>

<?php if (get_option('mandigo_drop_shadow')): ?>
	jQuery('#blogname').after('<span class="blogname text-shadow">'+ jQuery('#blogname a').html() +"<\/span>");
	jQuery('#blogdesc').after('<span class="blogdesc text-shadow">'+ jQuery('#blogdesc'  ).html() +'<\/span>');
<?php endif; ?>

<?php if (get_option('mandigo_stroke')): ?>
	jQuery.each(['tl','tr','bl','br'],function() {
		jQuery('#blogname').after('<span class="blogname text-stroke-'+ this +'">'+ jQuery('#blogname a').html() +'<\/span>');
		jQuery('#blogdesc').after('<span class="blogdesc text-stroke-'+ this +'">'+ jQuery('#blogdesc'  ).html() +'<\/span>');
	});
<?php endif; ?>

<?php if (get_option('mandigo_sidebar1_left')): ?>
	t = jQuery('#sidebar1').clone();
	jQuery('#sidebar1').remove();
	jQuery('td#content').before(t);
<?php endif; ?>

<?php if (get_option('mandigo_sidebar2_left')): ?>
	t = jQuery('#sidebar2').clone();
	jQuery('#sidebar2').remove();
	jQuery('td#content').before(t);
<?php endif; ?>

<?php if (get_option('mandigo_fixes_touch_content')): ?>
	jQuery('#content').css({verticalAlign:'top'});
	window.onLoad = function() { jQuery('#content').css({verticalAlign:'top'}); }
<?php endif; ?>

// ]]> -->
</script>
</body>
</html>
