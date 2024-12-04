<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->middleware('guest');

Route::post('/set-language', LanguageController::class, 'invoke')->name('set.language');

Route::get('/role', \App\Http\Livewire\RolePermission\Role::class)->name('role.index');
Route::get('/permission', \App\Http\Livewire\RolePermission\Permission::class)->name('permission.index');
Route::get('role-has-permission', \App\Http\Livewire\RolePermission\RoleHasPermission::class)->name('role-has-permission.index');

Route::resource('user', UserController::class)->middleware(['auth']);
Route::get('user/has-role/{id}', \App\Http\Livewire\RolePermission\UserHasRole::class)->name('user-has-role.index');
Route::get('user/has-permission/{id}', \App\Http\Livewire\RolePermission\UserHasPermission::class)->name('user-has-permission.index');
// Route::resource('role', RoleController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
