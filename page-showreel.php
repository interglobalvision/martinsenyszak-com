<?php
get_header();
?>

<main id="main-content">
  <section id="page-showreel">
    <div class="container">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $showreels = get_post_meta($post->ID, '_igv_showreels', true);
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <section class="grid-row">
        <div class="grid-item item-s-12">
          <?php the_content(); ?>
        </div>
      </section>

      <?php
        if ($showreels) {
          $length = count($showreels);
          $i = 1;
          foreach($showreels as $showreel) {
      ?>
      <section id="single-post-player" class="grid-row">
        <div class="grid-item item-s-12">
          <?php if ($showreel['vimeo']) { ?>
            <div data-vimeo-url="<?php echo $showreel['vimeo']; ?>" id="single-post-vimeo" class="u-video-embed-container"></div>
          <?php } ?>
        </div>
      </section>

      <section id="single-post-text" class="margin-top-basic <?php if ($i !== $length) {echo 'margin-bottom-large';} ?>">
        <div class="grid-row">
          <div class="grid-item item-s-9 offset-s-3 margin-bottom-basic">
          <?php if ($showreel['title']) { ?>
            <h1><?php echo $showreel['title']; ?></h1>
          <?php } ?>
          </div>
        </div>
      </section>
      <?php
            $i++;
          }
        }
      ?>

    </article>

<?php
  }
} ?>
    </div>
  </section>

</main>

<?php
get_footer();
?>