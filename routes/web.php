<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Castle\CastleController;
use App\Http\Controllers\Castle\CastleAdminController;
use App\Http\Controllers\Castle\CastleCategoryController;
use App\Http\Controllers\Castle\CastleProductController;
use App\Http\Controllers\Castle\CastleSliderController;
use App\Http\Controllers\Castle\CastleBrandController;
use App\Http\Controllers\Castle\CastleSettingController;
use App\Http\Controllers\Castle\CastleUserController;
use App\Http\Controllers\Site\SiteController;
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

Route::group(['middleware'=>'guest'], function (){
    Route::get('/',[SiteController::class,'index'])
        ->name('castle.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard Route without Admin Group

Route::middleware('guest')->group(function () {
    Route::get('castle/login',[CastleController::class,'login'])->name('castle.login');
    Route::post('castle/login/owner',[CastleController::class,'loginPost'])->name('castle.login.post');

});


Route::group(['prefix' => 'castle','middleware'=>'admin'], function (){
    Route::get('/dashboard',[CastleController::class,'dashboard'])
        ->name('castle.dashboard');
    Route::get('/logout',[CastleController::class,'castleLogout'])
        ->name('castle.logout');
});

Route::group(['prefix' => 'castle/admin','middleware'=>'admin'], function (){
    Route::get('/',[CastleAdminController::class,'index'])
        ->name('castle.admin.index');
    Route::get('/create',[CastleAdminController::class,'create'])
        ->name('castle.admin.create');
    Route::post('/store',[CastleAdminController::class,'store'])
        ->name('castle.admin.store');
    Route::get('/edit/{id}',[CastleAdminController::class,'edit'])
        ->name('castle.admin.edit');
    Route::post('/update',[CastleAdminController::class,'update'])
        ->name('castle.admin.update');
    Route::get('/delete/{id}',[CastleAdminController::class,'destroy'])
        ->name('castle.admin.delete');
});

Route::group(['prefix' => 'castle/user','middleware'=>'admin'], function (){
    Route::get('/',[CastleUserController::class,'index'])
        ->name('castle.user.index');
    Route::get('/create',[CastleUserController::class,'create'])
        ->name('castle.user.create');
    Route::post('/store',[CastleUserController::class,'store'])
        ->name('castle.user.store');
    Route::get('/edit/{id}',[CastleUserController::class,'edit'])
        ->name('castle.user.edit');
    Route::post('/update',[CastleUserController::class,'update'])
        ->name('castle.user.update');
    Route::get('/delete/{id}',[CastleUserController::class,'destroy'])
        ->name('castle.user.delete');
    Route::get('/change-pass/{id}',[CastleUserController::class,'changePass'])
        ->name('castle.user.change_pass');
    Route::post('/change-pass/update',[CastleUserController::class,'changePassStore'])
        ->name('castle.user.pstore');
    Route::get('/detail/{user_id}',[CastleUserController::class,'userProfile'])
        ->name('castle.user.detail');
    Route::get('/detail/update',[CastleUserController::class,'userDetailUpdate'])
        ->name('castle.user.detailUpdate');
});

Route::group(['prefix' => 'castle/category','middleware'=>'admin'], function (){
    Route::get('/',[CastleCategoryController::class,'index'])
        ->name('castle.category.index');
    Route::get('/create',[CastleCategoryController::class,'create'])
        ->name('castle.category.create');
    Route::post('/store',[CastleCategoryController::class,'store'])
        ->name('castle.category.store');
    Route::get('/edit/{id}',[CastleCategoryController::class,'edit'])
        ->name('castle.category.edit');
    Route::post('/update',[CastleCategoryController::class,'update'])
        ->name('castle.category.update');
    Route::get('/delete/{id}',[CastleCategoryController::class,'destroy'])
        ->name('castle.category.delete');
});

Route::group(['prefix' => 'castle/product','middleware'=>'admin'], function (){
    Route::get('/',[CastleProductController::class,'index'])
        ->name('castle.product.index');
    Route::get('/create',[CastleProductController::class,'create'])
        ->name('castle.product.create');
    Route::post('/store',[CastleProductController::class,'store'])
        ->name('castle.product.store');
    Route::get('/edit/{id}',[CastleProductController::class,'edit'])
        ->name('castle.product.edit');
    Route::post('/update',[CastleProductController::class,'update'])
        ->name('castle.product.update');
    Route::get('/delete/{id}',[CastleProductController::class,'destroy'])
        ->name('castle.product.delete');
    Route::get('/{product_image_id}/delete',[CastleProductController::class,'destroyImage']);
});

Route::group(['prefix' => 'castle/slider','middleware'=>'admin'], function (){
    Route::get('/',[CastleSliderController::class,'index'])
        ->name('castle.slider.index');
    Route::post('/store',[CastleSliderController::class,'store'])
        ->name('castle.slider.store');
    Route::get('/edit/{id}',[CastleSliderController::class,'edit'])
        ->name('castle.slider.edit');
    Route::post('/update',[CastleSliderController::class,'update'])
        ->name('castle.slider.update');
    Route::get('/delete/{id}',[CastleSliderController::class,'destroy'])
        ->name('castle.slider.delete');
});

Route::group(['prefix' => 'castle/brand','middleware'=>'admin'], function (){
    Route::get('/',[CastleBrandController::class,'index'])
        ->name('castle.brand.index');
    Route::post('/store',[CastleBrandController::class,'store'])
        ->name('castle.brand.store');
    Route::get('/edit/{id}',[CastleBrandController::class,'edit'])
        ->name('castle.brand.edit');
    Route::post('/update',[CastleBrandController::class,'update'])
        ->name('castle.brand.update');
    Route::get('/delete/{id}',[CastleBrandController::class,'destroy'])
        ->name('castle.brand.delete');
});

Route::group(['prefix' => 'castle/setting','middleware'=>'admin'], function (){
    Route::get('/',[CastleSettingController::class,'index'])
        ->name('castle.setting.index');
    Route::get('/edit/{id}',[CastleSettingController::class,'edit'])
        ->name('castle.setting.edit');
    Route::post('/update',[CastleSettingController::class,'update'])
        ->name('castle.setting.update');
});

require __DIR__.'/auth.php';
