<x-sidebar>
  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

  <!-- ★ 予約フォーム追加 -->
  <form method="POST" action="{{ route('reserveParts') }}" id="reserveParts">
    @csrf

    <!-- ★ w-75削除して外枠を広げる -->
    <div class="calendar_area">
      <div class="w-100">
        <p class="calendar-title">{{ $calendar->getTitle() }}</p>

        <!-- カレンダー表示 -->
        {!! $calendar->render() !!}

      </div>
    <!-- ★ 送信ボタン右寄せ -->
    <div style="text-align:right; margin-top:20px;">
      <button type="submit" class="btn btn-primary">予約する</button>
    </div>

    </div>

  </form>

  {{-- キャンセル確認モーダル --}}
  <div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <p>予約日：<span id="modalReserveDate"></span></p>
          <p>時間：<span id="modalReservePart"></span></p>
          <p>上記の予約をキャンセルしてもよろしいですか？</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
          <form method="POST" action="{{ route('deleteParts') }}" id="cancelForm" style="display:inline;">
            @csrf
            <input type="hidden" name="reserve_id" id="modalReserveId">
            <button type="submit" class="btn btn-danger">キャンセル</button>
          </form>
        </div>

      </div>
    </div>
  </div>

</x-sidebar>
