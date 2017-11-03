<?php $googleAdsenseId = "5937639773245773"; // Fill in your Google Adsense Account Number in between the quotes. Save. Upload the file. Adsense will display after the first post on all category, archive, and index pages ?> 

<?php if ($googleAdsenseId != NULL) {?>

<div class="adsTopLeft">

<?php echo '<script type="text/javascript"><!--
google_ad_client = "pub-'.$googleAdsenseId.'";
google_ad_slot = "2952152734";
google_ad_width = 180;
google_ad_height = 90;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>'?></div>

<div class="adsTopRight">

<?php echo '<script type="text/javascript"><!--
google_ad_client = "pub-'.$googleAdsenseId.'";
google_ad_slot = "2952152734";
google_ad_width = 180;
google_ad_height = 90;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>'?></div>

<?php } ?>