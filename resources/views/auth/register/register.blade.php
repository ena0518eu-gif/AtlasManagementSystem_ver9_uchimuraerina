<x-guest-layout>
  <form action="{{ route('registerPost') }}" method="POST">
    <div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
      <div class="w-25 vh-75 border p-3">
        <div class="register_form">

          <div class="d-flex mt-3" style="justify-content:space-between">
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

          <div class="mt-3">

            @error('mail_address')
              <div class="text-danger">{{ $message }}</div>
            @enderror

            <label class="m-0 d-block" style="font-size:13px">メールアドレス</label>
            <div class="border-bottom border-primary">
              <input type="text" class="w-100 border-0" name="mail_address" value="{{ old('mail_address') }}">
            </div>
          </div>
        </div>

        <div class="mt-3">

          @error('sex')
            <div class="text-danger">{{ $message }}</div>
          @enderror

          <input type="radio" name="sex" value="1" {{ old('sex') == 1 ? 'checked' : '' }}> 男性
          <input type="radio" name="sex" value="2" {{ old('sex') == 2 ? 'checked' : '' }}> 女性
          <input type="radio" name="sex" value="3" {{ old('sex') == 3 ? 'checked' : '' }}> その他
        </div>

        <div class="mt-3">

          @error('birth_day')
            <div class="text-danger">{{ $message }}</div>
          @enderror

          <label style="font-size:13px">生年月日</label><br>

          <select name="old_year">
            <option value="">-----</option>
            @for($i = 1985; $i <= date('Y'); $i++)
              <option value="{{ $i }}" {{ old('old_year') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>

          <select name="old_month">
            <option value="">-----</option>
            @for($i = 1; $i <= 12; $i++)
              <option value="{{ $i }}" {{ old('old_month') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>

          <select name="old_day">
            <option value="">-----</option>
            @for($i = 1; $i <= 31; $i++)
              <option value="{{ $i }}" {{ old('old_day') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
          </select>
        </div>

        <div class="mt-3">

          @error('role')
            <div class="text-danger">{{ $message }}</div>
          @enderror

          <label>役職</label><br>
          <input type="radio" name="role" value="1" {{ old('role') == 1 ? 'checked' : '' }}>教師(国語)
          <input type="radio" name="role" value="2" {{ old('role') == 2 ? 'checked' : '' }}>教師(数学)
          <input type="radio" name="role" value="3" {{ old('role') == 3 ? 'checked' : '' }}>教師(英語)
          <input type="radio" name="role" value="4" {{ old('role') == 4 ? 'checked' : '' }}>生徒
        </div>

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
