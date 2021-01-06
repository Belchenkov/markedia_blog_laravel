<?php $__env->startSection('title', 'Markedia - Marketing Blog Template :: ' . $category->title); ?>

<?php $__env->startSection('page-title'); ?>
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><?php echo e($category->title); ?></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo e($category->title); ?></li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-wrapper">
        <div class="blog-custom-build">

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="<?php echo e(route('posts.single', ['slug' => $post->slug])); ?>" title="">
                            <img src="<?php echo e($post->getImage()); ?>" alt="" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                            <!-- end hover -->
                        </a>
                    </div>
                    <!-- end media -->
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div><!-- end post-sharing -->

                        <h4><a href="<?php echo e(route('posts.single', ['slug' => $post->slug])); ?>"
                               title=""><?php echo e($post->title); ?></a></h4>
                        <?php echo $post->description; ?>

                        <small><a href="<?php echo e(route('categories.single', ['slug' => $category->slug])); ?>"
                                  title=""><?php echo e($category->title); ?></a></small>
                        <small><?php echo e($post->getPostDate()); ?></small>
                        <small><i class="fa fa-eye"></i> <?php echo e($post->views); ?></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->

                <hr class="invis">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <?php echo e($posts->links()); ?>

            </nav>
        </div><!-- end col -->
    </div><!-- end row -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.category_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/categories/show.blade.php ENDPATH**/ ?>