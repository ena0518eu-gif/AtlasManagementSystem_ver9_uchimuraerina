<x-sidebar>

  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

  <div class="w-75 m-auto">
    <div class="w-100">
      <p>{{ $calendar->getTitle() }}</p>

      <!-- カレンダー表示 -->
      {!! $calendar->render() !!}

    </div>
  </div>

</x-sidebar>
