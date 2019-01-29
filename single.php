<?php
get_header();
?>

<main id="main-content">
  <section id="single-post">
    <div class="container">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $embeds = get_post_meta($post->ID, '_igv_embeds', true);
    $credits = get_post_meta($post->ID, '_igv_credits', true);
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <section id="single-post-player" class="grid-row">
        <?php
          if (isset($embeds) && !empty($embeds)) {
            foreach ($embeds as $embed_url) {
        ?>
        <div class="grid-item item-s-12 margin-bottom-basic">
          <?php if (strrpos($embed_url, 'vimeo.com')) { ?>
            <div data-vimeo-url="<?php echo $embed_url; ?>" id="single-post-vimeo" class="u-video-embed-container"></div>
          <?php }  else if (strrpos($embed_url, 'youtube')) { ?>
            <div class="u-video-embed-container">
              <iframe width="100%" src="<?php echo $embed_url; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          <?php } ?>
        </div>
        <?php
            }
          }
        ?>
      </section>

      <section id="single-post-text" class="margin-bottom-large">
        <div class="grid-row">
          <div class="grid-item item-s-9 offset-s-3 margin-bottom-basic">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>

        <?php
          if ($credits) {
            foreach ($credits as $credit) {
        ?>
        <div class="grid-row margin-bottom-tiny">
          <div class="grid-item item-s-3 item-m-3 offset-m-1 font-weight-normal">
            <?php echo $credit['role']; ?>
          </div>
          <div class="grid-item item-s-9 item-m-7 font-color-black">
            <?php echo $credit['credit']; ?>
          </div>
        </div>
        <?php
            }
          }
        ?>
      </section>

      <section id="single-post-gallery" class="grid-row">
        <div class="grid-item item-s-12 item-m-10 offset-m-1">
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