<?php if (is_single()) { ?>
<div id="post-navigator-single">
<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
</div>

<?php } else if (is_page()) { ?>

<div id="post-navigator">
<?php link_pages('<strong>Paginas:</strong> ', '', 'number'); ?>
</div>

<?php } else { ?>

<div id="post-navigator">
<?php if (function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi(); ?>
<?php else : ?>
<div class="alignright"><?php previous_posts_link('Siguientes &raquo;'); ?></div>
<div class="alignleft"><?php next_posts_link('&laquo; Anteriores'); ?></div>
<?php endif; ?>
</div>

<?php } ?>