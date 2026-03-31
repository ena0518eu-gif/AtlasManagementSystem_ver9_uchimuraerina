<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title>AtlasBulletinBoard</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Oswald:wght@200&display=swap" rel="stylesheet">

<!-- CSS -->
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body class="all_content">

<div class="d-flex">

<!-- サイドバー -->
<div class="sidebar">

<p>
<a href="<?php echo e(route('top.show')); ?>">
<img src="<?php echo e(asset('image/home.png')); ?>" class="sidebar-icon">
トップ
</a>
</p>

<p>
<a href="/logout">
<img src="<?php echo e(asset('image/logout.png')); ?>" class="sidebar-icon">
ログアウト
</a>
</p>

<p>
<a href="<?php echo e(route('calendar.general.show',['user_id' => Auth::id()])); ?>">
<img src="<?php echo e(asset('image/calendar-register.png')); ?>" class="sidebar-icon">
スクール予約
</a>
</p>


<?php if(Auth::user()->role != 4): ?>
<p>
<a href="<?php echo e(route('calendar.admin.show',['user_id' => Auth::id()])); ?>">
<img src="<?php echo e(asset('image/calendar-check.png')); ?>" class="sidebar-icon">
スクール予約確認
</a>
</p>

<p>
<a href="<?php echo e(route('calendar.admin.setting',['user_id' => Auth::id()])); ?>">
<img src="<?php echo e(asset('image/calendar-plus.png')); ?>" class="sidebar-icon">
スクール枠登録
</a>
</p>
<?php endif; ?>

<p>
<a href="<?php echo e(route('post.show')); ?>">
<img src="<?php echo e(asset('image/board.png')); ?>" class="sidebar-icon">
掲示板
</a>
</p>

<p>
<a href="<?php echo e(route('user.show')); ?>">
<img src="<?php echo e(asset('image/user-serch.png')); ?>" class="sidebar-icon">
ユーザー検索
</a>
</p>

</div>

<!-- メイン -->
<div class="main-container">

<div class="vh-100">
  <!-- 左寄せ専用クラスを追加 -->
  <div class="top_area profile-left w-75 pt-5">

    <!-- タイトル -->
    <div class="title">
      <span><?php echo e($user->over_name); ?></span>
      <span><?php echo e($user->under_name); ?>さんのプロフィール</span>
    </div>

    <!-- ユーザー情報欄（影付き） -->
    <div class="user_status p-3">
      <p>名前 : <span><?php echo e($user->over_name); ?></span><span class="ml-1"><?php echo e($user->under_name); ?></span></p>
      <p>カナ : <span><?php echo e($user->over_name_kana); ?></span><span class="ml-1"><?php echo e($user->under_name_kana); ?></span></p>
      <p>性別 : <?php if($user->sex == 1): ?><span>男</span><?php else: ?><span>女</span><?php endif; ?></p>
      <p>生年月日 : <span><?php echo e($user->birth_day); ?></span></p>

      <div>
        選択科目 :
        <?php $__currentLoopData = $user->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <span><?php echo e($subject->subject); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>

        <!-- ★ここ重要：クラス変更 -->
        <div class="subject_toggle">
          選択科目の編集
          <span class="arrow"></span>
        </div>

        <!-- 開閉エリア -->
        <div class="subject_inner">
          <form action="<?php echo e(route('user.edit')); ?>" method="post">

            <!-- 横並び -->
            <div class="subject_row">
              <?php $__currentLoopData = $subject_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label>
                  <input type="checkbox" name="subjects[]" value="<?php echo e($subject_list->id); ?>">
                  <?php echo e($subject_list->subject); ?>

                </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <!-- 登録ボタンを横に配置 -->
              <input type="submit" value="登録" class="btn btn-primary">
            </div>

            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            <?php echo e(csrf_field()); ?>


          </form>
        </div>

        <?php endif; ?>
      </div>

    </div>
  </div>
</div>

</div> <!-- /main-container -->

</div> <!-- /d-flex -->

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/bulletin.js')); ?>"></script>
<script src="<?php echo e(asset('js/user_search.js')); ?>"></script>
<script src="<?php echo e(asset('js/calendar.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/users/profile.blade.php ENDPATH**/ ?>