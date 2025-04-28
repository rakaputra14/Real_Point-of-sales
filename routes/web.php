<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', [AuthController::class, 'login'])->middleware('checkAuth');
Route::post('action-login', [AuthController::class, 'actionLogin']);
Route::get('logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'checkAuth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);


    Route::resource('pos', TransactionController::class);
});


Route::middleware(['role:Administrator'])->group(function () {
    Route::resource('users', UserController::class);
});
Route::middleware(['role:Pimpinan'])->group(function () {
    Route::get('/report/{id}', [TransactionController::class, 'reportDetail'])->name('reportDetail');
});

Route::middleware(['role:Kasir,Administrator'])->group(function () {
    Route::get('print/{id}', [TransactionController::class, 'print'])->name('print');
    Route::get('pos-sale', [TransactionController::class, 'create']);
    Route::post('pos-sale', [TransactionController::class, 'store'])->name('pos-sale.store');
});

Route::get('/export-pdf', [TransactionController::class, 'exportPdf'])->name('export.pdf');

// ... existing routes ...
// Route::resource('roles', RoleController::class);
// ... existing routes ...

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

// Route::middleware('role:admin')->group(function () {
//   Route::get('/test', function () {
//       return view('hello-world'); // mengembalikan view 'hello-world'
//   });
// });
