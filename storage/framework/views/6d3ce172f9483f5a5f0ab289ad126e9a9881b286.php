<?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div class="vh-100 d-flex">
  <div class="w-50 mt-5">
    <div class="m-3 detail_container">
      <div class="p-3">
        <div class="detail_inner_head">
          <div>
            
            <?php $__currentLoopData = $post->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postSubCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <span class="badge badge-info"><?php echo e($postSubCategory->subCategory->sub_category ?? ''); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div>
            
            <?php if(Auth::id() === $post->user_id): ?>
            
            <button class="btn btn-primary btn-sm edit-modal-open mr-2"
              post_title="<?php echo e($post->post_title); ?>"
              post_body="<?php echo e($post->post); ?>"
              post_id="<?php echo e($post->id); ?>">編集</button>
            <form action="<?php echo e(route('post.delete', ['id' => $post->id])); ?>" method="post" style="display:inline">
              <?php echo csrf_field(); ?>
              
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('<?php echo e($post->post_title); ?>の投稿を削除してよろしいですか？')">削除</button>
            </form>
            <?php endif; ?>
          </div>
        </div>

        <div class="contributor d-flex">
          <p>
            <span><?php echo e($post->user->over_name); ?></span>
            <span><?php echo e($post->user->under_name); ?></span>
            さん
          </p>
          <span class="ml-5"><?php echo e($post->created_at); ?></span>
        </div>
        <div class="detsail_post_title"><?php echo e($post->post_title); ?></div>
        <div class="mt-3 detsail_post"><?php echo e($post->post); ?></div>
      </div>

      <div class="p-3">
        <div class="comment_container">
          <span>コメント</span>
          <?php $__currentLoopData = $post->postComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="comment_area border-top">
            <p>
              <span><?php echo e($comment->commentUser($comment->user_id)->over_name); ?></span>
              <span><?php echo e($comment->commentUser($comment->user_id)->under_name); ?></span>さん
            </p>
            <p><?php echo e($comment->comment); ?></p>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="w-50 p-3">
    <div class="comment_container border m-5">
      <div class="comment_area p-3">
        
        <?php if($errors->has('comment')): ?>
          <p class="text-danger m-0"><?php echo e($errors->first('comment')); ?></p>
        <?php endif; ?>
        <p class="m-0">コメントする</p>
        <textarea class="w-100" name="comment" form="commentRequest"></textarea>
        <input type="hidden" name="post_id" form="commentRequest" value="<?php echo e($post->id); ?>">
        <input type="submit" class="btn btn-primary" form="commentRequest" value="投稿">
        <form action="<?php echo e(route('comment.create')); ?>" method="post" id="commentRequest"><?php echo e(csrf_field()); ?></form>
      </div>
    </div>
  </div>
</div>


<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="<?php echo e(route('post.edit')); ?>" method="post">
      <div class="w-100">
        <div class="modal-inner-title w-50 m-auto">
          
          <?php if($errors->has('post_title')): ?>
            <p class="text-danger"><?php echo e($errors->first('post_title')); ?></p>
          <?php endif; ?>
          <input type="text" name="post_title" placeholder="タイトル" class="w-100"
            value="<?php echo e(old('post_title', $post->post_title)); ?>"> 
        </div>
        <div class="modal-inner-body w-50 m-auto pt-3 pb-3">
          
          <?php if($errors->has('post_body')): ?>
            <p class="text-danger"><?php echo e($errors->first('post_body')); ?></p>
          <?php endif; ?>
          <textarea placeholder="投稿内容" name="post_body" class="w-100"><?php echo e(old('post_body', $post->post)); ?></textarea> 
        </div>
        <div class="w-50 m-auto edit-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="hidden" class="edit-modal-hidden" name="post_id" value="<?php echo e($post->id); ?>"> 
          <input type="submit" class="btn btn-primary d-block" value="編集">
        </div>
      </div>
      <?php echo e(csrf_field()); ?>

    </form>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editModalButton = document.querySelector('.edit-modal-open');
    const modal = document.querySelector('.modal');
    const closeModalButton = document.querySelector('.js-modal-close');

    // 編集ボタンがクリックされたらモーダルを表示
    if (editModalButton) {
      editModalButton.addEventListener('click', function() {
        modal.style.display = 'block';  // モーダルを表示
        document.querySelector('input[name="post_title"]').value = editModalButton.getAttribute('post_title');
        document.querySelector('textarea[name="post_body"]').value = editModalButton.getAttribute('post_body');
        document.querySelector('input[name="post_id"]').value = editModalButton.getAttribute('post_id');
      });
    }

    // モーダルの閉じるボタン
    if (closeModalButton) {
      closeModalButton.addEventListener('click', function() {
        modal.style.display = 'none';  // モーダルを非表示
      });
    }
  });
</script>



<script>
  // コメントアウトしたバリデーションエラー時の自動モーダル表示を削除しました。
</script>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/bulletinboard/post_detail.blade.php ENDPATH**/ ?>