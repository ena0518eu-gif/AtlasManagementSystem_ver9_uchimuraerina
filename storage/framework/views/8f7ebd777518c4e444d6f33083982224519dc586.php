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

  <!-- ★ 予約フォーム追加 -->
  <form method="POST" action="<?php echo e(route('reserveParts')); ?>" id="reserveParts">
    <?php echo csrf_field(); ?>

    <!-- ★ w-75削除して外枠を広げる -->
    <div class="calendar_area">
      <div class="w-100">
        <p><?php echo e($calendar->getTitle()); ?></p>

        <!-- カレンダー表示 -->
        <?php echo $calendar->render(); ?>


      </div>
    <!-- ★ 送信ボタン追加 -->
    <div style="text-align:center; margin-top:20px;">
      <button type="submit" class="btn btn-primary">予約する</button>
    </div>


    </div>


  </form>

  
  <div class="modal fade" id="cancelModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <p>予約日：<span id="modalReserveDate"></span></p>
          <p>時間：<span id="modalReservePart"></span></p>
          <p>上記の予約をキャンセルしてもよろしいですか？</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">閉じる</button>
          <form method="POST" action="<?php echo e(route('deleteParts')); ?>" id="cancelForm" style="display:inline;">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="reserve_id" id="modalReserveId">
            <button type="submit" class="btn btn-danger">キャンセル</button>
          </form>
        </div>

      </div>
    </div>
  </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/calendar/general/calendar.blade.php ENDPATH**/ ?>