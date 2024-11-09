<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return redirect()->route('products.all');
});


Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'productAll'])->name('products.all');  // Show all products
    Route::get('/create', [ProductController::class, 'productCreate'])->name('products.create');  // Show create form
    Route::post('/', [ProductController::class, 'productStore'])->name('products.store');  // Store product
    Route::get('/{id}', [ProductController::class, 'productShowSpecific'])->name('products.show');  // Show specific product
    Route::get('/{id}/edit', [ProductController::class, 'productEdit'])->name('products.edit');  // Show edit form
    Route::put('/{id}', [ProductController::class, 'productUpdate'])->name('products.update');  // Update product
    Route::delete('/{id}', [ProductController::class, 'productDelete'])->name('products.delete');  // Delete product
});

