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

    $vimeo = get_post_meta($post->ID, '_igv_vimeo', true);
    $credits = get_post_meta($post->ID, '_igv_credits', true);
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <section id="single-post-player" class="grid-row">
        <div class="grid-item item-s-12">
          <?php if ($vimeo) { ?>
            <div data-vimeo-url="<?php echo $vimeo; ?>" id="single-post-vimeo" class="u-video-embed-container"></div>
          <?php } ?>
        </div>
      </section>

      <section id="single-post-text" class="margin-top-basic margin-bottom-large">
        <div class="grid-row">
          <div class="grid-item item-s-9 offset-s-3 margin-bottom-basic">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>
      </section>

      <section class="grid-row">
        <div class="grid-item item-s-12">
          <?php the_content(); ?>
        </div>
      </section>

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