<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesProduct;
use App\Http\Controllers\CategoriesPost;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Cart;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\IntroduceController;
use App\Http\Controllers\OrderController;


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
// -------------------- CLIENT --------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tim-kiem', [HomeController::class, 'search']);
    // User account
Route::prefix('client')->group( function() {
    //login
    Route::get('/login', [UserController::class, 'client_login'])->name('client.login');
    Route::post('/handle-login', [UserController::class, 'handle_login'])->name('client.login.handle');
    //logout
    Route::get('/logout', [UserController::class, 'client_logout'])->name('client.logout');
    //register
    Route::get('/register', [UserController::class, 'client_register'])->name('client.register');
    Route::post('/handle-register', [UserController::class, 'handle_register'])->name('client.register.handle');
    //update info
    Route::get('/update', [UserController::class, 'client_update'])->name('client.update');
    Route::post('/handle-update', [UserController::class, 'handle_update'])->name('client.update.handle');
    //View Info
    Route::get('/client-info', [UserController::class, 'client_info'])->name('client.info');
    //View order history
    Route::get('/order-history', [UserController::class, 'order_history'])->name('client.history');
});

    // Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout_show'])->name('checkout');
Route::post('/checkout-handle', [CheckoutController::class, 'checkout_handle'])->name('checkout.handle');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('payment');
Route::get('/order-place', [CheckoutController::class, 'order_place'])->name('order.place');
Route::get('/order-success', [CheckoutController::class, 'order_success'])->name('order.success');


// -------------------- SERVER --------------------

    // Danh mục sản phẩm
Route::get('/danh-muc-san-pham/{category_id}', [CategoriesProduct::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);

    // Danh mục bài viết
Route::get('/danh-muc-bai-viet/{category_id}', [CategoriesPost::class, 'show_category_home']);
Route::get('/bai-viet/{post_id}', [PostController::class, 'content_post']);

    // ----- Cart -----
Route::post('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/gio-hang', [CartController::class, 'show_cart']);
Route::get('/del-product/{session_id}', [CartController::class, 'del_product']);
Route::get('/del-all-pro', [CartController::class, 'del_all_pro']);
Route::get('/show-cart-qty', [CartController::class, 'show_cart_qty']);

    //------Coupon------
Route::post('/check-coupon', [CartController::class, 'check_coupon']);

Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);
Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);

    //------Introduce------
Route::get('/gioi-thieu', [IntroduceController::class, 'index'])->name('introduce');

    //------Contact-----
Route::get('/lien-he', [ContactController::class, 'contact']);

    //-------Destroy Session-------
Route::get('/session-destroy', function() {
    session()->flush();
    return back();
});


// --------------------- ADMIN -----------------------

Route::get('/admin', [AdminController::class, 'index']); 
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

    // ----- Categories Product -----
Route::get('add-category-product', [CategoriesProduct::class, 'add_category_product']);
Route::get('edit-category-product/{category_product_id}', [CategoriesProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoriesProduct::class, 'delete_category_product']);
Route::get('list-categories-product', [CategoriesProduct::class, 'list_categories_product']);
Route::post('/save-category-product', [CategoriesProduct::class, 'save_category_product']);
Route::post('update-category-product/{category_product_id}', [CategoriesProduct::class, 'update_category_product']);
    
    // ----- Categories Post -----
Route::get('add-category-post', [CategoriesPost::class, 'add_category_post'])->name('cate.post.add');
Route::get('edit-category-post/{category_post_id}', [CategoriesPost::class, 'edit_category_post']);
Route::get('/delete-category-post/{category_post_id}', [CategoriesPost::class, 'delete_category_post']);
Route::get('list-categories-post', [CategoriesPost::class, 'list_categories_post'])->name('cate.post.list');

Route::get('/unactive-category-post/{category_post_id}', [CategoriesPost::class, 'unactive_category_post']);
Route::get('/active-category-post/{category_post_id}', [CategoriesPost::class, 'active_category_post']);

Route::post('/save-category-post', [CategoriesPost::class, 'save_category_post']);
Route::post('update-category-post/{category_post_id}', [CategoriesPost::class, 'update_category_post']);

    // ----- Product -----
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/list-product', [ProductController::class, 'list_product']);


Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

    // ----- Post -----
Route::get('/add-post', [PostController::class, 'add_post'])->name('post.add');
Route::get('/edit-post/{post_id}', [PostController::class, 'edit_post'])->name('post.edit');
Route::get('/delete-post/{post_id}', [PostController::class, 'delete_post']);
Route::get('/list-post', [PostController::class, 'list_post'])->name('post.list');


Route::get('/unactive-post/{post_id}', [PostController::class, 'unactive_post']);
Route::get('/active-post/{post_id}', [PostController::class, 'active_post']);

Route::post('/save-post', [PostController::class, 'save_post']);
Route::post('/update-post/{post_id}', [PostController::class, 'update_post']);

    //-----Rating-----
Route::post('/insert-rating', [ProductController::class, 'insert_rating']);

    // ------ User Management ------
Route::get('/list-client', [ManageUserController::class, 'list_clients'])->name('list.client');
Route::get('/list-staff', [ManageUserController::class, 'list_staffs'])->name('list.staff');
Route::get('/unlock-user/{id}', [ManageUserController::class, 'unlock_user']);
Route::get('/lock-user/{id}', [ManageUserController::class, 'lock_user']);

Route::get('/add-user', [ManageUserController::class, 'add_user'])->name('user.add');
Route::post('/add-user-handle', [ManageUserController::class, 'add_user_handle'])->name('user.add.handle');

Route::get('/update-user/{user_id}', [ManageUserController::class, 'update_user']);
Route::post('/update-user-handle/{user_id}', [ManageUserController::class, 'update_user_handle']);

Route::get('/delete-user/{user_id}', [ManageUserController::class, 'delete_user']);

    //----Delivery----
Route::get('delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);

    // ----- Slider -----
Route::get('/slider', [BannerController::class, 'manage_slider'])->name('slider');
Route::get('/them-slider', [BannerController::class, 'add_slider']);
Route::get('/xoa-slider/{slider_id}', [BannerController::class, 'delete_slider']);
Route::post('/luu-slider', [BannerController::class, 'insert_slider']);
    
    // ----- Partner -----
Route::get('/doi-tac', [BannerController::class, 'manage_partner']);
Route::get('/them-doi-tac', [BannerController::class, 'add_partner']);
Route::get('/xoa-doi-tac/{partner_id}', [BannerController::class, 'delete_partner']);
Route::post('/luu-doi-tac', [BannerController::class, 'insert_partner']);

    // ----- Order Handle -----
Route::get('/order-waiting', [OrderController::class, 'order_waiting'])->name('order.waiting');
Route::get('/order-handling/{id}', [OrderController::class, 'order_handling'])->name('order.handling');
Route::get('/order-unhandle/{id}', [OrderController::class, 'order_unhandle'])->name('order.unhandle');
Route::get('/order-handled', [OrderController::class, 'order_handled'])->name('order.handled');

// CKEditor/CKFinder
## /routes/web.php
Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

//Route::any('/ckfinder/examples/{example?}', '\CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
//    ->name('ckfinder_examples');