<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
  <form action="<?php echo e(route('loginPost')); ?>" method="POST">
    <div class="login-wrapper">
      <div class="login-container">

        
        <div class="login-logo">
          <img src="<?php echo e(asset('image/atlas-black.png')); ?>" alt="Atlas Black">
        </div>

        
        <div class="login-card">
          <div class="w-75 m-auto pt-3">
            <label class="d-block m-0" style="font-size:13px;">メールアドレス</label>
            <div class="border-bottom border-primary w-100">
              <input type="text" class="w-100 border-0" name="mail_address">
            </div>
          </div>
          <div class="w-75 m-auto pt-4">
            <label class="d-block m-0" style="font-size:13px;">パスワード</label>
            <div class="border-bottom border-primary w-100">
              <input type="password" class="w-100 border-0" name="password">
            </div>
          </div>
          <div class="text-right m-3">
            <input type="submit" class="btn btn-primary" value="ログイン">
          </div>
          <div class="text-center">
            <a href="<?php echo e(route('registerView')); ?>">新規登録はこちら</a>
          </div>
        </div>

      </div>
      <?php echo e(csrf_field()); ?>

    </div>
  </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/auth/login/login.blade.php ENDPATH**/ ?>