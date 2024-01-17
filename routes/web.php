<?php

use App\Http\Controllers\Admin\CatlogCategoriesController;
use App\Http\Controllers\Admin\CatlogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DesignerController;
use App\Http\Controllers\Admin\EcommerceOrderController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\FabricController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Manufacturer\ManufacturerHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/student', function () {
//     return view('welcome');
// });
// Route::get('/custom', function () {
//     return view('admin.edit_customer');
// });
// Route::get('/design', function () {
//     return view('admin.edit_designer');
// });
// Route::get('/edit', function () {
//     return view('admin.edit_product');
// });


Auth::routes();
Route::middleware(['auth'])->group(function () {

Route::get('/', [App\Http\Controllers\Controller::class, 'demo'])->name('demo');
Route::resource('/catlog_categories', CatlogCategoriesController::class);
Route::resource('/catlogs', CatlogController::class);
Route::resource('/fabrics', FabricController::class);
Route::resource('/extras', ExtraController::class);
Route::resource('/manufacturers', ManufacturerController::class);
Route::resource('/designers', DesignerController::class);
Route::resource('/customers', CustomerController::class);
Route::resource('/product_categories', ProductCategoriesController::class);
Route::resource('/products', ProductController::class);
// Route::resource('/orders', ProductController::class);
Route::resource('/ecom_orders', EcommerceOrderController::class);
// Route::get('/students', [App\Http\Controllers\Student2Controller::class, 'index'])->name('students');

//manufacturer
Route::resource('/manufacturer_home', ManufacturerHomeController::class);
Route::get('/manufacturer_order', [ManufacturerHomeController::class, 'myOrders'])->name('manufacturer.order');
Route::get('/manufacturer_transactions', [ManufacturerHomeController::class, 'transactions'])->name('manufacturer.trans');


});



