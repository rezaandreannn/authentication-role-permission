<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->middleware('guest');

Route::post('/set-language', App\Http\Controllers\LanguageController::class, 'invoke')->name('set.language');

Route::get('/role', \App\Http\Livewire\RolePermission\Role::class)->name('role.index');
Route::get('/permission', \App\Http\Livewire\RolePermission\Permission::class)->name('permission.index');
Route::get('role-has-permission', \App\Http\Livewire\RolePermission\RoleHasPermission::class)->name('role-has-permission.index');

Route::resource('user', App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::get('user/has-role/{id}', \App\Http\Livewire\RolePermission\UserHasRole::class)->name('user-has-role.index');
Route::get('user/has-permission/{id}', \App\Http\Livewire\RolePermission\UserHasPermission::class)->name('user-has-permission.index');
Route::post('/users/{user}/verify', [App\Http\Controllers\UserController::class, 'updateVerificationStatus']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
