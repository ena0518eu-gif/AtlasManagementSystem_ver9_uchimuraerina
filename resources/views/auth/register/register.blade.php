<x-guest-layout>
  <!-- register.css を適用 -->
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">

  <form action="{{ route('registerPost') }}" method="POST">
    <div class="w-100 vh-100 d-flex register-wrapper" style="align-items:center; justify-content:center;">
      <div class="register-card border p-3">
        <div class="register_form">

          <!-- 姓・名 -->
          <div class="d-flex mt-3" style="justify-content:space-between;">
            <div style="width:140px">
              @error('over_name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <label class="d-block m-0" style="font-size:13px">姓</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="over_name" value="{{ old('over_name') }}">
              </div>
            </div>

            <div style="width:140px">
              @error('under_name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <label class="d-block m-0" style="font-size:13px">名</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="under_name" value="{{ old('under_name') }}">
              </div>
            </div>
          </div>

          <!-- セイ・メイ -->
          <div class="d-flex mt-3" style="justify-content:space-between">
            <div style="width:140px">
              @error('over_name_kana')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <label class="d-block m-0" style="font-size:13px">セイ</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="over_name_kana" value="{{ old('over_name_kana') }}">
              </div>
            </div>

            <div style="width:140px">
              @error('under_name_kana')
                <div class="text-danger">{{ $message }}</div>
              @enderror
              <label class="d-block m-0" style="font-size:13px">メイ</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="under_name_kana" value="{{ old('under_name_kana') }}">
              </div>
            </div>
          </div>

          <!-- メールアドレス -->
          <div class="mt-3">
            @error('mail_address')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            <label class="m-0 d-block" style="font-size:13px">メールアドレス</label>
            <div class="border-bottom border-primary">
              <input type="text" class="w-100 border-0" name="mail_address" value="{{ old('mail_address') }}">
            </div>
          </div>

<!-- 生年月日 -->
<div class="mt-3 birthday-select">
  @error('birth_day')
    <div class="text-danger">{{ $message }}</div>
  @enderror

  <!-- ラベル -->
  <label>生年月日</label>

  <!-- 入力（ラベルの下に移動） -->
  <div class="birthday-inputs">
    <select name="old_year">
      <option value="">----</option>
      @for($i = 1985; $i <= date('Y'); $i++)
        <option value="{{ $i }}" {{ old('old_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
      @endfor
    </select>
    <span>年</span>

    <select name="old_month">
      <option value="">----</option>
      @for($i = 1; $i <= 12; $i++)
        <option value="{{ $i }}" {{ old('old_month') == $i ? 'selected' : '' }}>{{ $i }}</option>
      @endfor
    </select>
    <span>月</span>

    <select name="old_day">
      <option value="">----</option>
      @for($i = 1; $i <= 31; $i++)
        <option value="{{ $i }}" {{ old('old_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
      @endfor
    </select>
    <span>日</span>
  </div>
</div>
        </div>

        <!-- 性別 -->
        <div class="mt-3 sex-radio">
          @error('sex')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <input type="radio" name="sex" value="1" {{ old('sex') == 1 ? 'checked' : '' }}> 男性
          <input type="radio" name="sex" value="2" {{ old('sex') == 2 ? 'checked' : '' }}> 女性
          <input type="radio" name="sex" value="3" {{ old('sex') == 3 ? 'checked' : '' }}> その他
        </div>

<!-- 役職 -->
<div class="mt-3 role-radio">
  @error('role')
    <div class="text-danger">{{ $message }}</div>
  @enderror

  <!-- ラベル -->
  <div class="role-label">役職</div>

  <!-- ラジオボタン（下に配置） -->
  <div class="role-options">
    <input type="radio" name="role" value="1" {{ old('role') == 1 ? 'checked' : '' }}>教師(国語)
    <input type="radio" name="role" value="2" {{ old('role') == 2 ? 'checked' : '' }}>教師(数学)
    <input type="radio" name="role" value="3" {{ old('role') == 3 ? 'checked' : '' }}>教師(英語)
    <input type="radio" name="role" value="4" {{ old('role') == 4 ? 'checked' : '' }}>生徒
  </div>
</div>
        <!-- パスワード -->
        <div class="mt-3">
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
          <label>パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100" name="password">
          </div>
        </div>

        <div class="mt-3">
          <label>確認用パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100" name="password_confirmation">
          </div>
        </div>

        <div class="mt-5 text-right">
          <input type="submit" class="btn btn-primary" value="新規登録">
        </div>

        <div class="text-center">
          <a href="{{ route('loginView') }}">ログイン</a>
        </div>

      </div>
      {{ csrf_field() }}
    </div>
  </form>
</x-guest-layout>
