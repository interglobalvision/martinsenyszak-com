<?php
get_header();
?>

<main id="main-content">
  <section id="posts">
    <div class="container">
      <div class="grid-row">

<?php

$max_padding = 17;

if (have_posts()) {
  $i = 1;
  while (have_posts()) {
    the_post();

    $webm = get_post_meta($post->ID, '_igv_webm', true);
    $mp4 = get_post_meta($post->ID, '_igv_mp4', true);

    $ratio = get_post_meta($post->ID, '_igv_ratio', true);

    $random_alignment = rand(1, 2);

    if ($random_alignment === 1) {
      $alignment_class = 'text-align-left';
    } else if ($random_alignment === 2) {
      $alignment_class = 'text-align-center';
    } else {
      $alignment_class = 'text-align-right';
    }
?>

        <article <?php
          $post_class = 'grid-item item-s-12 margin-bottom-small';

          // every third post goes full width
          if ($i % 3 === 0) {
            post_class($post_class);
          } else {
            post_class($post_class . ' item-m-6');
          }

          $padding_left = rand(0, $max_padding) . '%';
          $padding_top = rand(0, ($max_padding / 2)) . '%';
          $padding_right = rand(0, $max_padding) . '%';

          if ($i === 1) {
            echo 'style="padding-right: ' . $padding_right . ';"';
          } else {
            echo 'style="padding-left: ' . $padding_left . '; padding-top: ' . $padding_top . '; padding-right: ' . $padding_right . ';"';
          }
        ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <div class="post-visual <?php
              echo $alignment_class;
              if (!empty($ratio)) {
                echo ' ratio-' . $ratio;
              }
            ?>">
              <?php
                if ($webm && $mp4) {
              ?>
                <video muted autoplay loop poster="<?php echo the_post_thumbnail_url('gallery'); ?>">
                  <source src="<?php echo $webm; ?>" type="video/webm">
                  <source src="<?php echo $mp4; ?>" type="video/mp4">
                </video>
              <?php
                } else {
                  the_post_thumbnail('gallery');
                }
              ?>
            </div>

            <div class="post-text margin-top-tiny font-color-black">
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