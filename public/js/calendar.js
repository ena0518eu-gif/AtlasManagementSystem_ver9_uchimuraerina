$(function () {
  // キャンセルボタン押下時
  $(document).on('click', '.btn-cancel-reserve', function () {
    // data属性から値を取得
    var reserveDate = $(this).data('date'); // 予約日
    var reservePart = $(this).data('part'); // 部数（場所）
    var reserveId = $(this).data('id'); // 予約ID

    // モーダルに値をセット
    $('#modalReserveDate').text(reserveDate);
    $('#modalReservePart').text(reservePart);
    $('#modalReserveId').val(reserveId);

    // モーダルを表示
    $('#cancelModal').modal('show');
  });

  // 今日以降の未来日クリック時にキャンセルボタンに変換
  $(document).on('click', '.part-counts a', function (e) {
    var partDate = $(this).data('date'); // YYYY-MM-DD
    var today = new Date().toISOString().split('T')[0];

    if (partDate >= today) {
      e.preventDefault(); // 通常リンク無効化
      $(this).addClass('btn-cancel-reserve'); // キャンセルクラス付与
      $(this).click(); // モーダル表示
    }
  });
});
