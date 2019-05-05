<?php
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
require __DIR__.'/includes/plugin-api/index.php';
?>
