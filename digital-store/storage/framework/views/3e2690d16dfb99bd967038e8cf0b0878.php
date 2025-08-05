<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard - Digital Store'); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite CSS -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out">
            <!-- Logo -->
            <div class="text-white flex items-center space-x-2 px-4">
                <div class="text-2xl font-bold">Digital Store</div>
            </div>
            
            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-gray-900' : ''); ?>">
                    <svg class="text-gray-300 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                    </svg>
                    Dashboard
                </a>
                
                <a href="<?php echo e(route('admin.products.index')); ?>" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md <?php echo e(request()->routeIs('admin.products.*') ? 'bg-gray-900' : ''); ?>">
                    <svg class="text-gray-300 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Produk
                </a>
                
                <a href="<?php echo e(route('admin.transactions')); ?>" class="text-white hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md <?php echo e(request()->routeIs('admin.transactions') ? 'bg-gray-900' : ''); ?>">
                    <svg class="text-gray-300 mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Transaksi
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        <h1 class="text-3xl font-bold text-gray-900">
                            <?php echo $__env->yieldContent('page-title', 'Dashboard'); ?>
                        </h1>
                        
                        <div class="flex items-center space-x-4">
                            <a href="<?php echo e(route('home')); ?>" target="_blank" class="text-gray-500 hover:text-gray-700">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                            
                            <form method="POST" action="<?php echo e(route('admin.logout')); ?>" class="inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="text-gray-500 hover:text-gray-700">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <!-- Flash Messages -->
                    <?php if(session('success')): ?>
                        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            <ul class="list-disc list-inside">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /project/sandbox/user-workspace/digital-store/resources/views/layouts/admin.blade.php ENDPATH**/ ?>