<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ControlPanelController;

use Illuminate\Support\Facades\Route;

//Main routes
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/cart', [MainController::class, 'cart']);
Route::get('/product/{id}', [MainController::class, 'product'])->name('product');
Route::get('/category/{id}', [MainController::class, 'category']);
Route::get('/brand/{id}', [MainController::class, 'brand']);
Route::get('/favorites', [MainController::class, 'favorites']);
//Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_process']);
Route::post('/register', [AuthController::class, 'register_process']);

Route::middleware('auth')->group(function () {
    //Main
    Route::get('/exit', [AuthController::class, 'exit']);
    Route::get('/cabinet', [AuthController::class, 'cabinet'])->name('cabinet');
    //Handlers
    Route::get('/user_info_edit', [AuthController::class, 'user_info_edit'])->name('user_info_edit');
    Route::post('/user_info_edit', [AuthController::class, 'user_info_edit_process'])->name('user_info_edit_process');
    Route::post('/user_info_avatar', [AuthController::class, 'user_info_edit_avatar'])->name('user_info_edit_avatar');
    //Cabinet
    Route::get('/delivery', [AuthController::class, 'delivery']);
    // Route::get('/sale', [AuthController::class, 'sale']);
    // Route::get('/coupons', [AuthController::class, 'coupons']);
    // Route::get('/stocks', [AuthController::class, 'stocks']);
    Route::get('/expenses', [AuthController::class, 'expenses']);
    Route::get('/purchases', [AuthController::class, 'purchases']);
    Route::get('/activity', [AuthController::class, 'activity']);
    Route::get('/add_favourite/{id}', [AuthController::class, 'add_favourite']);

    Route::post('/review_add/{id}', [MainController::class, 'review_add']);

});

Route::middleware('auth','admin')->group(function () {
    //Control Panel
    Route::get('/control_panel', [ControlPanelController::class, 'index'])->name('c_p');
    Route::get('/cp_categories', [ControlPanelController::class, 'categories'])->name('c_p_categories');
    Route::get('/slider', [ControlPanelController::class, 'slider'])->name('slider');
    Route::get('/collections', [ControlPanelController::class, 'collections'])->name('collections');
    Route::get('/mactions', [ControlPanelController::class, 'mactions'])->name('mactions');
    Route::get('/mrecomendations', [ControlPanelController::class, 'mrecomendations'])->name('mrecomendations');
    Route::get('/product_post', [ControlPanelController::class, 'product_post'])->name('product_post');
    Route::get('/review_post', [ControlPanelController::class, 'review_post'])->name('review_post');
    Route::get('/store_list', [ControlPanelController::class, 'store_list'])->name('store_list');

    //Forms
    Route::get('/category_edit/{id}', [ControlPanelController::class, 'category_edit']);
    Route::get('/punkt_add/{id}', [ControlPanelController::class, 'punkt_add']);
    Route::get('/cp_add_slide', [ControlPanelController::class, 'add_slide'])->name('add_slide');
    Route::get('/cp_edit_slide/{id}', [ControlPanelController::class, 'edit_slide'])->name('edit_slide');
    Route::get('/cp_add_collection', [ControlPanelController::class, 'add_collection'])->name('add_collection');
    Route::get('/cp_edit_collection/{id}', [ControlPanelController::class, 'edit_collection']);
    Route::get('/cp_add_maction', [ControlPanelController::class, 'add_maction'])->name('add_maction');
    Route::get('/cp_edit_maction/{id}', [ControlPanelController::class, 'edit_maction']);
    Route::get('/cp_add_mrecomendation', [ControlPanelController::class, 'add_mrecomendation'])->name('add_maction');
    Route::get('/cp_edit_mrecomendation/{id}', [ControlPanelController::class, 'edit_mrecomendation']);

    //Category
    Route::post('/add_categories', [ControlPanelController::class, 'add_categories_process']);
    Route::post('/category_edit/{id}', [ControlPanelController::class, 'category_edit_process']);
    Route::get('/category_del/{id}', [ControlPanelController::class, 'category_delete_process']);
    //Collections
    Route::post('/cp_add_collection', [ControlPanelController::class, 'add_collection_process']);
    Route::post('/cp_edit_collection/{id}', [ControlPanelController::class, 'collection_edit_process']);
    Route::get('/cp_delete_collection/{id}', [ControlPanelController::class, 'collection_delete_process']);
    //Mactions
    Route::post('/cp_add_maction', [ControlPanelController::class, 'add_maction_process']);
    Route::post('/cp_edit_maction/{id}', [ControlPanelController::class, 'maction_edit_process']);
    Route::get('/cp_delete_maction/{id}', [ControlPanelController::class, 'maction_delete_process']);
    //Mrecomendations
    Route::post('/cp_add_mrecomendation', [ControlPanelController::class, 'add_mrecomendation_process']);
    Route::post('/cp_edit_mrecomendation/{id}', [ControlPanelController::class, 'mrecomendation_edit_process']);
    Route::get('/cp_delete_mrecomendation/{id}', [ControlPanelController::class, 'mrecomendation_delete_process']);
    //Slider
    Route::post('/cp_add_slide', [ControlPanelController::class, 'add_slide_process']);
    Route::post('/cp_edit_slide/{id}', [ControlPanelController::class, 'edit_slide_process']);
    Route::get('/cp_delete_slide/{id}', [ControlPanelController::class, 'delete_slide_process']);
    //Puncts
    Route::post('/punkt_add/{category}', [ControlPanelController::class, 'punkt_add_process']);
});

Route::middleware('auth','seller')->group(function () {
    //Store
    Route::get('/store', [StoreController::class, 'index'])->name('store');
    Route::get('/store/products', [StoreController::class, 'store_products'])->name('store_products');

    //Forms
    Route::get('/store_add', [StoreController::class, 'store_add']);
    Route::get('/add_product', [StoreController::class, 'add_product']);
    Route::get('/edit_product/{id}', [StoreController::class, 'edit_product']);
    Route::get('/delete_product/{id}', [StoreController::class, 'delete_product']);

    //Handlers
    Route::post('/store_add', [StoreController::class, 'store_add_process']);
    Route::post('/add_product', [StoreController::class, 'add_product_process']);
    Route::post('/edit_product/{id}', [StoreController::class, 'edit_product_process']);
    Route::post('/delete_product/{id}', [StoreController::class, 'delete_product_process']);
});