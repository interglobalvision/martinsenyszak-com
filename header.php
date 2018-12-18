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

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<header id="header">
  <div class="container">
    <div class="grid-row">
      <div class="grid-item item-s-6">
        <a href="<?php echo home_url(); ?>">
          <div id="header-logotype">
            <?php echo url_get_contents(get_bloginfo('stylesheet_directory') . '/dist/img/martinsensyzak.svg'); ?>
          </div>
        </a>
      </div>
      <div class="grid-item item-s-6">
        <ul class="grid-row justify-between">
          <li class="grid-item no-gutter"><a href="<?php echo home_url(); ?>">Work</a></li>
          <li class="grid-item no-gutter"><a href="<?php echo home_url('showreel'); ?>">Showreel</a></li>
          <li class="grid-item no-gutter"><a href="<?php echo home_url('about'); ?>">About</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

<section id="main-container" class="margin-top-basic">