<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php is_home() || is_front_page() ? '' : the_title('', ' | ') ?><?php bloginfo('name') ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php get_header(); ?>
  <div class="container-xl flex-grow-1 d-flex flex-column flex-xl-row align-items-start">
    <main class="container flex-grow-1">
      <?php while (have_posts()) : ?>
        <article class="py-4 border-bottom">
          <?php the_post(); ?>
          <?php if (is_single() || is_page()) : ?>
            <h1><?php the_title(); ?></h1>
          <?php else : ?>
            <a href="<?php the_permalink(); ?>" class="link-dark text-decoration-none">
              <h2><?php the_title(); ?></h2>
            </a>
          <?php endif; ?>
          <?php if (!is_page()) : ?>
            <div class="px-1 text-secondary">
              <div class="d-flex flex-wrap">
                <div class="d-flex me-4">
                  <i class="bi bi-calendar me-2"></i>
                  <?php the_time('Y-m-d'); ?>
                </div>
                <div class="d-flex me-2">
                  <i class="bi bi-chat me-2"></i>
                  <?= get_comment_count(get_the_ID())['approved']; ?>
                </div>
              </div>
              <div class="d-flex flex-wrap">
                <div class="d-flex me-3">
                  <i class="bi bi-folder me-2"></i>
                  <?php the_category(); ?>
                </div>
                <div class="post-tags d-flex flex-wrap">
                  <i class="bi bi-tags me-2"></i>
                  <?php the_tags('', ''); ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <div class="content pt-4">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
      <div class="mt-4">
        <!-- TODO: add paging -->
      </div>
      <?php comments_template(); ?>
    </main>
    <?php get_sidebar(); ?>
  </div>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>
