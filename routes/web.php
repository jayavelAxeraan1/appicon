<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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


Route::group(['middleware' => ['auth']], function () { 

Route::get('/home', [HomeController::class, 'index'])->name('home');


// profile update
Route::get('update-profile', function(){
    return view('update-profile');
    });

Route::post('update-profile/edit/{id}', [AdminController::class,'Passwordupdate'])->name('update-profile.update');


//add new app..
Route::get("add-new-app", function(){
    return view("add-new-app");
    });
    
Route::get('add-new-app',  [AdminController::class,'NewAppselect']);


//app list insert 
Route::post('add-new-app', [AdminController::class,'NewAppinsert'])->name('new-app.insert');

//new app update
Route::get('app-list/edit/{id}',[AdminController::class, 'NewAppSelectid'])->name('applist.update');
 
    
//app select
 Route::get('app-list', [AdminController::class, 'applistselect']);


//app list delete..
Route::get('app-list/delete/{id}', [AdminController::class, 'deleteApplist']);


//add new category..
Route::get("add-new-category", function(){
    return view("add-new-category");
    });

Route::get('add-new-category', [AdminController::class, 'categoryselect']);
Route::post('add-new-category', [AdminController::class, 'categoryinsert'])->name('add-category.insert');


//category list
Route::get("category-list", [AdminController::class, 'categorylistselect']);







//logout..
Route::get('logout', [AdminController::class,'logout']);

});