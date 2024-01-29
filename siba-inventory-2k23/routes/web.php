<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestsController;
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
//pm home
Route::get('/pm/home', function () {
    return view('PurchasingManager.PM-home');
})->name('pm.home');
// Route::get('/pm/home', function () {
//     return view('PurchasingManager.PM-home');
// })->name('pm.addNewProduct');

// create new product
Route::post('/pm/newProduct', [ProductController::class, 'create'])->name('pm.newProduct');
//route to fetch all product data
Route::get('/systemAdmin/home/fetchAllProductData', [ProductController::class, 'fetchAllProductData'])->name('fetchAllProductData');
//route to edit product data
Route::get('/pm/Product/edit', [ProductController::class, 'edit'])->name('product.edit');
//route to update product data
Route::post('/pm/Product/update', [ProductController::class, 'update'])->name
('product.update');
// route to get all product details
Route::get('/products/fetch', [ProductController::class, 'fetchProducts'])->name('products.fetch');
//route to fetch all product data for store
Route::get('/products/fetchProductDetails', [ProductController::class, 'fetchProductDetails'])->name('fetchProductDetails');


//category view
//category create
// category edit PENDING
// route to get all category details
Route::get('/categories/fetch', [CategoryController::class, 'fetchCategories'])->name('categories.fetch');


//view to add new brand
Route::get('/pm/addNewBrand', function () {
    return view('PurchasingManager.add-new-brand');
})->name('pm.brand');
// create new brand
Route::post('/pm/newBrand', [BrandController::class, 'create'])->name('pm.newBrand');
//route to fetch all brand data
Route::get('/pm/home/fetchAllBrandData', [BrandController::class, 'fetchAllBrandData'])->name('fetchAllBrandData');
//route to edit brand data
Route::get('/pm/Brand/edit', [BrandController::class, 'edit'])->name('brand.edit');
//route to update brand data
Route::post('/pm/Brand/update', [BrandController::class, 'update'])->name('brand.update');
// route to get all brand details
Route::get('/brands/fetch', [BrandController::class, 'fetchBrands'])->name('brands.fetch');

//view to add new item
Route::get('/pm/addNewItem', function () {
    return view('PurchasingManager.add-new-item');
})->name('pm.item');
// create new item
Route::post('/pm/newItem', [ItemsController::class, 'create'])->name('pm.newItem');
//route to fetch all item data ( Not for users)
Route::get('/pm/home/fetchAllItemData', [ItemsController::class, 'fetchAllItemData'])->name('fetchAllItemData');
//route to fetch all item data ( Only for users)
Route::get('/user/home/fetchAllItemData', [ItemsController::class, 'fetchAllItemDataUser'])->name('fetchAllItemDataUser');
//route to edit product data
Route::get('/pm/Item/edit', [ItemsController::class, 'edit'])->name('item.edit');
//route to update item data
Route::post('/pm/Item/update', [ItemsController::class, 'update'])->name('item.update');

// Route::get('/pm/addNewProduct', function () {
//     return view('PurchasingManager.add-new-product');
// });

Route::get('/pm/ViewRequestedItems', function () {
    return view('PurchasingManager.Requested-Items');
});

Route::get('/pm/viewProducts', function () {
    return view('PurchasingManager.View-products');
});

Route::get('/pm/chech/storeRecords', function () {
    return view('PurchasingManager.Store-Check-Record');
});

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

//view requested items by users
Route::get('/storeManager/view-requested-items', function () {
    return view('storeManager.view-rquest-item');
})->name('storeManager.requests');
//route to fetch all request data
Route::get('/storeManager/fetchAllRequestData', [RequestsController::class, 'fetchAllRequestData'])->name('fetchAllRequestData');
//route to change the status of a request
Route::post('/storeManager/processRequest', [RequestsController::class, 'RequestAction'])->name('RequestAction');






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
//requested item table view
Route::get('/dUser/RequestItemTableView', function(){
    return view('DepartmentUser.storereqtable');
});

//route to make request
Route::post('/user/newRequest', [RequestsController::class, 'create'])->name('request.create');


//-------------------------------------------------End Department user------------------------------------------------






//-------------------------------------------------Error pages------------------------------------------------

Route::get('/accountDeactivated', function () {
    return view('errors.accountDeactivated');
})->name('accountDeactivated');
//-------------------------------------------------End Error pages------------------------------------------------





// -------------------------------------------human resource---------------------------------------------------------
// meka athle route hadann epaaa---------------------

Route::get('/HR-Home' , function(){
    return view('HumanResource.HR-Cleark.HRC-Home');
});

Route::get('/HR-AddNewEMP' , function(){
    return view('HumanResource.AddNewEMP');
});

///////////////////
Route::get('/categot/{category_id}', 'ProductController@showItemsByCategory')->name('itemsByCategory');
///////////////////





// ---------------------------------------------------------------end of human resource---------------------------------------------------/
