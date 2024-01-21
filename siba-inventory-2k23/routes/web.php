<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StoreManagerDashboardController;
use App\Http\Controllers\UserDashboardController;
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

// login page
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
Route::get('/storeManager/home',[StoreManagerDashboardController::class,'index'])->name('storeManager.home')->middleware('CheckStoreManagerRole');

//view requested items route
Route::get('/view-requested-items' , function(){
    return view('storeManager.view-rquest-item');
});

//store visit route
Route::get('/visit-store' , function(){
    return view('storeManager.store');
});


//--------------system admin routes-----------------
//home route
Route::get('/systemAdmin/home',[AdminDashboardController::class, 'index'])->name('systemAdmin.home')->middleware('CheckAdminRole');

//view return items
Route::get('/siba-store-view-return-items' , function(){
    return view('storeManager.view-return-item');
});

//route to store page catagory table Item table catagory --> sub catagory
Route::get('/siba-store-item-by-catagory-table' , function(){
    return view('storeManager.Item-by-catargory-page');
});

Route::get('/update-profile' , function(){
    return view('publicComponent.profile');
});;

//low quentity product route
Route::get('/store/low-quentity' , function(){
    return view('storeManager.low-quentity-product');
});;


//-------------------------------------------------Departmenyt user------------------------------------------------

//home view route

Route::get('/user/home' ,[UserDashboardController::class , 'index'])->name('user.home');


//user update profile
// Route::get('user/update-profile' , function(){
//     return view('DepartmentUser.user-update-profile');
// });;

Route::get('user-update-profile' , function(){
    return view('publicComponent.update-profile');
});

//view store
Route::get('/user/view-store' , function(){
    return view('DepartmentUser.visit-store-user');
});;

//------------------------------------------------------------------------------------------------------------------
