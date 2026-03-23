<?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="vh-100 profile-page">

  <!-- タイトルを外に出して独立させる -->
  <div class="tittle"><p>自分のプロフィール</p></div>

  <div class="top_area pt-5">    <div class="user_status p-3">
      <p>名前：<span><?php echo e(Auth::user()->over_name); ?></span><span class="ml-1"><?php echo e(Auth::user()->under_name); ?></span></p>
      <p>カナ：<span><?php echo e(Auth::user()->over_name_kana); ?></span><span class="ml-1"><?php echo e(Auth::user()->under_name_kana); ?></span></p>
      <p>性別：<?php if(Auth::user()->sex == 1): ?><span>男</span><?php else: ?><span>女</span><?php endif; ?></p>
      <p>生年月日：<span><?php echo e(Auth::user()->birth_day); ?></span></p>
    </div>
  </div>

</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/top/top.blade.php ENDPATH**/ ?>