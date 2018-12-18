<?php

// Custom functions (like special queries, etc)

function set_menu_active_classes($classes, $type = null, $identifier = null) {
  if ($type === 'work' && (is_front_page() || is_home() || is_archive())) {
    $classes = $classes . ' active';
  } else if ($type === 'page' && is_page($identifier)) {
    $classes = $classes . ' active';
  }

  echo 'class="' . $classes . '"';
}