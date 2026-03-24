<?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/postlist.css')); ?>">
<script src="<?php echo e(asset('js/postlist.js')); ?>"></script>

<div class="board_area w-100 m-auto d-flex"> 
  <div class="post_view w-75 mt-5">
    <!-- <p class="w-75 m-auto">投稿一覧</p> -->
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="post_area border w-75 m-auto p-3">
      <p><span><?php echo e($post->user->over_name); ?></span><span class="ml-3"><?php echo e($post->user->under_name); ?></span>さん</p>
      <p><a href="<?php echo e(route('post.detail', ['id' => $post->id])); ?>"><?php echo e($post->post_title); ?></a></p>

      <!-- サブカテゴリー表示 -->
      <div class="mb-2">
        <?php $__currentLoopData = $post->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($postSubCategory->subCategory): ?>
            <span class="category_box"><?php echo e($postSubCategory->subCategory->sub_category); ?></span>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
            <!-- コメント数表示 -->
            <i class="fa fa-comment"></i><span><?php echo e($post->postComments->count()); ?></span>
          </div>
          <div>
            <?php if(Auth::user()->is_Like($post->id)): ?>
            <!-- いいね済み（赤ハート）＋いいね数 -->
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="<?php echo e($post->id); ?>"></i><span class="like_counts<?php echo e($post->id); ?>"><?php echo e($post->likes->count()); ?></span></p>
            <?php else: ?>
            <!-- 未いいね（白ハート）＋いいね数 -->
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="<?php echo e($post->id); ?>"></i><span class="like_counts<?php echo e($post->id); ?>"><?php echo e($post->likes->count()); ?></span></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <div class="other_area w-25">
    <div class="m-4 category_area">

      <!-- 投稿ボタン -->
      <div class="mb-2">
        <a href="<?php echo e(route('post.input')); ?>" class="post_btn">投稿</a>
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
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="main_categories" category_id="<?php echo e($category->id); ?>">

          <!-- メインカテゴリ -->
          <div class="main_category_header">
            <span class="category_name"><?php echo e($category->main_category); ?></span>
            <span class="arrow"></span>
          </div>

          <!-- サブカテゴリ -->
          <ul class="sub_categories">
            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <label>
                <!-- ★修正：クリックで単一送信（checkbox → radio） -->
                <input type="radio"
                       name="category_word"
                       value="<?php echo e($sub->id); ?>"
                       form="postSearchRequest"
                       onclick="this.form.submit()">
                <?php echo e($sub->sub_category); ?>

              </label>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>

        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <!-- ▲カテゴリ -->

    </div>
  </div>

  <form action="<?php echo e(route('post.show')); ?>" method="get" id="postSearchRequest"></form>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/bulletinboard/posts.blade.php ENDPATH**/ ?>