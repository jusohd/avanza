//<![CDATA[  
jQuery(document).ready(function() {    

       
/*  Add .last class to Home and Footer widgets  */        
var $footer_widget = jQuery("#footer-widgets div.footer-widget");  

if (!($footer_widget.length == 0)) {
	$footer_widget.each(function (index, domEle) {
		// domEle == this
		if ((index+1)%4 == 0) jQuery(domEle).addClass("last").after("<div class='clear'></div>");
	});
}
       
        	
/*  Initialize SuperFish  */
jQuery('ul.nav').superfish({ 
	delay:       200,                            // one second delay on mouseout 
	animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
	speed:       100,                          // faster animation speed 
	autoArrows:  true,                           // disable generation of arrow mark-up 
	dropShadows: false                            // disable drop shadows 
});


/*  Initialize Shadowbox  */
Shadowbox.init({
    
	overlayColor: "#202020",
    overlayOpacity: 0.9,
    autoplayMovies:     false,
    viewportPadding: 30
});


// Highlight on Hover
 jQuery('.ufo-recent .recent-thumb, .index-thumb img, #social a').hover(function(){

    	jQuery(this).stop(true, true).animate({opacity: 0.8},100);
    }, function(){
    	jQuery(this).stop(true, true).animate({opacity: 1},100);

    });
    
    
/*  Gallery  */
var $SingleItem = jQuery('.thumb');
jQuery('.zoom-icon').css('opacity','0');
$SingleItem.hover(function(){
	
	jQuery(this).find('.zoom-icon').stop(true, true).animate({opacity: 1},100);
}, function(){
	jQuery(this).find('.zoom-icon').stop(true, true).animate({opacity: 0},100);
	
}); 


var $SingleGalItem = jQuery('.gallery-image-wrap');
jQuery('.zoom-icon, .link-icon').css('opacity','0');
$SingleGalItem.hover(function(){
	
	jQuery(this).find('.zoom-icon, .link-icon').stop(true, true).animate({opacity: 1},100);
}, function(){
	jQuery(this).find('.zoom-icon, .link-icon').stop(true, true).animate({opacity: 0},100);
	
}); 

jQuery(function(){

if (!((jQuery(".galleries article").length) == 0)) {
		jQuery(".galleries article").each(function (index, domEle) {
			// domEle == this
			if ((index+1)%2 == 0) jQuery(domEle).addClass("last").after("<div class='clear'></div>");
		});
	};

});

jQuery(function(){

if (!((jQuery("#gallery.gallery-3col .gallery-item").length) == 0)) {
		jQuery("#gallery.gallery-3col .gallery-item").each(function (index, domEle) {
			// domEle == this
			if ((index+1)%2 == 0) jQuery(domEle).addClass("last").after("<div class='clear'></div>");
		});
	};

});  


});  
//]]>