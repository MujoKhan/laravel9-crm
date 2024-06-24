<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Emp\EmpController;
use App\Http\Controllers\Emp\DataAdminController;
use App\Http\Controllers\Emp\HrController;
use App\Http\Controllers\Emp\InterViewerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user
Route::prefix('user')->name('user.')->group(function(){

    // guest route
    Route::middleware(['guest:emp','PreventBackHistory'])->group(function(){

        Route::view('/login','login')->name('login');
        Route::view('/register','register')->name('register');
        Route::post('/create',[EmpController::class, 'create'])->name('create');
        Route::post('/check',[EmpController::class, 'check'])->name('check');
        
    });

    // authenticate route
    Route::middleware(['auth:emp','PreventBackHistory'])->group(function(){
        Route::get('/logout',[EmpController::class, 'logout'])->name('logout');

        // hr route
        Route::prefix('hr')->name('hr.')->group(function(){
            Route::view('/home','hr.home')->name('home');
            Route::get('/task/{id}/{v}',[HrController::class, 'index'])->name('task');
            Route::view('/update','hr.update')->name('update');
            Route::post('/profile',[HrController::class, 'profile'])->name('profile');
            Route::post('/update-user/{id}',[HrController::class, 'update'])->name('update-user');
            Route::get('/edit-user/{id}',[HrController::class, 'edit'])->name('edit-user');
            Route::get('/user-assign/{id}/{v}',[HrController::class, 'assign'])->name('user-assign');
            Route::post('/round/{id}/{r}',[HrController::class, 'allround'])->name('round');
        });

        // interviewer route
        Route::prefix('interviewer')->name('interviewer.')->group(function(){
            Route::view('/home','interviewer.home')->name('home');
            Route::view('/update','interviewer.update')->name('update');
            Route::post('/profile',[InterViewerController::class, 'profile'])->name('profile');
            Route::get('/round/{id}/{v}',[InterViewerController::class, 'index'])->name('round');
            Route::get('/interview/{id}/{r}',[InterViewerController::class, 'interview'])->name('interview');
            Route::post('/round-result/{v}',[InterViewerController::class, 'roundresult'])->name('round-result');
        });

        // data admin route
        Route::prefix('dataadmin')->name('dataadmin.')->group(function(){
            Route::view('/home','dataadmin.home')->name('home');
            Route::view('/add','dataadmin.add')->name('add');
            Route::get('/show/{id}/{v}',[DataAdminController::class, 'index'])->name('show');
            Route::post('/add/{id}/{v}',[DataAdminController::class, 'store'])->name('add-data');
            Route::get('/edit/{id}/{v}',[DataAdminController::class, 'edit'])->name('edit');
            Route::post('/update/{id}/{v}',[DataAdminController::class, 'update'])->name('update');
            Route::post('/assign/{id}',[DataAdminController::class, 'assign'])->name('assign');
            
            
        });
    });
});


// admin
Route::prefix('admin')->name('admin.')->group(function(){

    // admin guest route
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','admin.login')->name('login');
        Route::post('/check',[AdminController::class, 'check'])->name('check');

    });

    // admin authenticate route
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','admin.home')->name('home');
        Route::get('/emp/{v}',[AdminController::class, 'index'])->name('emp');
        Route::post('/update/{v}',[AdminController::class, 'update'])->name('update');
        Route::get('/edit/{id}/{v}',[AdminController::class, 'edit'])->name('edit');
        Route::get('/work/{id}',[AdminController::class, 'showempwork'])->name('work');
        Route::get('/trash/{id}',[AdminController::class, 'trash'])->name('trash');
        Route::get('/restore/{id}',[AdminController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}',[AdminController::class, 'delete'])->name('delete');
        Route::post('/add-emp',[AdminController::class, 'store'])->name('add-emp');
        Route::get('/approval/{id}',[AdminController::class, 'approve'])->name('approval');
        Route::get('/block/{id}',[AdminController::class, 'block'])->name('block');
        Route::view('/add','admin.add-user')->name('add');
        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
    });
});


// super admin
Route::prefix('super')->name('super.')->group(function(){
    // super admin guest route
    Route::middleware(['guest:super','PreventBackHistory'])->group(function(){
        Route::view('/login','super.login')->name('login');
        Route::post('/check',[SuperAdminController::class, 'check'])->name('check');

    });

    // super admin authenticate route
    Route::middleware(['auth:super','PreventBackHistory'])->group(function(){
        Route::view('/home','super.home')->name('home');
        Route::get('/task/{v}',[SuperAdminController::class, 'index'])->name('task');
        Route::post('/add',[SuperAdminController::class, 'store'])->name('add');
        Route::post('/update/{v}',[SuperAdminController::class, 'update'])->name('update');
        Route::get('/edit/{id}/{v}',[SuperAdminController::class, 'edit'])->name('edit');
        Route::get('/trash/{id}',[SuperAdminController::class, 'trash'])->name('trash');
        Route::get('/restore/{id}',[SuperAdminController::class, 'restore'])->name('restore');
        Route::get('/delete/{id}',[SuperAdminController::class, 'fdelete'])->name('delete');
        Route::get('/logout',[SuperAdminController::class, 'logout'])->name('logout');
    });
});
