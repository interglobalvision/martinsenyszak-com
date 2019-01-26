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

    $embeds = false;

    if (!post_password_required()) {
      $embeds = get_post_meta($post->ID, '_igv_private_embeds', true);
    }
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <section id="single-private-copy" class="grid-row">

      </section>

      <section id="single-private-text" class="margin-top-basic margin-bottom-basic">
        <div class="grid-row">
          <div class="grid-item item-s-9 offset-s-3 margin-bottom-basic">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>
        <div class="grid-row">
          <div class="grid-item item-s-12 item-m-10 offset-m-1">
            <?php the_content(); ?>
          </div>
        </div>
      </section>

      <section id="single-post-embeds" class="margin-top-basic margin-bottom-large">
        <?php
          if ($embeds) {
            foreach ($embeds as $embed) {
        ?>
        <div class="private-embed">
          <div class="grid-row margin-bottom-basic">
            <div class="grid-item item-s-12">
              <div data-vimeo-url="<?php echo $embed['vimeo']; ?>" class="u-video-embed-container"></div>
            </div>
          </div>
          <div class="grid-row margin-bottom-basic">
            <div class="grid-item item-s-12 item-m-8 offset-m-2">
              <h2 class="font-size-mid"><?php echo $embed['title']; ?></h2>
            </div>
          </div>
        </div>
        <?php
            }
          }
        ?>
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