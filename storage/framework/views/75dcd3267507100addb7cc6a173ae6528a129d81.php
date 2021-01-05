<?php $__env->startSection('title', 'Markedia - Marketing Blog Template :: Home'); ?>

<?php $__env->startSection('header'); ?>
    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>A digital marketing blog</h2>
                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis.
                        Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus
                        rhoncus rutrum. Integer et ornare mauris.</p>
                    <a href="#" class="btn btn-primary">Try for free</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3>Subscribe Today!</h3>
                        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                        <form class="form-inline" method="post">
                            <input type="text" name="email" placeholder="Add your email here.." required
                                   class="form-control"/>
                            <input type="submit" value="Subscribe" class="btn btn-default btn-block"/>
                        </form>
                    </div><!-- end newsletter -->
                </div>
            </div>
        </div>
    </section>
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

                        <h4><a
                                href="<?php echo e(route('posts.single', ['slug' => $post->slug])); ?>"
                                title=""
                            ><?php echo e($post->title); ?></a></h4>
                        <?php echo $post->description; ?>

                        <small>
                            <a
                                href="<?php echo e(route('categories.single', ['slug' => $post->category->slug])); ?>"
                                title=""
                            ><?php echo e($post->category->title); ?></a></small>
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

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/posts/index.blade.php ENDPATH**/ ?>