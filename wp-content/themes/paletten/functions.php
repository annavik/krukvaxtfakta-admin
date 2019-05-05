<?php

// Set timezone
date_default_timezone_set('Europe/Stockholm');
setlocale(LC_TIME, '');
setlocale(LC_TIME, 'sv_SE.utf8') or setlocale(LC_TIME, 'swedish') or setlocale(LC_TIME, 'sv_SE');

// Admin adjustments
add_theme_support('post-thumbnails');
add_image_size('featured_preview', 64, 64, true);
add_action('admin_menu', function() {
  remove_menu_page('edit.php'); // Posts
  remove_menu_page('edit.php?post_type=page'); // Pages
  remove_menu_page('edit-comments.php'); // Comments
});

// Inline plugins
require __DIR__.'/includes/plugin-library/index.php';

?>