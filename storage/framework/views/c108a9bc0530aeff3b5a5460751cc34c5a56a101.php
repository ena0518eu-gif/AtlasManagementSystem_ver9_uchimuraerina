<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <form action="<?php echo e(route('registerPost')); ?>" method="POST">
    <div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
      <div class="w-25 vh-75 border p-3">
        <div class="register_form">

          <div class="d-flex mt-3" style="justify-content:space-between">
            <div style="width:140px">

              <?php $__errorArgs = ['over_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <label class="d-block m-0" style="font-size:13px">姓</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="over_name" value="<?php echo e(old('over_name')); ?>">
              </div>
            </div>

            <div style="width:140px">

              <?php $__errorArgs = ['under_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <label class="d-block m-0" style="font-size:13px">名</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="under_name" value="<?php echo e(old('under_name')); ?>">
              </div>
            </div>
          </div>

          <div class="d-flex mt-3" style="justify-content:space-between">
            <div style="width:140px">

              <?php $__errorArgs = ['over_name_kana'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <label class="d-block m-0" style="font-size:13px">セイ</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="over_name_kana" value="<?php echo e(old('over_name_kana')); ?>">
              </div>
            </div>

            <div style="width:140px">

              <?php $__errorArgs = ['under_name_kana'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              <label class="d-block m-0" style="font-size:13px">メイ</label>
              <div class="border-bottom border-primary">
                <input type="text" class="border-0 w-100" name="under_name_kana" value="<?php echo e(old('under_name_kana')); ?>">
              </div>
            </div>
          </div>

          <div class="mt-3">

            <?php $__errorArgs = ['mail_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <label class="m-0 d-block" style="font-size:13px">メールアドレス</label>
            <div class="border-bottom border-primary">
              <input type="text" class="w-100 border-0" name="mail_address" value="<?php echo e(old('mail_address')); ?>">
            </div>
          </div>
        </div>

        <div class="mt-3">

          <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <input type="radio" name="sex" value="1" <?php echo e(old('sex') == 1 ? 'checked' : ''); ?>> 男性
          <input type="radio" name="sex" value="2" <?php echo e(old('sex') == 2 ? 'checked' : ''); ?>> 女性
          <input type="radio" name="sex" value="3" <?php echo e(old('sex') == 3 ? 'checked' : ''); ?>> その他
        </div>

        <div class="mt-3">

          <?php $__errorArgs = ['birth_day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <label style="font-size:13px">生年月日</label><br>

          <select name="old_year">
            <option value="">-----</option>
            <?php for($i = 1985; $i <= date('Y'); $i++): ?>
              <option value="<?php echo e($i); ?>" <?php echo e(old('old_year') == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
          </select>

          <select name="old_month">
            <option value="">-----</option>
            <?php for($i = 1; $i <= 12; $i++): ?>
              <option value="<?php echo e($i); ?>" <?php echo e(old('old_month') == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
          </select>

          <select name="old_day">
            <option value="">-----</option>
            <?php for($i = 1; $i <= 31; $i++): ?>
              <option value="<?php echo e($i); ?>" <?php echo e(old('old_day') == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
          </select>
        </div>

        <div class="mt-3">

          <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <label>役職</label><br>
          <input type="radio" name="role" value="1" <?php echo e(old('role') == 1 ? 'checked' : ''); ?>>教師(国語)
          <input type="radio" name="role" value="2" <?php echo e(old('role') == 2 ? 'checked' : ''); ?>>教師(数学)
          <input type="radio" name="role" value="3" <?php echo e(old('role') == 3 ? 'checked' : ''); ?>>教師(英語)
          <input type="radio" name="role" value="4" <?php echo e(old('role') == 4 ? 'checked' : ''); ?>>生徒
        </div>

        <div class="mt-3">

          <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

          <label>パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100" name="password">
          </div>
        </div>

        <div class="mt-3">
          <label>確認用パスワード</label>
          <div class="border-bottom border-primary">
            <input type="password" class="border-0 w-100" name="password_confirmation">
          </div>
        </div>

        <div class="mt-5 text-right">
          <input type="submit" class="btn btn-primary" value="新規登録">
        </div>

        <div class="text-center">
          <a href="<?php echo e(route('loginView')); ?>">ログイン</a>
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
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/auth/register/register.blade.php ENDPATH**/ ?>