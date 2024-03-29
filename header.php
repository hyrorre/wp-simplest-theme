<?php $url = ((is_ssl() ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>
<header class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand <?= is_home() || is_front_page() ? 'pe-none' : '' ?>" href="<?= home_url() ?>">
      <?= bloginfo('name') ?>
    </a>
    <ul class="navbar-nav flex-row gap-4">
      <?php if ($menu_items = wp_get_nav_menu_items('Menu')) : ?>
        <?php foreach ($menu_items as $menu_item) : ?>
          <li class="nav-item">
            <a class="nav-link <?= $menu_item->url === $url ? 'pe-none' : '' ?>" href="<?= $menu_item->url ?>">
              <?= $menu_item->title ?>
            </a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </div>
</header>