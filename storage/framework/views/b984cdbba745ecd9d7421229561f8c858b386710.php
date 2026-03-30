<?php if (isset($component)) { $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<div class="post_create_container d-flex">

    <!-- 投稿作成エリア -->
    <div class="post_create_area border w-50 m-5 p-5">

        <div class="">
            <p class="mb-0">カテゴリー</p>

            <!-- バリデーションメッセージ -->
            <?php if($errors->first('post_category_id')): ?>
                <span class="error_message">
                    <?php echo e($errors->first('post_category_id')); ?>

                </span>
            <?php endif; ?>

            <select class="w-100" form="postCreate" name="post_category_id">
                <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <optgroup label="<?php echo e($main_category->main_category); ?>">
                        <!-- サブカテゴリー表示 -->
                        <?php $__currentLoopData = $main_category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sub_category->id); ?>"
                                <?php echo e(old('post_category_id') == $sub_category->id ? 'selected' : ''); ?>>
                                <?php echo e($sub_category->sub_category); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </optgroup>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>

        <div class="mt-3">
            <!-- バリデーションメッセージ -->
            <?php if($errors->first('post_title')): ?>
                <span class="error_message">
                    <?php echo e($errors->first('post_title')); ?>

                </span>
            <?php endif; ?>

            <p class="mb-0">タイトル</p>

            <input
                type="text"
                class="w-100"
                form="postCreate"
                name="post_title"
                value="<?php echo e(old('post_title')); ?>"
            >
        </div>

        <div class="mt-3">
            <!-- バリデーションメッセージ -->
            <?php if($errors->first('post_body')): ?>
                <span class="error_message">
                    <?php echo e($errors->first('post_body')); ?>

                </span>
            <?php endif; ?>

            <p class="mb-0">投稿内容</p>

            <textarea
                class="w-100"
                form="postCreate"
                name="post_body"
            ><?php echo e(old('post_body')); ?></textarea>
        </div>

        <!-- 投稿フォーム -->
        <div class="mt-3 text-right">
            <input
                type="submit"
                class="btn btn-primary"
                value="投稿"
                form="postCreate"
            >
        </div>

        <form
            action="<?php echo e(route('post.create')); ?>"
            method="post"
            id="postCreate"
        >
            <?php echo e(csrf_field()); ?>

        </form>

    </div>

    <!-- コメント追加フォーム（別フォームにする） -->
    <!--
    ❌ 課題：コメント投稿欄を削除
    <div class="category_area w-25 m-5 p-5">

        <div class="">
            <p class="m-0">コメント</p>

            <?php if($errors->first('comment')): ?>
                <span class="error_message">
                    <?php echo e($errors->first('comment')); ?>

                </span>
            <?php endif; ?>

            <form action="<?php echo e(route('comment.create')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="post_id" value="<?php echo e(old('post_id')); ?>">

                <textarea class="w-100" name="comment"><?php echo e(old('comment')); ?></textarea>

                <div class="mt-3 text-right">
                    <input type="submit" value="コメント追加" class="btn btn-secondary">
                </div>
            </form>

        </div>

    </div>
    -->

    <!-- 管理者のみ表示 -->
    <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?> -->

    <!-- ⭐ 余白削除：m-5 p-5 → m-5 p-3 に変更 -->
    <div class="category_area w-25 m-5 p-3">

        <div class="">
            <p class="m-0">メインカテゴリー</p>

            <!-- バリデーションメッセージ -->
            <?php if($errors->first('main_category_name')): ?>
                <span class="error_message">
                    <?php echo e($errors->first('main_category_name')); ?>

                </span>
            <?php endif; ?>

            <form
                action="<?php echo e(route('main.category.create')); ?>"
                method="post"
                id="mainCategoryRequest"
            >
                <?php echo e(csrf_field()); ?>


                <input
                    type="text"
                    class="w-100"
                    name="main_category_name"
                    value="<?php echo e(old('main_category_name')); ?>"
                >

                <input
                    type="submit"
                    value="追加"
                    class="w-100 btn btn-primary p-0"
                >
            </form>
        </div>

        <!-- サブカテゴリー追加 -->
        <div class="mt-3"> <!-- ← mt-4 → mt-3 に調整 -->
            <p class="m-0">サブカテゴリー</p>

            <form
                action="<?php echo e(route('sub.category.create')); ?>"
                method="post"
                id="subCategoryRequest"
            >
                <?php echo e(csrf_field()); ?>


                <?php if($errors->first('main_category_id')): ?>
                    <span class="error_message"><?php echo e($errors->first('main_category_id')); ?></span>
                <?php endif; ?>

                <select
                    class="w-100 mb-2"
                    name="main_category_id"
                >
                    <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($main_category->id); ?>"
                            <?php echo e(old('main_category_id') == $main_category->id ? 'selected' : ''); ?>>
                            <?php echo e($main_category->main_category); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php if($errors->first('sub_category_name')): ?>
                    <span class="error_message"><?php echo e($errors->first('sub_category_name')); ?></span>
                <?php endif; ?>

                <input
                    type="text"
                    class="w-100 mb-2"
                    name="sub_category_name"
                    value="<?php echo e(old('sub_category_name')); ?>"
                >

                <input
                    type="submit"
                    value="追加"
                    class="w-100 btn btn-primary p-0"
                >
            </form>

        </div>

    </div>

    <!-- <?php endif; ?> -->

</div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa)): ?>
<?php $component = $__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa; ?>
<?php unset($__componentOriginalee6f77ea8284c9edd154cd0c9b3b80eff04c2bfa); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Owenr\Documents\AtlasManagementSystem_ver9_uchimuraerina\resources\views/authenticated/bulletinboard/post_create.blade.php ENDPATH**/ ?>