<x-sidebar>

  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

  {{-- w-75 m-auto を削除 → calendar_area クラスで幅管理 --}}
  <div class="calendar_area">
    <div class="w-100">
      <p class="calendar-title">{{ $calendar->getTitle() }}</p>

      <!-- カレンダー表示 -->
      {!! $calendar->render() !!}

    </div>
      <!-- 登録ボタン：カレンダー幅に合わせて右寄せ -->
  <div style="text-align:right; margin-top:20px;">
    <button type="submit" form="reserveSetting" class="btn btn-primary"
      onclick="return confirm('予約枠を登録してよろしいですか？')">登録</button>
  </div>

  </div>

</x-sidebar>
