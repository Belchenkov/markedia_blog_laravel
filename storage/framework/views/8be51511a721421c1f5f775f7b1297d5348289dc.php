

<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статьи</h1>
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список статей</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <a href="<?php echo e(route('posts.create')); ?>" class="btn btn-primary mb-3">Добавить статью</a>
                <?php if(count($posts)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Наименование</th>
                                <th>Категория</th>
                                <th>Теги</th>
                                <th>Дата</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($post->id); ?></td>
                                    <td><?php echo e($post->title); ?></td>
                                    <td><?php echo e($post->category->title ?? ''); ?></td>
                                    <td><?php echo e($post->tags->pluck('title')->join(', ')); ?></td>
                                    <td><?php echo e($post->created_at); ?></td>
                                    <td>
                                        <a
                                            href="<?php echo e(route('posts.edit', ['post' => $post->id])); ?>"
                                            class="btn btn-info btn-sm float-left mr-1"
                                        >
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form
                                            action="<?php echo e(route('posts.destroy', ['post' => $post->id])); ?>"
                                            method="post"
                                            class="float-left"
                                        >
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p>Статей пока нет...</p>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <?php echo e($posts->links()); ?>

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>