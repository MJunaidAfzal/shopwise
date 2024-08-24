<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewsController;



Route::get('admin/login', [AuthController::class, 'loginform'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('admin/login');
})->name('admin.logout');

Route::middleware(['auth:admin'])->name('admin.')->prefix('admin')->group(function () {


    Route::get('dashboard' , [DashboardController::class , 'dashboard'])->name('dashboard');

    //User
    Route::get('user' , [UserController::class , 'index'])->name('user.index');
    Route::get('user/create' , [UserController::class , 'create'])->name('user.create');
    Route::post('user/store' , [UserController::class , 'store'])->name('user.store');
    Route::get('user/{id}/edit' , [UserController::class , 'edit'])->name('user.edit');
    Route::post('user/{id}/update' , [UserController::class , 'update'])->name('user.update');
    Route::delete('user/{id}/destroy' , [UserController::class , 'destroy'])->name('user.destroy');
    Route::get('user/{name}/view' , [UserController::class , 'view'])->name('user.view');
    Route::get('change-password' , [UserController::class , 'changePassword'])->name('user.changePassword');
    Route::get('user/import' , [UserController::class , 'importData'])->name('user.import');
    Route::post('user/import-data' , [UserController::class , 'import'])->name('user.importData');
    Route::get('user/export' , [UserController::class , 'export'])->name('user.export');

    //Role
    Route::resource('role' , RoleController::class);


    //Page
    Route::resource('page' , PageController::class);

    //Message
    Route::get('contacts' , [MessageController::class , 'message'])->name('contact.index');
    Route::delete('contact/{id}/destroy' , [MessageController::class , 'destroy'])->name('contact.destroy');

    //Category
    Route::resource('category' , CategoryController::class);

    //Blog
    Route::get('blogs' , [BlogController::class , 'index'])->name('blog.index');
    Route::get('blog/search' , [BlogController::class , 'search'])->name('blog.search');
    Route::get('blogs/{id}/search' , [BlogController::class , 'blogSearch'])->name('blog.blogSearch');
    Route::delete('blog/{id}/delete' , [BlogController::class , 'destroy'])->name('blog.destroy');

    //Brand
    Route::resource('brand' , BrandController::class);

    //Banner
    Route::resource('banner' , BannerController::class);

    //Slider
    Route::resource('slider' , SliderController::class);

    //Setting
    Route::get('settings' , [SettingController::class , 'edit'])->name('setting.edit');
    Route::post('settings/store' , [SettingController::class , 'store'])->name('setting.store');
    Route::put('settings/update' , [SettingController::class , 'update'])->name('setting.update');

    //Product
    Route::resource('product' , ProductController::class);

    //Product Image
    Route::get('remove_gallery/{id}', [ProductController::class , 'remove_gallery'])->name('remove.gallery');
    Route::post('product/{id}/add-images', [ProductController::class , 'addimages'])->name('product.addimages');

    //Reviews
    Route::get('reviews' , [ReviewsController::class , 'review'])->name('review.index');
    Route::delete('review/{id}/delete' , [ReviewsController::class , 'destroy'])->name('review.destroy');

    //Orders
    Route::get('orders' , [DashboardController::class , 'order'])->name('order.index');
    Route::get('order/{id}/view' , [DashboardController::class , 'orderView'])->name('order.view');

    });
