Theme Name: WP-Polaroid
Theme URI: http://www.adii.co.za/
Description: Wordpress Polaroid Theme by Adii
Version: 1.0
Author: Adii
Author URI: http://www.adii.co.za/

*************************************************************************************************

Installation:

1. Unzip the zip file and copy the 'wp-polaroid' directory into your wp-content/themes directory
2. Activate the theme through your Wordpress Administration panel

*************************************************************************************************

Required Plugins (these plugins are needed to run the theme properly):

1. FlickRSS - http://eightface.com/
2. Recent Posts, Recent Comments & Most Commented - http://mtdewvirus.com/

*************************************************************************************************

Edit the polaroids:

1. Open the 'Polaroids.psd' file (in Photoshop) - located in the themes directory images/polaroids
2. Add your own picture into the black space, and edit the text at the bottom
3. Duplicate the polaroid, so that you have two polaroids
4. Rotate both polaroids slightly, sticking to the limits of the canvas
5. Save the two polaroids as polaroids.png and polaroids2.png in images/polaroids
6. If you'd only like to use one polaroid, delete polaroids2.png

*************************************************************************************************

Edit the header & about content:

1. Open header.php
2. Edit the left-side text on lines 67 & 69
3. Edit the right-side text on lines 82 & 84

*************************************************************************************************

Edit the 'MySponsors' & 'LinkLove' lists in the sidebar:

1. Open sidebar.php
2. MySponsors (line 18)- change the '2' to the links category you would like to display - <?php get_links(2, '<li>', '</li>','', false, 'rand', false,false); ?>
2. LinkLove (line 40) - change the '2' to the links category you would like to display - <?php get_links(2, '<li>', '</li>','', false, 'rand', false,false); ?>

*************************************************************************************************

Add your own MyBlogLog code:

1. Open sidebar.php
2. On line 49, find '2007032603461024' and replace it with your own MyBlogLog ID

*************************************************************************************************

Add your own advertisements:

1. Open sidebar.php
2. Edit the three different ads on lines 4 - 6

*************************************************************************************************