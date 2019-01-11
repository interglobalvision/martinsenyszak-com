<?php
get_header();
?>

<main id="main-content">
  <section id="page-about">
    <div class="container">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $pullquote = get_post_meta($post->ID, '_igv_pullquote', true);
    $selected = get_post_meta($post->ID, '_igv_selected', true);
    $email = get_post_meta($post->ID, '_igv_email', true);
    $links = get_post_meta($post->ID, '_igv_links', true);
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <?php
        if ($pullquote) {
      ?>
      <section id="about-page-pullquote" class="grid-row">
        <div class="grid-item item-s-12 padding-top-large padding-bottom-large text-align-center font-size-large pull-quote">
          <?php echo $pullquote; ?>
        </div>
      </section>
      <?php
        }
      ?>
      <section id="about-page-text">
        <div class="grid-row margin-bottom-basic">
          <div class="grid-item item-s-3 font-weight-normal">
            About
          </div>
          <div class="grid-item item-s-9 font-color-black">
            <?php the_content(); ?>
          </div>
        </div>

        <?php
          if ($selected) {
        ?>
        <div class="grid-row margin-bottom-basic">
          <div class="grid-item item-s-3 font-weight-normal">
            Selected clients & publications
          </div>
          <div class="grid-item item-s-9 font-color-black">
            <?php echo apply_filters('the_content', $selected); ?>
          </div>
        </div>
        <?php
          }

          if ($email) {
        ?>
        <div class="grid-row margin-bottom-basic">
          <div class="grid-item item-s-3 font-weight-normal">
            Contact
          </div>
          <div class="grid-item item-s-9 font-color-black">
            <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
          </div>
        </div>
        <?php
          }

          if ($links) {
        ?>
        <div class="grid-row margin-bottom-basic">
          <div class="grid-item item-s-3 font-weight-normal">
            Social
          </div>
          <div class="grid-item item-s-9 font-color-black">
            <ul>
              <?php
                foreach($links as $link) {
                  echo '<li><a href="' . $link['link'] . '" target="_blank" rel="noopener">' . $link['name'] . '</a></li>';
                }
              ?>
            </ul>
          </div>
        </div>
        <?php
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