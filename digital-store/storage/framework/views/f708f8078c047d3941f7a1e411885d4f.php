<?php $__env->startSection('title', 'Beranda - Digital Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
            Toko Produk Digital
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Temukan berbagai produk digital berkualitas tinggi untuk kebutuhan bisnis dan personal Anda. 
            Dari ebook, template, hingga software premium.
        </p>
    </div>

    <?php if($products->count() > 0): ?>
        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Product Image -->
                    <div class="aspect-w-16 aspect-h-9">
                        <img 
                            src="<?php echo e($product->image_url); ?>" 
                            alt="<?php echo e($product->name); ?>" 
                            class="w-full h-48 object-cover"
                            onerror="this.src='https://placehold.co/600x400?text=<?php echo e(urlencode($product->name)); ?>+Digital+Product+Image'"
                        >
                    </div>
                    
                    <!-- Product Info -->
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">
                            <?php echo e($product->name); ?>

                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo e(Str::limit($product->description, 120)); ?>

                        </p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-indigo-600">
                                <?php echo e($product->formatted_price); ?>

                            </span>
                            
                            <div class="space-x-2">
                                <a 
                                    href="<?php echo e(route('product.show', $product->id)); ?>" 
                                    class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200"
                                >
                                    Detail
                                </a>
                                
                                <a 
                                    href="<?php echo e(route('checkout.show', $product->id)); ?>" 
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition-colors duration-200"
                                >
                                    Beli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <div class="mx-auto h-24 w-24 text-gray-400 mb-4">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada produk</h3>
                <p class="text-gray-500">Produk digital akan segera tersedia. Silakan kembali lagi nanti.</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /project/sandbox/user-workspace/digital-store/resources/views/home.blade.php ENDPATH**/ ?>