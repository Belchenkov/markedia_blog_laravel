<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button
                class="navbar-toggler navbar-toggler-right"
                type="button"
                data-toggle="collapse"
                data-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="/assets/front/images/version/market-logo.png" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('categories.single', ['slug' => 'marketing'])); ?>">
                            Marketing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('categories.single', ['slug' => 'make-money'])); ?>">
                            Make Money
                        </a>
                    </li>
                </ul>

                <form
                    class="form-inline"
                    method="get"
                    action="<?php echo e(route('search')); ?>"
                >
                    <input
                        name="s"
                        class="form-control mr-sm-2 <?php $__errorArgs = ['s'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        type="text"
                        placeholder="How may I help?"
                        required
                    />
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <style>
                    .market-header .form-inline .form-control.is-invalid{
                        border: 2px solid red;
                    }
                </style>

            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
<?php /**PATH /app/resources/views/layouts/navbar.blade.php ENDPATH**/ ?>