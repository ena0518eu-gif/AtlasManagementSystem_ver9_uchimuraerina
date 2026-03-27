<?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

  <link rel="stylesheet" href="<?php echo e(asset('css/calendar.css')); ?>">

  
  <div class="calendar_area">
    <div class="w-100">
      <p class="calendar-title"><?php echo e($calendar->getTitle()); ?></p>

      <!-- カレンダー表示 -->
      <?php echo $calendar->render(); ?>


    </div>
      <!-- 登録ボタン：calendar_area の max-width に合わせて右寄せ -->
  <div style="text-align:right; max-width: 1400px; width: calc(100% - 40px); margin: 20px auto; padding-right: 10px;">
    <button type="submit" form="reserveSetting" class="btn btn-primary"
      onclick="return confirm('予約枠を登録してよろしいですか？')">登録</button>
  </div>

  </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/calendar/admin/reserve_setting.blade.php ENDPATH**/ ?>