<x-sidebar>

<div class="post_create_container d-flex">

    <!-- 投稿作成エリア -->
    <div class="post_create_area border w-50 m-5 p-5">

        <div class="">
            <p class="mb-0">カテゴリー</p>

            <!-- バリデーションメッセージ -->
            @if($errors->first('post_category_id'))
                <span class="error_message">
                    {{ $errors->first('post_category_id') }}
                </span>
            @endif

            <select class="w-100" form="postCreate" name="post_category_id">
                @foreach($main_categories as $main_category)
                    <optgroup label="{{ $main_category->main_category }}">
                        <!-- サブカテゴリー表示 -->
                        @foreach($main_category->subCategories as $sub_category)
                            <option value="{{ $sub_category->id }}"
                                {{ old('post_category_id') == $sub_category->id ? 'selected' : '' }}>
                                {{ $sub_category->sub_category }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

        </div>

        <div class="mt-3">
            <!-- バリデーションメッセージ -->
            @if($errors->first('post_title'))
                <span class="error_message">
                    {{ $errors->first('post_title') }}
                </span>
            @endif

            <p class="mb-0">タイトル</p>

            <input
                type="text"
                class="w-100"
                form="postCreate"
                name="post_title"
                value="{{ old('post_title') }}"
            >
        </div>

        <div class="mt-3">
            <!-- バリデーションメッセージ -->
            @if($errors->first('post_body'))
                <span class="error_message">
                    {{ $errors->first('post_body') }}
                </span>
            @endif

            <p class="mb-0">投稿内容</p>

            <textarea
                class="w-100"
                form="postCreate"
                name="post_body"
            >{{ old('post_body') }}</textarea>
        </div>

        <div class="mt-3 text-right">
            <input
                type="submit"
                class="btn btn-primary"
                value="投稿"
                form="postCreate"
            >
        </div>

        <form
            action="{{ route('post.create') }}"
            method="post"
            id="postCreate"
        >
            {{ csrf_field() }}
        </form>

    </div>

    <!-- 管理者のみ表示 -->
    <!-- @can('admin') -->

    <div class="category_area w-25 m-5 p-5">

        <div class="">
            <p class="m-0">メインカテゴリー</p>

            <!-- バリデーションメッセージ -->
            @if($errors->first('main_category_name'))
                <span class="error_message">
                    {{ $errors->first('main_category_name') }}
                </span>
            @endif

            <form
                action="{{ route('main.category.create') }}"
                method="post"
                id="mainCategoryRequest"
            >
                {{ csrf_field() }}

                <input
                    type="text"
                    class="w-100"
                    name="main_category_name"
                    value="{{ old('main_category_name') }}"
                >

                <input
                    type="submit"
                    value="追加"
                    class="w-100 btn btn-primary p-0"
                >
            </form>
        </div>

        <!-- サブカテゴリー追加 -->
        <div class="mt-4">
            <p class="m-0">サブカテゴリー</p>

            <form
                action="{{ route('sub.category.create') }}"
                method="post"
                id="subCategoryRequest"
            >
                {{ csrf_field() }}

                <!-- バリデーションメッセージ -->
                @if($errors->first('main_category_id'))
                    <span class="error_message">{{ $errors->first('main_category_id') }}</span>
                @endif

                <select
                    class="w-100 mb-2"
                    name="main_category_id"
                >
                    @foreach($main_categories as $main_category)
                        <option value="{{ $main_category->id }}"
                            {{ old('main_category_id') == $main_category->id ? 'selected' : '' }}>
                            {{ $main_category->main_category }}
                        </option>
                    @endforeach
                </select>

                <!-- バリデーションメッセージ -->
                @if($errors->first('sub_category_name'))
                    <span class="error_message">{{ $errors->first('sub_category_name') }}</span>
                @endif

                <input
                    type="text"
                    class="w-100 mb-2"
                    name="sub_category_name"
                    value="{{ old('sub_category_name') }}"
                >

                <input
                    type="submit"
                    value="追加"
                    class="w-100 btn btn-primary p-0"
                >
            </form>

        </div>

    </div>

    <!-- @endcan -->

</div>

</x-sidebar>
