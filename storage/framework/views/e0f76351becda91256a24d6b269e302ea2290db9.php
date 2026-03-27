<?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="vh-100 border">
  <div class="top_area w-75 m-auto pt-5">
    <span><?php echo e($user->over_name); ?></span><span><?php echo e($user->under_name); ?>さんのプロフィール</span>
    <div class="user_status p-3">
      <p>名前 : <span><?php echo e($user->over_name); ?></span><span class="ml-1"><?php echo e($user->under_name); ?></span></p>
      <p>カナ : <span><?php echo e($user->over_name_kana); ?></span><span class="ml-1"><?php echo e($user->under_name_kana); ?></span></p>
      <p>性別 : <?php if($user->sex == 1): ?><span>男</span><?php else: ?><span>女</span><?php endif; ?></p>
      <p>生年月日 : <span><?php echo e($user->birth_day); ?></span></p>
      <div>選択科目 :
        <?php $__currentLoopData = $user->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span><?php echo e($subject->subject); ?></span>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
        <span class="subject_edit_btn">選択科目の編集</span>
        <div class="subject_inner">
          <form action="<?php echo e(route('user.edit')); ?>" method="post">
            <?php $__currentLoopData = $subject_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
              <label><?php echo e($subject_list->subject); ?></label>
              <input type="checkbox" name="subjects[]" value="<?php echo e($subject_list->id); ?>">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <input type="submit" value="編集" class="btn btn-primary">
            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
            <?php echo e(csrf_field()); ?>

          </form>
        </div>
        <?php endif; ?>
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
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/users/profile.blade.php ENDPATH**/ ?>