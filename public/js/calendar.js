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
});
