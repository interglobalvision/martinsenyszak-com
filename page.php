<?php
get_header();
?>

<main id="main-content">
  <section id="page">
    <div class="container">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
      <section id="single-post-text" class="margin-top-basic margin-bottom-large">
        <div class="grid-row">
          <div class="grid-item item-s-10 offset-s-1 item-m-9 offset-m-3 margin-bottom-basic">
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