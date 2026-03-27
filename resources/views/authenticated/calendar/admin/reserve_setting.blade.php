<x-sidebar>

  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

  {{-- w-75 m-auto を削除 → calendar_area クラスで幅管理 --}}
  <div class="calendar_area">
    <div class="w-100">
      <p>{{ $calendar->getTitle() }}</p>

      <!-- カレンダー表示 -->
      {!! $calendar->render() !!}

    </div>
      <!-- 登録ボタン：calendar_area の max-width に合わせて右寄せ -->
  <div style="text-align:right; max-width: 1400px; width: calc(100% - 40px); margin: 20px auto; padding-right: 10px;">
    <button type="submit" form="reserveSetting" class="btn btn-primary"
      onclick="return confirm('予約枠を登録してよろしいですか？')">登録</button>
  </div>

  </div>


</x-sidebar>
