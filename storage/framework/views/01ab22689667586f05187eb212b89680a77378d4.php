<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Popular Posts</h2>
        <div class="blog-list-widget">
            <div class="list-group">
                <?php $__currentLoopData = $popular_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('posts.single', ['slug' => $post->slug])); ?>"
                       class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="<?php echo e($post->getImage()); ?>" alt="" class="img-fluid float-left">
                            <h5 class="mb-1"><?php echo e($post->title); ?></h5>
                            <small><?php echo e($post->getPostDate()); ?></small>
                            <small>| <i class="fa fa-eye"></i> <?php echo e($post->views); ?></small>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Categories</h2>
        <div class="link-widget">
            <ul>
                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('categories.single', ['slug' => $cat->slug])); ?>">
                            <?php echo e($cat->title); ?> <span>(<?php echo e($cat->posts_count); ?>)</span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
<?php /**PATH /app/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>