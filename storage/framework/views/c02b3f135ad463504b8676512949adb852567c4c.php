

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование статьи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Статья "<?php echo e($post->title); ?>"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form
                            role="form"
                            method="post"
                            action="<?php echo e(route('posts.update', ['post' => $post->id])); ?>"
                            enctype="multipart/form-data"
                        >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="title"
                                           value="<?php echo e($post->title); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea
                                        name="description"
                                        class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="description"
                                        rows="3"
                                    ><?php echo e($post->description); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea
                                        name="content"
                                        class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="content"
                                        rows="7"
                                    ><?php echo e($post->content); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select
                                        class="form-control <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="category_id"
                                        name="category_id"
                                    >
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($k); ?>"
                                                <?php if($k == $post->category_id): ?> selected <?php endif; ?>
                                            ><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select
                                        name="tags[]"
                                        id="tags"
                                        class="select2"
                                        multiple="multiple"
                                        data-placeholder="Выбор тегов"
                                        style="width: 100%;"
                                    >
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($k); ?>"
                                                <?php if(in_array($k, $post->tags->pluck('id')->all())): ?> selected <?php endif; ?>
                                            ><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input
                                                type="file"
                                                name="thumbnail"
                                                id="thumbnail"
                                                class="custom-file-input"
                                            >
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img
                                            src="<?php echo e($post->getImage()); ?>"
                                            alt=""
                                            class="img-thumbnail mt-2"
                                            width="200"
                                        ></div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/posts/edit.blade.php ENDPATH**/ ?>