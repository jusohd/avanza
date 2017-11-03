<?php
if(!function_exists('get_option'))
  require_once('../../../wp-config.php');

require_once('widget_calendar.php');
get_extjslike_calendar();
?>
