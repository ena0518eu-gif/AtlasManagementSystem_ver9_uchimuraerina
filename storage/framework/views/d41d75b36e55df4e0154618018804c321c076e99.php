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

<div class="m-5">
  <h5><?php echo e($date); ?> <?php echo e($part == 1 ? '1部' : ($part == 2 ? '2部' : '3部')); ?></h5>
    <!-- <h5><?php echo e($date); ?> <?php echo e($part == 1 ? 'リモ1部' : ($part == 2 ? 'リモ2部' : 'リモ3部')); ?> 予約者一覧</h5> -->


  <table class="table mt-3 table-bordered table-striped rounded">
    <thead class="thead-custom">
      <tr>
        <th>ID</th>
        <th>名前</th>
        <th>場所</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $reservePersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserveSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $reserveSetting->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($user->id); ?></td>
          <td><?php echo e($user->over_name); ?> <?php echo e($user->under_name); ?></td>
          <td>リモート</td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

  <a href="<?php echo e(route('calendar.admin.show', ['user_id' => Auth::id()])); ?>" class="btn btn-secondary mt-3">戻る</a>
</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/calendar/admin/reserve_detail.blade.php ENDPATH**/ ?>