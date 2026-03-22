<x-sidebar>
<link rel="stylesheet" href="{{ asset('css/postlist.css') }}">
<script src="{{ asset('js/postlist.js') }}"></script>

<div class="board_area w-100 m-auto d-flex"> {{-- border を削除 --}}
  <div class="post_view w-75 mt-5">
    <!-- <p class="w-75 m-auto">投稿一覧</p> -->
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>

      <!-- サブカテゴリー表示 -->
      <div class="mb-2">
        @foreach($post->subCategories as $postSubCategory)
          @if($postSubCategory->subCategory)
            <span class="category_box">{{ $postSubCategory->subCategory->sub_category }}</span>
          @endif
        @endforeach
      </div>

      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class=""></span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"></span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}"></span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="other_area w-25">
    <div class="m-4 category_area">

      <!-- 投稿ボタン -->
      <div class="mb-2">
        <a href="{{ route('post.input') }}" class="post_btn">投稿</a>
      </div>

      <!-- 検索 -->
      <div class="mb-2">
        <!-- <p class="category_title">キーワード検索</p> -->
        <div class="search_area">
          <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
          <input type="submit" value="検索" form="postSearchRequest">
        </div>
      </div>

      <!-- ボタン（） -->
      <div class="mt-2 btn_group">
        <input type="submit" name="like_posts" class="category_btn like_btn_custom" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="category_btn mypost_btn_custom" value="自分の投稿" form="postSearchRequest">
      </div>

      <!-- ▼カテゴリ -->
      <p class="category_title mt-3">カテゴリー検索</p>
      <ul class="category_list">
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}">

          <!-- メインカテゴリ -->
          <div class="main_category_header">
            <span class="category_name">{{ $category->main_category }}</span>
            <span class="arrow"></span>
          </div>

          <!-- サブカテゴリ -->
          <ul class="sub_categories">
            @foreach($category->subCategories as $sub)
            <li>
              <label>
                <input type="checkbox" name="category_word" value="{{ $sub->id }}" form="postSearchRequest">
                {{ $sub->sub_category }}
              </label>
            </li>
            @endforeach
          </ul>

        </li>
        @endforeach
      </ul>
      <!-- ▲カテゴリ -->

    </div>
  </div>

  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
</x-sidebar>
