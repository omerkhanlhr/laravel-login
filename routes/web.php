<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AmmenitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
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

// -------------------------------------------------------------------------

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

// -------------------------------------------------------------------------

Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(AmmenitiesController::class)->group(function(){
        Route::get('/all/ammenities','AllAmmenities')->name('ammenities.type');
        Route::get('/add/ammenitie','AddAmmenitie')->name('add.ammenitie');
        Route::get('/edit/ammenitie/{id}','EditAmmenitie')->name('edit.ammenitie');
        Route::get('/delete/ammenitie/{id}','DeleteAmmenitie')->name('delete.ammenitie');
        Route::post('/save/ammenitie','SaveAmmenitie')->name('save.ammenitie');
        Route::post('/update/ammenitie','UpdateAmmenitie')->name('update.ammenitie');
    });

});
// ---------------------------------------------------------------------------------

Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','Allpermission')->name('all.permission');
        Route::get('/add/permission','Addpermission')->name('add.permission');
        Route::get('/import/permission','Importpermission')->name('import.permission');
        Route::get('/edit/permission/{id}','Editpermission')->name('edit.permission');
        Route::get('/delete/permission/{id}','Deletepermission')->name('delete.permission');
        Route::get('/export/permission','Exportpermission')->name('export');
        Route::post('/save/permission','Savepermission')->name('save.permission');
        Route::post('/update/permission','Updatepermission')->name('update.permission');
        Route::post('/import/permission','Import')->name('import');
    });

});
// ---------------------------------------------------------------------------------------------


Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/role','Allrole')->name('all.role');
        Route::get('/add/role','Addrole')->name('add.role');
        Route::get('/import/role','Importrole')->name('import.role');
        Route::get('/edit/role/{id}','Editrole')->name('edit.role');
        Route::get('/delete/role/{id}','Deleterole')->name('delete.role');
        Route::post('/save/role','Saverole')->name('save.role');
        Route::post('/update/role','Updaterole')->name('update.role');
        Route::post('/role/permission/store','RolePermissionStore')->name('role.permission.store');
        Route::get('/add/role/permission','AddRolesPermission')->name('add.permissions.roles');
        Route::get('/all/role/permission','AllRolesPermission')->name('all_permission_roles');
        Route::get('admin/edit/role/permission/{id}','Editpermissionrole')->name('admin.edit.permission');
        Route::get('admin/delete/role/permission/{id}','Deletepermissionrole')->name('admin.delete.permission');
        Route::post('admin/update/role','UpdateRolePermission')->name('update.role.permission');
    });

});
