<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::post('/admin/profile/update',[AdminController::class,'update_profile'])->name('update.admin_profile');
    Route::get('/admin/password/change',[AdminController::class,'change_password'])->name('admin.change_password');
    Route::post('/admin/password/update',[AdminController::class,'update_password'])->name('update.admin_password');

});

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('/agent/dashboard',[AgentController::class,'index'])->name('agent.dashboard');
    Route::get('/agent/logout',[AgentController::class,'logout'])->name('agent.logout');
});


Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(PropertyController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all.type');
        Route::get('/add/property','AddProperty')->name('add.property');
        Route::get('/edit/property/{id}','EditProperty')->name('edit.type');
        Route::get('/delete/property/{id}','DeleteProperty')->name('delete.type');
        Route::post('/save/property','SaveProperty')->name('save.property');
        Route::post('/update/property','UpdateProperty')->name('update.property');
    });

});

