<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// Pastikan kamu mengimpor Controller Admin jika letaknya terpisah, misalnya:
// use App\Http\Controllers\Admin\ProductController as AdminProductController;

// ==========================================
// 1. FRONTEND / CUSTOMER ROUTES
// ==========================================

// Halaman Utama (Landing Page)
Route::get('/', function () {
    $products = \App\Models\Product::whereIn('status', ['publish', 'best_seller'])
                ->orderByRaw("FIELD(status, 'best_seller', 'publish') ASC") // Best seller naik ke atas
                ->latest() // Diikuti urutan terbaru
                ->take(8) 
                ->get();
                
    return view('frontend.home', compact('products'));
})->name('home');

// Halaman Tentang Kami (About)
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

// 🔥 PERBAIKAN: Sekarang rute /katalog diarahkan ke ProductController agar logic pencarian & urutan A-Z berfungsi!
Route::get('/katalog', [ProductController::class, 'index'])->name('products.index');

Route::get('/search-suggestions', [ProductController::class, 'searchSuggestions']);


// ==========================================
// 2. BACKEND / ADMIN ROUTES
// ==========================================

Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Saat admin sukses login, mereka akan dilempar ke /admin/dashboard
    // Lalu otomatis dialihkan ke halaman list produk admin
    Route::get('/dashboard', function () {
        return redirect()->route('admin.products.index');
    })->name('dashboard');

    // Rute CRUD Produk khusus Admin
    // Catatan: Pastikan di dalam ProductController kamu, atau gunakan controller terpisah jika view admin & frontend dibedakan.
    Route::resource('products', ProductController::class)->names([
        'index'   => 'admin.products.index',
        'create'  => 'admin.products.create',
        'store'   => 'admin.products.store',
        'edit'    => 'admin.products.edit',
        'update'  => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);
});

require __DIR__.'/auth.php';