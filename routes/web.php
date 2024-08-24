<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ReaderDashboardController;
use App\Http\Controllers\ReaderProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BlogFavouriteController;
use App\Http\Controllers\ProductFavouriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , [FrontendController::class , 'index'])->name('pages.index');
//Page
// Route::get('{slug}' , [FrontendController::class , 'page'])->name('pages');
//About-us
Route::get('about-us' , [FrontendController::class , 'about'])->name('about-us');
//Contact-us
Route::get('contact-us' , [ContactController::class , 'contact'])->name('contact-us');
Route::post('contact/store' , [ContactController::class , 'store'])->name('contact.store');
//Faq
Route::get('faq' , [FrontendController::class , 'faq'])->name('faq');
//Terms and Conditions
Route::get('terms-and-conditions' , [FrontendController::class , 'terms'])->name('terms');
//Blog
Route::get('blogs' , [FrontendController::class , 'blog'])->name('blogs');
Route::get('blog/{slug}/detail' , [FrontendController::class , 'blogDetail'])->name('blog-detail');
Route::get('blog/month/{name}' , [FrontendController::class , 'blogMonth'])->name('blog-month');
Route::get('blog/category/{slug}' , [FrontendController::class , 'categoryWise'])->name('category-wise');
//Comment
Route::post('comment/store' , [CommentController::class , 'store'])->name('comment.store');
Route::delete('comment/{id}/delete' , [CommentController::class , 'destroy'])->name('comment.delete');

//Shop
Route::get('shop' , [FrontendController::class , 'shop'])->name('pages.shop');
//Product Detail
Route::get('product/{slug}/detail' , [FrontendController::class , 'detail'])->name('product.detail');
//Category Wise Product
Route::get('category/{name}/product' , [FrontendController::class , 'categoryProduct'])->name('categorywise.product');
//Brand Wise Product
Route::get('brand/{name}/product' , [FrontendController::class , 'brandProduct'])->name('brandwise.product');
//Size Wise Product
Route::get('size/{size}/product' , [FrontendController::class , 'sizeProduct'])->name('sizewise.product');



//user
Route::post('user/logout', function () {
    Auth::guard('user')->logout();
    return redirect('login');
})->name('user.logout');

Route::middleware(['auth'])->name('user.')->prefix('user')->group(function () {

    Route::get('dashboard' , [UserDashboardController::class , 'dashboard'])->name('dashboard');

    //Profile
    Route::get('profile' , [UserProfileController::class , 'profile'])->name('profile');
    Route::post('profile/{id}/update' , [UserProfileController::class , 'update'])->name('profile.update');
    Route::get('view' , [UserProfileController::class , 'view'])->name('profile.view');

    //Blog
    Route::resource('blog' , BlogController::class);

    //Favourite Blog
    Route::get('favourite/blogs' , [UserDashboardController::class , 'favourite'])->name('blog.favourite');
    Route::delete('blogs/{id}/delete' , [UserDashboardController::class , 'destroy'])->name('blog.destroy');

    //Reviews
    Route::get('reviews' , [UserDashboardController::class , 'review'])->name('review.index');
    Route::delete('review/{id}/delete' , [UserDashboardController::class , 'delete'])->name('review.destroy');

    //My Orders
    Route::get('orders' , [UserDashboardController::class , 'order'])->name('order.index');
    Route::get('order/{id}/view' , [UserDashboardController::class , 'orderView'])->name('order.view');



    });


    //reader
    Route::post('reader/logout', function () {
        Auth::guard('reader')->logout();
        return redirect('login');
    })->name('reader.logout');

    Route::middleware(['auth'])->name('reader.')->prefix('reader')->group(function () {

        Route::get('dashboard' , [ReaderDashboardController::class , 'dashboard'])->name('dashboard');

        //Profile
        Route::get('profile' , [ReaderProfileController::class , 'profile'])->name('profile');
        Route::post('profile/{id}/update' , [ReaderProfileController::class , 'update'])->name('profile.update');
        Route::get('view' , [ReaderProfileController::class , 'view'])->name('profile.view');

        //Blog
        Route::get('favourite/blogs' , [ReaderDashboardController::class , 'blog'])->name('blog.index');
        Route::delete('blogs/{id}/delete' , [ReaderDashboardController::class , 'destroy'])->name('blog.destroy');


        //Reviews
        Route::get('reviews' , [ReaderDashboardController::class , 'review'])->name('review.index');
        Route::delete('review/{id}/delete' , [ReaderDashboardController::class , 'delete'])->name('review.destroy');


   //My Orders
   Route::get('orders' , [ReaderDashboardController::class , 'order'])->name('order.index');
   Route::get('order/{id}/view' , [ReaderDashboardController::class , 'orderView'])->name('order.view');

        });

Auth::routes();

Route::middleware(['auth','isUser'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth'])->group(function () {

    //review/store
    Route::post('review/store' , [ReviewController::class , 'store'])->name('review.store');

    //ProductFavourite
    Route::post('product/favourite' , [ProductFavouriteController::class , 'store'])->name('product.favourite');

    //Blog Favourite
    Route::post('favourite/store' , [BlogFavouriteController::class , 'store'])->name('favourite.store');

    //Cart
    Route::get('cart' , [CartController::class , 'cart'])->name('pages.cart');
    Route::post('/add-to-cart' , [CartController::class , 'addToCart']);
    Route::delete('cart/{id}/delete' , [CartController::class , 'destroy'])->name('cart.destroy');

    //Checkout
    Route::get('checkout' , [CheckoutController::class , 'checkout'])->name('pages.checkout');
    Route::post('place-order' , [CheckoutController::class , 'placeOrder'])->name('place-order');

    //Wishlist
    Route::get('wishlist' , [FrontendController::class , 'wishlist'])->name('pages.wishlist');
    Route::delete('product/{id}/delete' , [FrontendController::class , 'destroy'])->name('product.destroy');


});
