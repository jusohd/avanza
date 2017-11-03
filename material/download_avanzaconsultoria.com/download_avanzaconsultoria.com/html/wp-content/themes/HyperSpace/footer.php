	</div> <!-- #main-content  --> 

<footer id="footer">
    <div id="footer-inside">
	
        <div id="footer-widgets">
    	    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
    	    <?php endif; ?>	
    	    <div class="clear"></div>
    	</div> <!-- #footer-widgets  --> 
    	
    	<div id="copyright">             
            <div id="copy-text" ><a href="http://www.ufothemes.com">Premium Wordpress Themes</a> by UFO Themes</div>
    	</div> <!-- #copyright  -->

    </div> <!-- #footer-inside  -->
</footer> <!-- #footer  -->
</div> <!-- #wrapper  -->
<?php wp_footer(); ?> 
</body>
</html>