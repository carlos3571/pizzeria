<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExtraIngredientController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaIngredientController;
use App\Http\Controllers\PizzaRawMaterialController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por middleware 'auth'
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUDs de la pizzería
    Route::resource('branches', BranchController::class);
    Route::resource('clients', ClienteController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('extra-ingredients', ExtraIngredientController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('order-extra-ingredients', OrderExtraIngredientController::class);
    Route::resource('order-pizzas', OrderPizzaController::class);
    Route::resource('pizzas', PizzaController::class);
    Route::resource('pizza-ingredients', PizzaIngredientController::class);
    Route::resource('pizza-raw-materials', PizzaRawMaterialController::class);
    Route::resource('pizza-sizes', PizzaSizeController::class);
    Route::resource('purchases', PurchaseController::class);
    Route::resource('raw-materials', RawMaterialController::class);
    Route::resource('suppliers', SupplierController::class);
});

require __DIR__.'/auth.php';
