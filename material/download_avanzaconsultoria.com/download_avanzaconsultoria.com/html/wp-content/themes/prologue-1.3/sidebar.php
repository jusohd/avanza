
<div id="sidebar">
	<ul>

<?php 
if( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) { 
	$before = "<li><h2>Recent Projects</h2>\n";
	$after = "</li>\n";

	$num_to_show = 35;

	echo prologue_recent_projects( $num_to_show, $before, $after );
} // if dynamic_sidebar
?>

		<li class="credits">
			<p><a href="http://wordpress.org/">Blog WordPress</a><br /> Prologue de<a href="http://automattic.com/">Automattic</a></p>
		</li>
	</ul>
</div> <!-- // sidebar -->
