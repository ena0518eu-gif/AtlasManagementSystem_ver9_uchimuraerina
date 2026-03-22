<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>AtlasBulletinBoard</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Oswald:wght@200&display=swap" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="all_content">

<div class="d-flex">

<!-- サイドバー -->
<div class="sidebar">

<p>
<a href="{{ route('top.show') }}">
<img src="{{ asset('image/home.png') }}" class="sidebar-icon">
トップ
</a>
</p>

<p>
<a href="/logout">
<img src="{{ asset('image/logout.png') }}" class="sidebar-icon">
ログアウト
</a>
</p>

<p>
<a href="{{ route('calendar.general.show',['user_id' => Auth::id()]) }}">
<img src="{{ asset('image/calendar-register.png') }}" class="sidebar-icon">
スクール予約
</a>
</p>

{{-- 講師アカウント（role 1・2・3）のみ表示 --}}
@if(Auth::user()->role != 4)
<p>
<a href="{{ route('calendar.admin.show',['user_id' => Auth::id()]) }}">
<img src="{{ asset('image/calendar-check.png') }}" class="sidebar-icon">
スクール予約確認
</a>
</p>

<p>
<a href="{{ route('calendar.admin.setting',['user_id' => Auth::id()]) }}">
<img src="{{ asset('image/calendar-plus.png') }}" class="sidebar-icon">
スクール枠登録
</a>
</p>
@endif

<p>
<a href="{{ route('post.show') }}">
<img src="{{ asset('image/board.png') }}" class="sidebar-icon">
掲示板
</a>
</p>

<p>
<a href="{{ route('user.show') }}">
<img src="{{ asset('image/user-serch.png') }}" class="sidebar-icon">
ユーザー検索
</a>
</p>

</div>

<!-- メイン -->
<div class="main-container">
{{ $slot }}
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap4 JS（モーダル動作に必要） -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="{{ asset('js/bulletin.js') }}"></script>
<script src="{{ asset('js/user_search.js') }}"></script>
<script src="{{ asset('js/calendar.js') }}"></script>

</body>
</html>
