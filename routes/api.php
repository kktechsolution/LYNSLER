<?php

use App\Http\Controllers\Api\Admin\BannerController;
use App\Http\Controllers\Api\Admin\BrandController;
use App\Http\Controllers\Api\Admin\CategoriesController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\PostController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\ProductImagesController;
use App\Http\Controllers\Api\Admin\QueryListController;
use App\Http\Controllers\Api\Admin\TeamController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\CheckAuthController;
use App\Http\Controllers\Api\User\AllBannerController;
use App\Http\Controllers\Api\User\AllBlogsController;
use App\Http\Controllers\Api\User\AllTeaMemberController;
use App\Http\Controllers\Api\User\GetQuoteController;
use App\Http\Controllers\Api\User\ListProductController;
use App\Http\Controllers\Api\User\UserHomeController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [PassportAuthController::class, 'register']);
    Route::post('login', [PassportAuthController::class, 'login']);
    Route::post('forgot_password', [PassportAuthController::class, 'forgot_password']);
    Route::post('reset_password', [PassportAuthController::class, 'reset_password']);

    Route::middleware('auth:api')->group(function () {

        Route::post('change_password', [PassportAuthController::class, 'changePassword']);
        Route::get('query_list', [QueryListController::class, 'query_list']);
        Route::get('query_list/{id}', [QueryListController::class, 'query_read']);
        Route::get('newsletters', [QueryListController::class, 'all_newsletters']);
        Route::resource('blogs', PostController::class);
        Route::resource('team_member', TeamController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('product_images', ProductImagesController::class);
        Route::resource('order', OrderController::class);
        Route::resource('user', UserController::class);

        /////////////////
        Route::get('product_list', [ListProductController::class, 'index']);
        Route::get('product_categpry_list', [ListProductController::class, 'product_categpry_list']);
        Route::get('catlogs', [ListProductController::class, 'catlogs']);
        Route::get('catlog_categories', [ListProductController::class, 'catlog_categories']);
        Route::get('get_designers', [ListProductController::class, 'getDesigners']);
        Route::get('get_designer/{id}', [ListProductController::class, 'get_designer']);
        Route::get('extras', [ListProductController::class, 'get_extras']);
        Route::get('fabrics', [ListProductController::class, 'get_fabrics']);
        Route::resource('userHomeRoute', UserHomeController::class);

    });

    Route::get('all_blogs', [AllBlogsController::class, 'index']);
    Route::get('all_team_member', [AllTeaMemberController::class, 'index']);
    Route::get('all_banners', [AllBannerController::class, 'index']);

    Route::post('contact_us', [GetQuoteController::class, 'sendEmail'])->name('contact_us');
    Route::post('subscribe_newsletter', [GetQuoteController::class, 'subscribe_newsletter'])->name('subscribe_newsletter');
    Route::get('all_categories', [AllBlogsController::class, 'categories']);
    Route::get('all_products', [AllBlogsController::class, 'product']);
});
Route::get('checkAuth', [CheckAuthController::class, 'checkAuthUser'])->name('checkAuth');
