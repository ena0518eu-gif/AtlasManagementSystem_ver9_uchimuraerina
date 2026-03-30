jQuery(function ($) {
  console.log("user_search.js 読み込み成功");

  // ===============================
  // 検索条件アコーディオン
  // ===============================
  $('.search_conditions_toggle').on('click', function () {
    console.log("検索条件クリック");

    const inner = $('.search_conditions_inner');
    const arrow = $(this).find('.arrow');

    inner.slideToggle(300);
    arrow.toggleClass('open');
  });

  // ===============================
  // リセットボタン
  // ===============================
  $('#resetBtn').on('click', function () {
    console.log("リセットボタン押された");

    // テキスト入力をクリア
    $('input[name="keyword"]').val('');

    // セレクトボックスを初期値に戻す
    $('select[name="category"]').val('name');
    $('select[name="updown"]').val('ASC');
    $('select[name="role"]').prop('selectedIndex', 0);

    // ラジオボタンをリセット
    $('input[type="radio"]').prop('checked', false);

    // チェックボックスをリセット
    $('input[type="checkbox"]').prop('checked', false);

    // ← リセット後に全件検索を実行
    $('#userSearchRequest').submit();
  });

  // ===============================
  // コメント投稿処理
  // ===============================
  $('#commentRequest').on('submit', function (e) {
    e.preventDefault();  // フォーム送信を一時的に停止

    const comment = $('textarea[name="comment"]').val();
    console.log('送信されたコメント:', comment);

    // コメントが入力されているかチェック
    if (comment.trim() !== '') {
      this.submit();  // 実際にフォームを送信
    } else {
      console.log("コメントが空です！");
    }
  });
});
// ===============================
// 選択科目の編集 開閉
// ===============================
$('.subject_toggle').on('click', function () {
  console.log("選択科目の編集クリック");

  const inner = $(this).next('.subject_inner'); // toggleのすぐ下の要素
  inner.toggleClass('open'); // max-height変更
  $(this).toggleClass('open'); // 矢印回転
});
