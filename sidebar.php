<aside class="sidebar text-secondary border-start flex-glow-0 flex-shrink-0 my-4 mx-2 ms-lg-3 p-3">
  <div class="d-none">
    <h4><i class="bi bi-list-ul me-2"></i>目次</h4>
    <ul>
      <li v-for="link of page.body.toc.links">
        <a :href="`#${link.id}`" class="text-secondary text-decoration-none">{{ link.text }}</a>
        <ul v-if="link.children">
          <li v-for="child of link.children">
            <a :href="`#${child.id}`" class="text-secondary text-decoration-none">{{ child.text }}</a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <h4><i class="bi bi-folder me-2"></i>カテゴリ</h4>
  <ul class="ps-0">
    <?php foreach (get_categories() as $category) : ?>
      <li class="list-unstyled">
        <a href="<?= get_category_link($category->term_id); ?>"><?= $category->name; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
  <h4><i class="bi bi-tags me-2"></i>タグ</h4>
  <ul class="d-flex flex-wrap list-unstyled">
    <?php wp_tag_cloud(); ?>
  </ul>
  <?php dynamic_sidebar( 'profile' ); ?>
</aside>