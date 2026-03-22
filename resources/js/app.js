import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

{ { --JS 投稿詳細画面のモーダル制御-- } }

// 編集モーダル（投稿編集用）
document.querySelectorAll('.edit-modal-open').forEach(function (el) {
  el.addEventListener('click', function () {
    const modal = document.querySelector('.js-modal');
    const postTitleInput = modal.querySelector('input[name="post_title"]');
    const postBodyTextarea = modal.querySelector('textarea[name="post_body"]');
    const postIdInput = modal.querySelector('input[name="post_id"]');

    // ボタン属性から値を取得してセット
    postTitleInput.value = this.getAttribute('post_title');
    postBodyTextarea.value = this.getAttribute('post_body');
    postIdInput.value = this.getAttribute('post_id');

    // モーダル表示
    modal.classList.add('is-open');
  });
});

// 削除モーダル（投稿削除用）
document.querySelectorAll('.delete-modal-open').forEach(function (el) {
  el.addEventListener('click', function () {
    const postId = this.dataset.postId;
    const form = document.getElementById('deleteForm');
    form.action = `/bulletin_board/delete/${postId}`; // ルートに合わせる
    document.querySelector('.js-delete-modal').classList.add('is-open');
  });
});

// モーダル閉じるボタン
document.querySelectorAll('.js-modal-close').forEach(function (el) {
  el.addEventListener('click', function () {
    document.querySelector('.js-delete-modal').classList.remove('is-open');
    document.querySelector('.js-modal').classList.remove('is-open');
  });
});
