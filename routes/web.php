<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ChildcategoryController;
use App\Http\Controllers\Admin\Offers\CouponController;
use App\Http\Controllers\Admin\PickupPointController;
use App\Http\Controllers\Admin\product\ProductController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SmtpController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Models\PickupPoint;
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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin-login', function () {
    return view('admin.login');
});

// Route::get('/admin/logout', function () {
//     return view('admin.logout');
// });
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/admin/dashboard')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        //CategoryController
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/categories', 'index')->name('category.index');
            Route::post('/categories', 'store')->name('category.store');
            Route::get('/category/destroy/{id}', 'destroy')->name('category.destroy');
            Route::get('/category/edit/{id}', 'edit');
            Route::post('/category/update', 'update')->name('category.update');
        });

        //SubcategoryController
        Route::controller(SubcategoryController::class)->group(function () {
            Route::get('/subcategories', 'index')->name('subcategory.index');
            Route::post('/subcategories/store', 'store')->name('subcategory.store');
            Route::get('/subcategory/destroy/{id}', 'destroy')->name('subcategory.destroy');
            Route::get('/subcategory/edit/{id}', 'edit')->name('subcategory.edit');
            Route::put('/subcategory/update', 'update')->name('subcategory.update');
        });

        //childcategorycontroller
        Route::controller(ChildcategoryController::class)->group(function () {
            Route::get('/childcategory', 'index')->name('childcategory.index');
            Route::post('/childcategory/store', 'store')->name('childcategory.store');
            Route::get('/childcategory/destroy/{id}', 'destroy')->name('childcategory.destroy');
            Route::get('/childcategory/edit/{id}', 'edit')->name('childcategory.edit');
            Route::post('/childcategory/update/{id}', 'update')->name('childcategory.update');
        });

        //brandController
        Route::controller(BrandController::class)->group(function () {
            Route::get('/brands', 'index')->name('brand.index');
            Route::post('/brand/store', 'store')->name('brand.store');
            Route::get('/brand/destroy/{id}', 'destroy')->name('brand.destroy');
            Route::get('/brand/edit/{id}', 'edit')->name('brand.edit');
            Route::post('/brand/update/{id}', 'update')->name('brand.update');
        });

        //warehouseController
        Route::controller(WarehouseController::class)->group(function () {
            Route::get('/warehouses', 'index')->name('warehouse.index');
            Route::post('/warehouse/store', 'store')->name('warehouse.store');
            Route::get('/warehouse/destroy/{id}', 'destroy')->name('warehouse.destroy');
            Route::get('/warehouse/edit/{id}', 'edit')->name('warehouse.edit');
            Route::post('/warehouse/update/{id}', 'update')->name('warehouse.update');
        });
        //PickupPointController
        Route::controller(PickupPointController::class)->group(function () {
            Route::get('/pickup-points', 'index')->name('pickup_points.index');
            Route::post('/pickup-point/store', 'store')->name('pickup_point.store');
            Route::get('/pickup-point/destroy/{id}', 'destroy')->name('pickup_point.destroy');
            Route::get('/pickup-point/edit/{id}', 'edit')->name('pickup_point.edit');
            Route::post('/pickup-point/update/{id}', 'update')->name('pickup_point.update');
        });

        Route::prefix('product')->group(function(){
            //ProductController
            Route::controller(ProductController::class)->group(function () {
                Route::get('/manage-products', 'index')->name('add_product.index');
                Route::get('/add-product', 'create')->name('add_product.create');
                Route::post('/product/store', 'store')->name('add_product.store');
                Route::get('/product/show/{id}', 'show')->name('add_product.show');
                Route::get('/product/destroy/{id}', 'destroy')->name('add_product.destroy');
                Route::get('/product/edit/{id}', 'edit')->name('add_product.edit');


                Route::get('/product/multiple-image/{id}', 'destroyThumbnail')->name('destroyThumbnail');


                Route::get('/product/fetch-subcategory/{id}', 'fetchSubcategory');
                Route::get('/product/fetch-childcategory/{id}', 'fetchChildcategory');

                Route::get('/product/update/fetch-subcategory/{id}', 'fetchUpdatedSubcategory');
                Route::get('/product/update/fetch-childcategory/{id}', 'fetchUpdatedChildcategory');
                // Route::get('/pickup-point/destroy/{id}', 'destroy')->name('pickup_point.destroy');
                // Route::get('/pickup-point/edit/{id}', 'edit')->name('pickup_point.edit');
                // Route::post('/pickup-point/update/{id}', 'update')->name('pickup_point.update');
            });
        });



        //settings
        Route::prefix('settings')->group(function () {
            //seoController
            Route::controller(SeoController::class)->group(function () {
                Route::get('/seo', 'create')->name('settings.seo.create');
                Route::post('/seo/store/{id}', 'store')->name('settings.seo.store');
            });
            //SmtpController
            Route::controller(SmtpController::class)->group(function () {
                Route::get('/smtp', 'create')->name('settings.smtp.create');
                Route::post('/smtp/store/{id}', 'store')->name('settings.smtp.store');
            });
            //WebsiteSettingController
            Route::controller(WebsiteSettingController::class)->group(function () {
                Route::get('/website-settings', 'create')->name('settings.website.create');
                Route::post('/website/store/{id}', 'store')->name('settings.website.store');
            });

        });

        //offers
        Route::prefix('offers')->group(function () {
            //CouponController
            Route::controller(CouponController::class)->group(function () {
                Route::get('/coupons', 'index')->name('offers.coupon.index');
                Route::post('/coupon/store', 'store')->name('offers.coupon.store');
                Route::get('/coupon/destroy/{id}', 'destroy')->name('offers.coupon.destroy');
                Route::get('/coupon/edit/{id}', 'edit')->name('offers.coupon.edit');
                Route::post('/coupon/update/{id}', 'update')->name('offers.coupon.update');
            });
        });







    });
});
