<x-guest-layout>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <form action="{{ route('loginPost') }}" method="POST">
    <div class="login-wrapper">
      <div class="login-container">

        {{-- ロゴ（カードの真上） --}}
        <div class="login-logo">
          <img src="{{ asset('image/atlas-black.png') }}" alt="Atlas Black">
        </div>

        {{-- ログインカード --}}
        <div class="login-card">
          <div class="w-75 m-auto pt-3">
            <label class="d-block m-0" style="font-size:13px;">メールアドレス</label>
            <div class="border-bottom border-primary w-100">
              <input type="text" class="w-100 border-0" name="mail_address">
            </div>
          </div>
          <div class="w-75 m-auto pt-4">
            <label class="d-block m-0" style="font-size:13px;">パスワード</label>
            <div class="border-bottom border-primary w-100">
              <input type="password" class="w-100 border-0" name="password">
            </div>
          </div>
          <div class="text-right m-3">
            <input type="submit" class="btn btn-primary" value="ログイン">
          </div>
          <div class="text-center">
            <a href="{{ route('registerView') }}">新規登録はこちら</a>
          </div>
        </div>

      </div>
      {{ csrf_field() }}
    </div>
  </form>
</x-guest-layout>
