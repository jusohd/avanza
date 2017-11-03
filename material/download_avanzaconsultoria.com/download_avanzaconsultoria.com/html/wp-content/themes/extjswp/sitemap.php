<?php
header('Content-Type: text/plain; charset=UTF-8');
if(!function_exists('get_option'))
require_once('../../../wp-config.php');

  global $comments, $post, $wpdb;
?>
<?
$pages = get_pages();
if (is_array($pages)) 
foreach ($pages as $p) {
?>
<?php echo $p->guid; ?>

<?php
}
?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php the_permalink() ?>

<?php endwhile; ?>
<?php endif; ?>
