<x-sidebar>

  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

  <div class="w-75 m-auto">
    <div class="w-100">
      <p>{{ $calendar->getTitle() }}</p>

      <!-- カレンダー表示 -->
      {!! $calendar->render() !!}

    </div>
  </div>

  <!-- 登録ボタン -->
  <div style="text-align:right; margin: 20px auto; width:75%;">
    <button type="submit" form="reserveSetting" class="btn btn-primary"
      onclick="return confirm('予約枠を登録してよろしいですか？')">登録</button>
  </div>

</x-sidebar>
