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
  <main>
    <?php while (have_posts()) : ?>
      <article class="py-4 border-bottom">
        <?php the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="link-dark text-decoration-none">
          <h2>
            <?php the_title(); ?>
          </h2>
        </a>
        <p>
          <?php the_time('Y/m/d'); ?>
        </p>
        <p>
          <?php the_category(); ?>
          <?php the_tags('', ' '); ?>
        </p>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  </main>
  <?php get_sidebar(); ?>
  <?php get_footer(); ?>
  <?php wp_footer(); ?>
</body>

</html>