<?
function widget_extjslike_search($args) {
    extract($args);
    echo $before_widget . $before_title . 'Search' . $after_title;
?>
<div>
    <div class="x-box-tl"><div class="x-box-tr"><div class="x-box-tc"></div></div></div>
    <div class="x-box-ml"><div class="x-box-mr"><div class="x-box-mc">
    <form class="x-form" id="searchform" method="get" action="<?php bloginfo('home'); ?>" onsubmit="Wp.theme.loadPosts(Wp.bloginfo.url,{s:this.s.value});return false;">
    <div class="x-form-item">
        <input class="searchinput x-form-text" type="text" name="s" id="s" />
        <div class="x-form-clear"></div>
    </div>
    <div class="x-form-btns-ct">
        <div class="x-form-btns x-form-btns-center">
            <table cellspacing="0">
            <tbody>
            <tr>
                <td class="x-form-btn-td">
                    <table cellspacing="0" cellpadding="0" border="0" class="x-btn-wrap x-btn" style="width: 75px;">
                    <tbody>
                    <tr>
                        <td class="x-btn-left"><i></i></td>
                        <td class="x-btn-center"><em unselectable="on"><button onclick="Wp.theme.loadPosts(Wp.bloginfo.url,{s:this.form.s.value});" type="button" class="x-btn-text"><?php echo attribute_escape(__('Buscar')); ?></button></em></td>
                        <td class="x-btn-right"><i></i></td>
                    </tr>
                    </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
            </table>
            <div class="x-clear"/>
            </div>
        </div>
    </div>
    </form>
    </div></div></div>
    <div class="x-box-bl"><div class="x-box-br"><div class="x-box-bc"></div></div></div>
</div>
<?php
    echo $after_widget; 
}
?>