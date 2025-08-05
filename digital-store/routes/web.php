<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;

// Frontend Routes
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/checkout/{id}', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');

// Webhook and Download Routes
Route::post('/midtrans/webhook', [WebhookController::class, 'handle'])->name('midtrans.webhook');
Route::get('/download/{token}', [DownloadController::class, 'download'])->name('download');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (accessible without middleware)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            $totalProducts = \App\Models\Product::count();
            $totalTransactions = \App\Models\Transaction::count();
            $paidTransactions = \App\Models\Transaction::where('payment_status', 'settlement')->count();
            $pendingTransactions = \App\Models\Transaction::where('payment_status', 'pending')->count();
            
            return view('admin.dashboard', compact(
                'totalProducts', 
                'totalTransactions', 
                'paidTransactions', 
                'pendingTransactions'
            ));
        })->name('dashboard');
        
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('products', AdminProductController::class);
        Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('transactions');
    });
});
