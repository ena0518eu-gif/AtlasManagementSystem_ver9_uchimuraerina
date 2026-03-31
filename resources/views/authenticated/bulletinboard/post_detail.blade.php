<x-sidebar>
<div class="vh-100 d-flex">
  <div class="w-50 mt-5">
    <div class="m-3 detail_container">
      <div class="p-3">
        <div class="detail_inner_head">
          <div>
            {{-- サブカテゴリー表示 --}}
            @foreach($post->subCategories as $postSubCategory)
              <span class="badge badge-info">{{ $postSubCategory->subCategory->sub_category ?? '' }}</span>
            @endforeach
          </div>
          <div>
            {{-- 編集・削除ボタンは自分の投稿にのみ表示 --}}
            @if(Auth::id() === $post->user_id)
            <button class="btn btn-primary btn-sm edit-modal-open mr-2"
              post_title="{{ $post->post_title }}"
              post_body="{{ $post->post }}"
              post_id="{{ $post->id }}">編集</button>
            <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="post" style="display:inline">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('{{ $post->post_title }}の投稿を削除してよろしいですか？')">削除</button>
            </form>
            @endif
          </div>
        </div>

        <div class="contributor d-flex">
          <p>
            <span>{{ $post->user->over_name }}</span>
            <span>{{ $post->user->under_name }}</span>
            さん
          </p>

          {{--  投稿日時削除 --}}
          <!-- <span class="ml-5">{{ $post->created_at }}</span> -->
        </div>

        {{-- バリデーション表示（本画面）削除対象 --}}
        {{--
        @if($errors->has('post_title'))
          <p class="text-danger">{{ $errors->first('post_title') }}</p>
        @endif
        --}}

        <div class="detsail_post_title">{{ $post->post_title }}</div>

        {{--
        @if($errors->has('post_body'))
          <p class="text-danger">{{ $errors->first('post_body') }}</p>
        @endif
        --}}

        <div class="mt-3 detsail_post">{{ $post->post }}</div>
      </div>

      <div class="p-3">
        <div class="comment_container">
          <span>コメント</span>
          @foreach($post->postComments as $comment)
          <div class="comment_area border-top">
            <p>
              <span>{{ $comment->commentUser($comment->user_id)->over_name }}</span>
              <span>{{ $comment->commentUser($comment->user_id)->under_name }}</span>さん
            </p>
            <p>{{ $comment->comment }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="w-50 p-3">
    <div class="comment_container border m-5">
      <div class="comment_area p-3">

        {{-- バリデーションメッセージ --}}
        @if($errors->has('comment'))
          <p class="text-danger m-0">{{ $errors->first('comment') }}</p>
        @endif

        <p class="m-0">コメントする</p>

        <form action="{{ route('comment.create') }}" method="post">
          {{ csrf_field() }}

          <textarea class="w-100" name="comment">{{ old('comment') }}</textarea>

          <input type="hidden" name="post_id" value="{{ $post->id }}">

          <input type="submit" class="btn btn-primary" value="投稿">
        </form>

      </div>
    </div>
  </div>
</div>

{{-- 編集モーダル --}}
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="{{ route('post.edit') }}" method="post">
      <div class="w-100">

        <div class="modal-inner-title w-50 m-auto">

          {{-- モーダル内バリデーション（ラベルの上に表示） --}}
          @error('post_title')
            <p class="text-danger">{{ $message }}</p>
          @enderror

          <label for="post_title">タイトル</label>
          <input id="post_title" type="text" name="post_title" class="w-100"
            value="{{ old('post_title', $post->post_title) }}">
        </div>

        <div class="modal-inner-body w-50 m-auto pt-3 pb-3">

          {{-- モーダル内バリデーション（ラベルの上に表示） --}}
          @error('post_body')
            <p class="text-danger">{{ $message }}</p>
          @enderror

          <label for="post_body">投稿内容</label>
          <textarea id="post_body" name="post_body" class="w-100">{{ old('post_body', $post->post) }}</textarea>
        </div>

        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="hidden" class="edit-modal-hidden" name="post_id" value="{{ $post->id }}">
          <input type="submit" class="btn btn-primary d-block" value="編集">
        </div>

      </div>
      {{ csrf_field() }}
    </form>
  </div>
</div>

{{-- 編集ボタン --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editModalButton = document.querySelector('.edit-modal-open');
    const modal = document.querySelector('.modal');
    const closeModalButton = document.querySelector('.js-modal-close');

    if (editModalButton) {
      editModalButton.addEventListener('click', function() {
        modal.style.display = 'block';
        document.querySelector('input[name="post_title"]').value = editModalButton.getAttribute('post_title');
        document.querySelector('textarea[name="post_body"]').value = editModalButton.getAttribute('post_body');
        document.querySelector('input[name="post_id"]').value = editModalButton.getAttribute('post_id');
      });
    }

    if (closeModalButton) {
      closeModalButton.addEventListener('click', function() {
        modal.style.display = 'none';
      });
    }
  });
</script>

{{-- バリデーション時の自動モーダル表示 --}}
@if($errors->has('post_title') || $errors->has('post_body'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.modal').style.display = 'block';
  });
</script>
@endif

</x-sidebar>
