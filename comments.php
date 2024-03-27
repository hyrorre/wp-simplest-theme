<?php if (have_comments()) : ?>
  <h2>コメント</h2>
  <ul class="comment-list list-unstyled px-2 mt-2 mb-4 border-start border-5 border-dark-subtle">
    <?php function list_comments($comment) { ?>
      <li class="mt-2 border-bottom">
        <div class="mb-2">
          <?= get_avatar($comment, 40); ?>
          <span class="comment-author ms-1"><?php comment_author(); ?></span>
          <span class="comment-datetime">(<?php comment_date(); ?> <?php comment_time(); ?>)</span>
        </div>
        <div class="comment-text"><?php comment_text(); ?></div>
        <?php comment_reply_link(['depth' => 1, 'max_depth' => 10, 'reply_text' => '<i class="bi bi-reply"></i> 返信']) ?>
      </li>
    <?php } ?>
    <?php wp_list_comments(['callback' => 'list_comments']); ?>
  </ul>
<?php endif; ?>
<?php if (comments_open() && is_single()) : ?>
  <?php comment_form([
    'title_reply' => 'コメントする',
    'title_reply_to' => '%s に返信する',
    'cancel_reply_link' => 'コメントの返信をキャンセル',
    'fields' => [
      'author' => '<p class="comment-form-author">' . '<label for="author" class="form-label">お名前またはニックネーム' . ($req ? '<span class="required">*</span>' : '') . '</label> ' .
        '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
      'email'  => '<p class="comment-form-email"><label for="email" class="form-label">メールアドレス ' . ($req ? '<span class="required">*</span>' : '') . '</label> ' .
        '<input id="email" name="email" type="email" class="form-control" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>',
      'cookies' => '<p class="comment-form-cookies-consent d-flex"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" class="form-check-input me-2" type="checkbox" value="yes" /> <label for="wp-comment-cookies-consent" class="form-check-label">次回のコメントで使用するためブラウザーに自分の名前、メールアドレスを保存する。</label></p>'
    ],
    'comment_field' => '<p class="comment-form-comment"><label for="comment" class="form-label">コメント <span class="required">*</span></label> <textarea id="comment" name="comment" class="form-control" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p>',
    'class_submit' => 'btn btn-secondary'
  ]); ?>
<?php endif; ?>
