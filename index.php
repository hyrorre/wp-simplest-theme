<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= bloginfo('name') ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php get_header(); ?>
  <div class="container-xl flex-grow-1 d-flex flex-column flex-xl-row align-items-start">
    <main class="container flex-grow-1">
      <?php while (have_posts()) : ?>
        <article class="py-4 border-bottom">
          <?php the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="link-dark text-decoration-none">
            <h2><?php the_title(); ?></h2>
          </a>
          <div class="px-1 text-secondary">
            <div class="me-2">
              <i class="bi bi-calendar me-2"></i>
              <?php the_time('Y-m-d'); ?>
            </div>
            <div class="d-flex flex-wrap">
              <div class="d-flex me-2">
                <i class="bi bi-folder me-2"></i>
                <?php the_category(); ?>
              </div>
              <div class="post-tags me-2">
                <i class="bi bi-tags me-2"></i>
                <?php the_tags('', ''); ?>
              </div>
            </div>
          </div>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    </main>
    <?php get_sidebar(); ?>
  </div>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>