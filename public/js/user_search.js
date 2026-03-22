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

});
