<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//--------------store manager routes-----------------

//home route
Route::get('/home' , function(){
    return view('storeManager.store-manager-home');
});

//view requested items route
Route::get('/view-requested-items' , function(){
    return view('storeManager.view-rquest-item');
});

//store visit route
Route::get('/visit-store' , function(){
    return view('storeManager.store');
});

//view return items
Route::get('/siba-store-view-return-items' , function(){
    return view('storeManager.view-return-item');
});

//route to store page catagory table Item table catagory --> sub catagory
Route::get('/siba-store-item-by-catagory-table' , function(){
    return view('storeManager.Item-by-catargory-page');
});

Route::get('/update-profile' , function(){
    return view('update-profiles');
});;
