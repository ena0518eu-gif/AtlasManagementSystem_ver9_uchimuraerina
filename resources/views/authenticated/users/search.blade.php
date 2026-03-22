<x-sidebar>
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<!-- ＜p＞ユーザー検索＜/p＞ -->
<div class="search_content w-100 border d-flex">

  <div class="reserve_users_area">

    @foreach($users as $user)

    <div class="border one_person">

      <div>
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>

      <div>
        <span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>

      <div>
        <span>カナ : </span>
        <span class="value-bold">({{ $user->over_name_kana }}</span>
        <span class="value-bold">{{ $user->under_name_kana }})</span>
      </div>

      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span class="value-bold">男</span>
        @elseif($user->sex == 2)
        <span>性別 : </span><span class="value-bold">女</span>
        @else
        <span>性別 : </span><span class="value-bold">その他</span>
        @endif
      </div>

      <div>
        <span>生年月日 : </span>
        <span class="value-bold">{{ $user->birth_day }}</span>
      </div>

      <div>
        @if($user->role == 1)
        <span>役職 : </span><span class="student">教師(国語)</span>
        @elseif($user->role == 2)
        <span>役職 : </span><span class="student">教師(数学)</span>
        @elseif($user->role == 3)
        <span>役職 : </span><span class="student">講師(英語)</span>
        @else
        <span>役職 : </span><span class="student">生徒</span>
        @endif
      </div>

      <div>
        @if($user->role == 4)
        <span>選択科目 :</span>
        @endif
      </div>

    </div>

    @endforeach

  </div>


  <!-- ===============================
       検索フォーム
  ================================= -->

  <div class="search_area w-25 border">

    <div class="search_title">検索</div>

    <div>
      <input type="text"
        class="free_word"
        name="keyword"
        placeholder="キーワードを検索"
        form="userSearchRequest">
    </div>

    <div>
      <label>カテゴリ</label>
      <select form="userSearchRequest" name="category">
        <option value="name">名前</option>
        <option value="id">社員ID</option>
      </select>
    </div>

    <div>
      <label>並び替え</label>
      <select name="updown" form="userSearchRequest">
        <option value="ASC">昇順</option>
        <option value="DESC">降順</option>
      </select>
    </div>


    <!-- ===============================
         検索条件アコーディオン
    ================================= -->

    <div>

      <!-- ↓ p タグ → div タグに変更 -->
      <div class="m-0 search_conditions_toggle" id="accordionToggle">
        <span>検索条件の追加</span>
        <span class="arrow"></span>
      </div>

      <div class="search_conditions_inner" id="accordionInner">

        <div>
          <label>性別</label>
          <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
          <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
          <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
        </div>

        <div>
          <label>権限</label>

          <select name="role" form="userSearchRequest" class="engineer">

            <option selected disabled>----</option>

            <option value="1">教師(国語)</option>
            <option value="2">教師(数学)</option>
            <option value="3">教師(英語)</option>
            <option value="4">生徒</option>

          </select>

        </div>

        <div class="selected_engineer">
          <label>選択科目</label>

          <div class="subject_box">
            <!-- ↓ name を subject_id[] に、value をDBのIDに変更 -->
            <label><input type="checkbox" name="subject_id[]" value="1" form="userSearchRequest">国語</label>
            <label><input type="checkbox" name="subject_id[]" value="2" form="userSearchRequest">数学</label>
            <label><input type="checkbox" name="subject_id[]" value="3" form="userSearchRequest">英語</label>
          </div>

        </div>

      </div>

    </div>

    <div>
      <input type="submit" name="search_btn" value="検索" form="userSearchRequest">
    </div>

    <div>
      <button type="button" id="resetBtn">リセット</button>
    </div>

    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>

  </div>

</div>

<!-- ===============================
     アコーディオン JavaScript
================================= -->
<script src="{{ asset('js/user_search.js') }}"></script>

</x-sidebar>
