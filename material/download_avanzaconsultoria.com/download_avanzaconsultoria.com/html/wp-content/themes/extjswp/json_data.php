<?php 
if(!function_exists('get_option'))
  require_once('../../../wp-config.php');

$out = array();
if (have_posts()) { 
    while (have_posts()) {
        the_post(); 
        $id = get_the_ID();
        $out[] = array(
            'id'        => $id,
            'title'     => get_the_title($id),
            'content'   => substr(strip_tags(get_the_content()), 0, 128)."...",
            'author'    => get_the_author(),
        );
    }
} else {
        $out[] = array(
            'id'        => 0,
            'title'     => 'Not encontrdo.',
            'content'   => "Lo siento, no hay entradas de lo que buscas....",
            'author'    => 'Administrador',
        );
}


if (!extension_loaded('json')) {
    require_once('JSON.php');
    $json = new HTML_AJAX_JSON();
    echo $json->encode(array('result' => $out));
} else {
    echo json_encode(array('result' => $out));
}
 ?>