<?php
get_header();
?>

<main id="main-content">
  <section id="posts">
    <div class="container">
      <div class="grid-row">

<?php
if (have_posts()) {
  $i = 1;
  while (have_posts()) {
    the_post();

    $webm = get_post_meta($post->ID, '_igv_webm', true);
    $mp4 = get_post_meta($post->ID, '_igv_mp4', true);
?>

        <article <?php
          $post_class = 'grid-item item-s-12 margin-bottom-small';

          // every third post goes full width
          if ($i % 3 === 0) {
            post_class($post_class);
          } else {
            post_class($post_class . ' item-m-6');
          }
        ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <div class="post-visual">
              <?php
                if ($webm && $mp4) {
              ?>
                <video muted autoplay loop>
                  <source src="<?php echo $webm; ?>" type="video/webm">
                  <source src="<?php echo $mp4; ?>" type="video/mp4">
                </video>
              <?php
                } else {
                  the_post_thumbnail('gallery');
                }
              ?>
            </div>

            <div class="post-text margin-top-tiny">
              <?php the_title(); ?>
            </div>
          </a>
        </article>

<?php
    $i++;
  }
} else {
?>
        <article class="u-alert grid-item item-s-12"><?php _e('Sorry, no posts matched your criteria'); ?></article>
<?php
} ?>

      </div>
    </div>
  </section>

  <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>