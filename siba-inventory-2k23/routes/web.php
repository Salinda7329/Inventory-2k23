<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreManagerDashboardController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

// login page
Route::get('/', function () {
    return view('welcome');
});
// home page
Route::get('/home', function () {
    return view('welcome');
})->middleware('RedirectToHomeBasedOnRole');

//default dashboard by Jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


//--------------system admin routes-----------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified',
    'CheckAdminRole'
])->group(function () {

});
    //home route
    Route::get('/systemAdmin/home', [AdminDashboardController::class, 'index'])->name('systemAdmin.home');
    //create new user
    Route::post('/systemAdmin/newUser', [AdminUserController::class, 'create'])->name('systemAdmin.newUser');
    //route to fetch all user data
    Route::get('/systemAdmin/home/fetchAllUserData', [AdminDashboardController::class, 'fetchAllUserData'])->name('fetchAllUserData');
    //route to edit user data
    Route::get('/systemAdmin/User/edit', [AdminDashboardController::class, 'edit'])->name('user.edit');
    //route to update student data
    Route::post('/systemAdmin/User/update', [AdminDashboardController::class, 'update'])->name('user.update');
//--------------End system admin routes-----------------



//--------------head of administration routes-----------------

//--------------End head of administration routes-----------------




//--------------purchasing manager routes-----------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified',
    'CheckPmRole'
])->group(function () {

});

Route::get('/pm/home' , function(){
    return view('PurchasingManager.PM-home');
})->name('pm.home');
// create new product
Route::post('/pm/newProduct', [ProductController::class, 'create'])->name('pm.newProduct');
//--------------End purchasing manager routes-----------------




//--------------store manager routes-----------------
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified',
    'CheckStoreManagerRole'
])->group(function () {

});

    //home route
    Route::get('/storeManager/home', [StoreManagerDashboardController::class, 'index'])->name('storeManager.home');

    //view requested items route
    Route::get('/view-requested-items', function () {
        return view('storeManager.view-rquest-item');
    });

    //store visit route
    Route::get('/visit-store', function () {
        return view('storeManager.store');
    });

    // Not returned items
    Route::get('/Store/Not-Returned_Items', function () {
        return view('storeManager.Not-Returned-items');
    });

    // store history view
    Route::get('/store/History', function () {
        return view('storeManager.history-store');
    });

    //view return items
    Route::get('/siba-store-view-return-items', function () {
    return view('storeManager.view-return-item');
});

//route to store page catagory table Item table catagory --> sub catagory
Route::get('/siba-store-item-by-catagory-table', function () {
    return view('storeManager.Item-by-catargory-page');
});

Route::get('/update-profile', function () {
    return view('publicComponent.profile');
});;

//low quentity product route
Route::get('/store/low-quentity', function () {
    return view('storeManager.low-quentity-product');
});;

//--------------End store manager routes-----------------

//-------------------------------------------------Department user------------------------------------------------

//home view route
Route::get('/user/home', [UserDashboardController::class, 'index'])->name('user.home');


//user update profile
// Route::get('user/update-profile' , function(){
//     return view('DepartmentUser.user-update-profile');
// });;

Route::get('user-update-profile', function () {
    return view('publicComponent.update-profile');
});

//view store
Route::get('/user/view-store', function () {
    return view('DepartmentUser.visit-store-user');
});

//-------------------------------------------------End Department user------------------------------------------------


//-------------------------------------------------Error pages------------------------------------------------

Route::get('/accountDeactivated', function () {
    return view('errors.accountDeactivated');
})->name('accountDeactivated');
//-------------------------------------------------End Error pages------------------------------------------------
