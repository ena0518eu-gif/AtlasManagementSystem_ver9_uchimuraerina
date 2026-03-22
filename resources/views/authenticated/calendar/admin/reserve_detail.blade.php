<x-sidebar>

<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

<div class="m-5">
  <h5>{{ $date }} {{ $part == 1 ? '1部' : ($part == 2 ? '2部' : '3部') }}</h5>
    <!-- <h5>{{ $date }} {{ $part == 1 ? 'リモ1部' : ($part == 2 ? 'リモ2部' : 'リモ3部') }} 予約者一覧</h5> -->


  <table class="table mt-3 table-bordered table-striped">
    <thead class="thead-custom">
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>場所</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reservePersons as $reserveSetting)
        @foreach($reserveSetting->users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->over_name }} {{ $user->under_name }}</td>
          <td>リモート</td>
        </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>

  <a href="{{ route('calendar.admin.show', ['user_id' => Auth::id()]) }}" class="btn btn-secondary mt-3">戻る</a>
</div>

</x-sidebar>
