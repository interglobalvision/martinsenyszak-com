<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/dist/static/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/dist/static/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/dist/static/favicon/favicon-16x16.png">
  <link rel="mask-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/static/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/static/favicon/favicon.ico">
  <meta name="msapplication-TileColor" content="#ffc40d">
  <meta name="theme-color" content="#ffffff">

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<header id="header">
  <div class="container margin-top-small">
    <div class="grid-row align-items-baseline">
      <div class="grid-item item-s-5">
        <a href="<?php echo home_url(); ?>">
          <div id="header-logotype">
            <?php echo url_get_contents(get_bloginfo('stylesheet_directory') . '/dist/img/martinsensyzak.svg'); ?>
          </div>
        </a>
      </div>
      <nav id="menu" class="grid-item item-s-6 offset-s-1 item-m-5 offset-m-2">
        <ul class="grid-row justify-between">
          <li <?php set_menu_active_classes('grid-item no-gutter', 'work'); ?>><a href="<?php echo home_url(); ?>">Work</a></li>
          <li <?php set_menu_active_classes('grid-item no-gutter', 'page', 'showreel'); ?>><a href="<?php echo home_url('showreel'); ?>">Showreel</a></li>
          <li <?php set_menu_active_classes('grid-item no-gutter', 'page', 'about'); ?>><a href="<?php echo home_url('about'); ?>">About & Contact</a></li>
        </ul>
      </nav>
    </div>
  </div>
</header>

<section id="main-container" class="margin-top-mid">