<?php
function widget_extjslike_calendar($args) {
    extract($args);
    $options = get_option('widget_calendar');
    $title = $options['title'];
    if ( empty($title) )
        $title = '&nbsp;';
    echo $before_widget . $before_title . $title . $after_title;
    echo '<div id="calendar_wrap">';
    get_extjslike_calendar();
    echo '</div>';
    echo $after_widget;
}

function get_extjslike_calendar($initial = true) {
    global $wpdb, $m, $monthnum, $year, $timedifference, $wp_locale, $posts;

    $key = md5( $m . $monthnum . $year );
    if ( $cache = wp_cache_get( 'get_calendar', 'calendar' ) ) {
        if ( isset( $cache[ $key ] ) ) {
            echo $cache[ $key ];
            return;
        }
    }

    ob_start();
    // Quick check. If we have no posts at all, abort!
    if ( !$posts ) {
        $gotsome = $wpdb->get_var("SELECT ID from $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT 1");
        if ( !$gotsome )
            return;
    }

    if ( isset($_GET['w']) )
        $w = ''.intval($_GET['w']);

    // week_begins = 0 stands for Sunday
    $week_begins = intval(get_option('start_of_week'));
    $add_hours = intval(get_option('gmt_offset'));
    $add_minutes = intval(60 * (get_option('gmt_offset') - $add_hours));

    // Let's figure out when we are
    if ( !empty($monthnum) && !empty($year) ) {
        $thismonth = ''.zeroise(intval($monthnum), 2);
        $thisyear = ''.intval($year);
    } elseif ( !empty($w) ) {
        // We need to get the month from MySQL
        $thisyear = ''.intval(substr($m, 0, 4));
        $d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
        $thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('${thisyear}0101', INTERVAL $d DAY) ), '%m')");
    } elseif ( !empty($m) ) {
        $calendar = substr($m, 0, 6);
        $thisyear = ''.intval(substr($m, 0, 4));
        if ( strlen($m) < 6 )
                $thismonth = '01';
        else
                $thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
    } else {
        $thisyear = gmdate('Y', current_time('timestamp'));
        $thismonth = gmdate('m', current_time('timestamp'));
    }

    $unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);

    // Get the next and previous month and year with at least one post
    $previous = $wpdb->get_row("SELECT DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
        FROM $wpdb->posts
        WHERE post_date < '$thisyear-$thismonth-01'
        AND post_type = 'post' AND post_status = 'publish'
            ORDER BY post_date DESC
            LIMIT 1");
    $next = $wpdb->get_row("SELECT    DISTINCT MONTH(post_date) AS month, YEAR(post_date) AS year
        FROM $wpdb->posts
        WHERE post_date >    '$thisyear-$thismonth-01'
        AND MONTH( post_date ) != MONTH( '$thisyear-$thismonth-01' )
        AND post_type = 'post' AND post_status = 'publish'
            ORDER    BY post_date ASC
            LIMIT 1");

    echo '<div align="center"><div class="x-date-picker x-unselectable" style="-moz-user-select: none; width: 175px;">';
    echo '<table cellspacing="0" style="width: 175px;">
    <tbody>
    <tr>
        <td class="x-date-left">
        ';
    if ( $previous ) {
        echo "\n\t\t".'<a rel="noajax" class="x-unselectable" href="#" onClick="Wp.theme.loadCalendar(\'' .
        get_month_link($previous->year, $previous->month) . '\')" title="' . sprintf(__('Ver entradas de %1$s %2$s'), $wp_locale->get_month($previous->month),
            date('Y', mktime(0, 0 , 0, $previous->month, 1, $previous->year))) . '" style="-moz-user-select: none;"/>';
    } else {
        echo "\n\t\t".'<i/>';
    }
    echo '
        </td>
        <td class="x-date-middle" align="center">
        <table class="x-btn-wrap x-btn" cellspacing="0" cellpadding="0" border="0" style="width: 139px">
        <tbody>
            <tr class="x-btn-with-menu">
                <td class="x-btn-left"><i/></td>
                <td class="x-btn-center">
                    <div class="x-btn-text">' . $wp_locale->get_month($thismonth) . ' ' . date('Y', $unixmonth) . '</div>
                </td>
                <td class="x-btn-right"><i/></td>
            </tr>
        </tbody>
        </table>
        </td>
        <td class="x-date-right">
        ';
    if ( $next ) {
        echo '<a rel="noajax" class="x-unselectable" href="#" onClick="Wp.theme.loadCalendar(\'' .
        get_month_link($next->year, $next->month) . '\')" title="' . sprintf(__('Ver entradas de %1$s %2$s'), $wp_locale->get_month($next->month),
            date('Y', mktime(0, 0 , 0, $next->month, 1, $next->year))) . '" style="-moz-user-select: none;" />';
    } else {
        echo '<i/>';
    }
    echo '
        </td>
    </tr>
    <tr>
        <td colspan="3">
';
    echo '<table class="x-date-inner" cellspacing="0">
    <thead>
    <tr>';

    $myweek = array();

    for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
        $myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
    }

    foreach ( $myweek as $wd ) {
        $day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
        echo "\n\t\t<th abbr=\"$wd\" scope=\"col\" title=\"$wd\"><span>$day_name</span></th>";
    }

    echo '
    </tr>
    </thead>

    <tbody>
    <tr>';

    // Get days with posts
    $dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
        FROM $wpdb->posts WHERE MONTH(post_date) = '$thismonth'
        AND YEAR(post_date) = '$thisyear'
        AND post_type = 'post' AND post_status = 'publish'
        AND post_date < '" . current_time('mysql') . '\'', ARRAY_N);
    if ( $dayswithposts ) {
        foreach ( $dayswithposts as $daywith ) {
            $daywithpost[] = $daywith[0];
        }
    } else {
        $daywithpost = array();
    }

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'camino') !== false || strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'safari') !== false)
        $ak_title_separator = "\n";
    else
        $ak_title_separator = ', ';

    $ak_titles_for_day = array();
    $ak_post_titles = $wpdb->get_results("SELECT post_title, DAYOFMONTH(post_date) as dom "
        ."FROM $wpdb->posts "
        ."WHERE YEAR(post_date) = '$thisyear' "
        ."AND MONTH(post_date) = '$thismonth' "
        ."AND post_date < '".current_time('mysql')."' "
        ."AND post_type = 'post' AND post_status = 'publish'"
    );
    if ( $ak_post_titles ) {
        foreach ( $ak_post_titles as $ak_post_title ) {
            
                $post_title = apply_filters( "the_title", $ak_post_title->post_title );
                $post_title = str_replace('"', '&quot;', wptexturize( $post_title ));
                                
                if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
                    $ak_titles_for_day['day_'.$ak_post_title->dom] = '';
                if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
                    $ak_titles_for_day["$ak_post_title->dom"] = $post_title;
                else
                    $ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
        }
    }


    // See how much we should pad in the beginning
    $pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
    if ( 0 != $pad )
        echo "\n\t\t".'<td colspan="'.$pad.'" class="x-date-prevday">&nbsp;</td>';

    $daysinmonth = intval(date('t', $unixmonth));
    for ( $day = 1; $day <= $daysinmonth; ++$day ) {
        if ( isset($newrow) && $newrow )
            echo "\n\t</tr>\n\t<tr>\n\t\t";
        $newrow = false;

        echo '<td class="x-date-active ';

        if ( $day == gmdate('j', (time() + (get_option('gmt_offset') * 3600))) && $thismonth == gmdate('m', time()+(get_option('gmt_offset') * 3600)) && $thisyear == gmdate('Y', time()+(get_option('gmt_offset') * 3600)) )
            echo 'x-date-today ';

        if ( in_array($day, $daywithpost) ) { // any posts today?
            echo 'x-date-selected"> ';
            echo '<a rel="noajax" class="x-date-date" hidefocus="on" href="#" onClick="Wp.theme.loadPosts(\'' . get_day_link($thisyear, $thismonth, $day) . '\')" title="'.$ak_titles_for_day[$day].'"><em><span>'.$day.'</span></em></a>';
        } else {
            echo '"> ';
            echo '<a style="cursor:default" class="x-date-date" hidefocus="on" title="'.$ak_titles_for_day[$day].'"><em><span>'.$day.'</span></em></a>';
        }
            //echo $day;
        echo '</td>';

        if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
            $newrow = true;
    }

    $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
    if ( $pad != 0 && $pad != 7 )
        echo "\n\t\t".'<td class="pad" colspan="'.$pad.'">&nbsp;</td>';

    echo "\n\t</tr>\n\t</tbody>\n\t</table>";
    echo "\n\t</td>\n\t</tr>\n\t</tbody>\n\t</table>";
    echo '</div></div>';
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
    $cache[ $key ] = $output;
    wp_cache_add( 'get__extjs_calendar', $cache, 'calendar' );
}
?>