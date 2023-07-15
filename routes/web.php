<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


//backend

//Admin routes

Auth::routes(['login' => false, 'register' => false, 'verify' => true]);
Route::get('admin/login')->name('login')->uses('App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('admin/login')->uses('App\Http\Controllers\Auth\LoginController@login');

Route::get('admin/register')->name('register')->uses('App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->middleware('verified');
Route::post('admin/register')->uses('App\Http\Controllers\Auth\RegisterController@register')->middleware('verified');
Route::get('admin/edit_user/{user}')->name('users.edit')->uses('App\Http\Controllers\Auth\RegisterController@edit')->middleware('verified');
Route::put('/update_user/{user}')->name('users.update')->uses('App\Http\Controllers\Auth\RegisterController@update')->middleware('verified');
Route::delete('/delete_user/{id}')->name('users.delete')->uses('App\Http\Controllers\Auth\RegisterController@delete')->middleware('verified');


    //adminPanel
    Route::get('/adminPanel', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth')->middleware('verified');
    //makers
    Route::get('/admin/manage-makers', [App\Http\Controllers\ManageMakersController::class, 'index'])->name('manageMaker')->middleware('auth')->middleware('verified');
    Route::post('/store-maker', [App\Http\Controllers\ManageMakersController::class, 'store'])->name('store.maker')->middleware('auth')->middleware('verified');
    Route::get('/admin/edit-maker/{maker}', [App\Http\Controllers\ManageMakersController::class, 'edit'])->name('edit.maker')->middleware('auth')->middleware('verified');
    Route::put('/update_maker/{maker}', [App\Http\Controllers\ManageMakersController::class, 'update'])->name('update.maker')->middleware('auth')->middleware('verified');
    Route::delete('/delete-maker/{id}', [App\Http\Controllers\ManageMakersController::class, 'delete'])->name('delete.maker')->middleware('auth')->middleware('verified');
    Route::post('delete-all-makers/', [App\Http\Controllers\ManageMakersController::class, 'deleteAll'])->name('delete.allmakers')->middleware('auth')->middleware('verified');
    
    //vehicles
    Route::post('store-vehicle', [App\Http\Controllers\VehicleController::class, 'store'])->name('store.vehicle')->middleware('auth')->middleware('verified');;
    Route::get('/admin/edit-vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'edit'])->name('edit.vehicle')->middleware('auth')->middleware('verified');
    Route::put('/update_vehicle/{vehicle}', [App\Http\Controllers\VehicleController::class, 'update'])->name('update.vehicle')->middleware('auth')->middleware('verified');
    Route::delete('delete-vehicle/{id}', [App\Http\Controllers\VehicleController::class, 'delete'])->name('delete.vehicle')->middleware('auth')->middleware('verified');
    Route::get('/admin/manage-vehicle', [App\Http\Controllers\VehicleController::class, 'adminIndex'])->name('manageVehicle')->middleware('auth')->middleware('verified');
    Route::post('delete-all-vehicle/', [App\Http\Controllers\VehicleController::class, 'deleteAll'])->name('delete.allvehicle')->middleware('auth')->middleware('verified');
    
    //buying vehicle
    Route::get('/admin/buying-vehicles', [App\Http\Controllers\BuyingVehicleController::class, 'index'])->name('buyingVehicle')->middleware('auth')->middleware('verified');
    Route::get('/admin/view-buying-vehicle/{id}', [App\Http\Controllers\BuyingVehicleController::class, 'find'])->name('findBuyingVehicle')->middleware('auth')->middleware('verified');
    Route::delete('delete-Buying-vehicle/{id}', [App\Http\Controllers\BuyingVehicleController::class, 'delete'])->name('delete.buying-vehicle')->middleware('auth')->middleware('verified');
    Route::post('/delete-all-Buying-vehicle', [App\Http\Controllers\BuyingVehicleController::class, 'deleteAll'])->name('deleteAll')->middleware(['auth']);
    
    //ads
    Route::get('/admin/banner-ads', [App\Http\Controllers\AdController::class, 'index'])->name('ad')->middleware('auth')->middleware('verified');
    Route::post('/store-ad', [App\Http\Controllers\AdController::class, 'store'])->name('store.ad')->middleware('auth')->middleware('verified');
    Route::delete('/delete-ad/{id}', [App\Http\Controllers\AdController::class, 'delete'])->name('delete.ad')->middleware('auth')->middleware('verified');
    
    //notification
    Route::get('/markasread', [App\Http\Controllers\NotificationController::class, 'markasread'])->name('markasread')->middleware('auth')->middleware('verified');
    Route::put('/update_read_at/{vehicle}', [App\Http\Controllers\NotificationController::class, 'update'])->name('update.read_at')->middleware('auth')->middleware('verified');
    Route::delete('/delete_notification', [App\Http\Controllers\NotificationController::class, 'delete'])->name('delete.notify')->middleware('auth')->middleware('verified');





//frontend

Route::get('/about-us', function () {
    return view('user.about');
});
//welcome page
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');

//all vehicles
Route::get('/all-vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles');

//vehicle details
Route::get('/vehicle-details/{vehicle}', [App\Http\Controllers\VehicleController::class, 'findVehicle'])->name('find.vehicle');

//contact
Route::get('/contact-us', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('create.contact');

//search by makers
Route::get('/search/{maker}', [App\Http\Controllers\VehicleController::class, 'searchVehicle'])->name('searchVehicle');

//sell vehicle
Route::get('/sell-vehicle', [App\Http\Controllers\SellVehicleController::class, 'index'])->name('sellVehicle');
Route::post('/store-selling-vehicle', [App\Http\Controllers\SellVehicleController::class, 'store'])->name('store.sell-vehicle');
