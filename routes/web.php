<?php

use App\Http\Controllers\Admin\CatlogCategoriesController;
use App\Http\Controllers\Admin\CatlogController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DesignerController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\FabricController;
use App\Http\Controllers\Admin\ManufacturerController;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\Controller::class, 'demo'])->name('demo');
Route::resource('/catlog_categories', CatlogCategoriesController::class);
Route::resource('/catlogs', CatlogController::class);
Route::resource('/fabrics', FabricController::class);
Route::resource('/extras', ExtraController::class);
Route::resource('/manufacturers', ManufacturerController::class);
Route::resource('/designers', DesignerController::class);
Route::resource('/customers', CustomerController::class);




