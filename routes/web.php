<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

//Route::get('/', function () {
//    return redirect(\route('home-page'));
////    return view('welcome');
//});

Route::get('resources/{directory}/{fileName}', [Controllers\Resources\ResourceController::class, 'GetResources']);

Route::group(['prefix' => '/'], function() {

    Route::get('/', [Controllers\HomeController::class, 'Index'])
//        ->middleware('permissions:home-page,index')
        ->name('home-page');

    Route::get('/about', [Controllers\HomeController::class, 'About'])
        ->name('about-page');

    Route::get('/contacts', [Controllers\HomeController::class, 'Contacts'])
        ->name('contacts-page');
});

Route::group(['prefix' => 'auth'], function() {

    Route::group(['prefix' => 'registration'], function() {

        Route::get('/', [Controllers\Authorization\AuthorizationController::class, 'RegistrationPage'])
            ->name('registration-page');

        Route::post('/', [Controllers\Authorization\AuthorizationController::class, 'Registration'])
            ->name('registration');
    });

    Route::group(['prefix' => 'login'], function() {

        Route::get('/', [Controllers\Authorization\AuthorizationController::class, 'LoginPage'])
            ->name('login-page');

        Route::post('/', [Controllers\Authorization\AuthorizationController::class, 'Login'])
            ->name('login');
    });

    Route::group(['prefix' => 'logout'], function() {

        Route::get('/', [Controllers\Authorization\AuthorizationController::class, 'Logout'])
            ->name('logout');
    });

    Route::group(['prefix' => 'password-recovery'], function() {

        Route::get('/', [Controllers\Authorization\AuthorizationController::class, 'PasswordRecoveryPage'])
            ->name('password-recovery-page');
    });


});

Route::group(['prefix' => 'profile'], function() {

//    Route::get('/', [Controllers\Profile\ProfileController::class, 'ProfilePage'])
//        ->name('profile-page');

    Route::get('/orders', [Controllers\Profile\ProfileController::class, 'UserOrdersPage'])
        ->name('user-orders-page');

    Route::group(['prefix' => 'order'], function() {
        Route::get('/{order_id}', [Controllers\Profile\ProfileController::class, 'UserOrderPage'])
            ->name('user-order-page');
    });

    Route::group(['prefix' => 'setting'], function() {

        Route::get('/', [Controllers\Profile\ProfileController::class, 'UserSettingsPage'])
            ->name('user-settings-page');

        Route::post('/change-detail-information', [Controllers\Profile\ProfileController::class, 'ChangeDetailInformation'])
            ->name('change-detail-information');
    });

});

Route::group(['prefix' => 'admin'], function() {

    Route::get('/', [Controllers\Administration\AdministrationController::class, 'AdminHomePage'])
        ->name('admin-home-page');

    Route::post('/login', [Controllers\Administration\AdministrationController::class, 'AdminLogin'])
        ->name('admin-login');

    Route::get('/logout', [Controllers\Administration\AdministrationController::class, 'AdminLogout'])
        ->name('admin-logout');

    Route::group(['prefix' => 'properties-categories'], function() {

        Route::get('/', [Controllers\PropertiesCategories\PropertiesCategoriesController::class, 'PropertiesCategoriesAdminPage'])
            ->name('properties-categories-admin-page');

        Route::get('/create', [Controllers\PropertiesCategories\PropertiesCategoriesController::class, 'CreatePropertyCategoriesAdminPage'])
            ->name('create-property-categories-admin-page');

        Route::get('/edit/{property_categories_id}', [Controllers\PropertiesCategories\PropertiesCategoriesController::class, 'EditPropertyCategoriesAdminPage'])
            ->name('edit-property-categories-admin-page');

        Route::post('/save', [Controllers\PropertiesCategories\PropertiesCategoriesController::class, 'SavePropertyCategories'])
            ->name('save-property-categories-admin');

        Route::post('/delete', [Controllers\PropertiesCategories\PropertiesCategoriesController::class, 'DeletePropertyCategories'])
            ->name('delete-property-categories-admin');
    });

    Route::group(['prefix' => 'categories'], function() {

        Route::get('/', [Controllers\Categories\CategoriesController::class, 'CategoriesAdminPage'])
            ->name('categories-admin-page');

        Route::get('/create', [Controllers\Categories\CategoriesController::class, 'CreateCategoryAdminPage'])
            ->name('create-category-admin-page');

        Route::get('/edit/{category_id}', [Controllers\Categories\CategoriesController::class, 'EditCategoryAdminPage'])
            ->name('edit-category-admin-page');

        Route::post('/save', [Controllers\Categories\CategoriesController::class, 'SaveCategory'])
            ->name('save-category-admin');

        Route::post('/delete', [Controllers\Categories\CategoriesController::class, 'DeleteCategory'])
            ->name('delete-category-admin');
    });

    Route::group(['prefix' => 'subcategories'], function() {

        Route::get('/', [Controllers\Subcategories\SubcategoriesController::class, 'SubcategoriesAdminPage'])
            ->name('subcategories-admin-page');

        Route::get('/create', [Controllers\Subcategories\SubcategoriesController::class, 'CreateSubcategoryAdminPage'])
            ->name('create-subcategory-admin-page');

        Route::get('/edit/{subcategory_id}', [Controllers\Subcategories\SubcategoriesController::class, 'EditSubcategoryAdminPage'])
            ->name('edit-subcategory-admin-page');

        Route::post('/save', [Controllers\Subcategories\SubcategoriesController::class, 'SaveSubcategory'])
            ->name('save-subcategory-admin');

        Route::post('/delete', [Controllers\Subcategories\SubcategoriesController::class, 'DeleteSubcategory'])
            ->name('delete-subcategory-admin');
    });

    Route::group(['prefix' => 'products'], function() {

        Route::get('/', [Controllers\Products\ProductsController::class, 'ProductsAdminPage'])
            ->name('products-admin-page');

        Route::get('/create', [Controllers\Products\ProductsController::class, 'CreateProductAdminPage'])
            ->name('create-product-admin-page');

        Route::get('/edit/{product_id}', [Controllers\Products\ProductsController::class, 'EditProductAdminPage'])
            ->name('edit-product-admin-page');

        Route::post('/save', [Controllers\Products\ProductsController::class, 'SaveProduct'])
            ->name('save-product-admin');

        Route::post('/delete', [Controllers\Products\ProductsController::class, 'DeleteProduct'])
            ->name('delete-product-admin');
    });

    Route::group(['prefix' => 'reference-book'], function() {

        Route::get('/', [Controllers\ReferenceBooks\ReferenceBooksController::class, 'ReferenceBooksAdminPage'])
            ->name('reference-books-admin-page');

        Route::get('/create', [Controllers\ReferenceBooks\ReferenceBooksController::class, 'CreateReferenceBookAdminPage'])
            ->name('create-reference-book-admin-page');

        Route::get('/edit/{reference_book_id}', [Controllers\ReferenceBooks\ReferenceBooksController::class, 'EditReferenceBookAdminPage'])
            ->name('edit-reference-book-admin-page');

        Route::post('/save', [Controllers\ReferenceBooks\ReferenceBooksController::class, 'SaveReferenceBook'])
            ->name('save-reference-book-admin');

        Route::post('/delete', [Controllers\ReferenceBooks\ReferenceBooksController::class, 'DeleteReferenceBook'])
            ->name('delete-reference-book-admin');
    });

    Route::group(['prefix' => 'settings'], function() {

        Route::get('/', [Controllers\Administration\SettingsController::class, 'EditPhonePage'])
            ->name('edit-phone-page');
        Route::post('/', [Controllers\Administration\SettingsController::class, 'SavePhone'])
            ->name('save-phone');

        Route::group(['prefix' => 'carousel'], function() {

            Route::get('/all-carousel-images', [Controllers\Administration\SettingsController::class, 'AllCarouselImagesPage'])
                ->name('all-carousel-images-page');

            Route::get('/create-carousel-image', [Controllers\Administration\SettingsController::class, 'CreateCarouselImagePage'])
                ->name('create-carousel-image-page');

            Route::get('/edit-carousel-image/{carouselImageId}', [Controllers\Administration\SettingsController::class, 'EditCarouselImagePage'])
                ->name('edit-carousel-image-page');

            Route::post('/save-carousel-image', [Controllers\Administration\SettingsController::class, 'SaveCarouselImage'])
                ->name('save-carousel-image-page');

        });

    });
});

Route::group(['prefix' => 'management'], function() {

    Route::get('/', [Controllers\Management\ManagementController::class, 'ManagementHomePage'])
        ->name('management-home-page');

    Route::post('/login', [Controllers\Management\ManagementController::class, 'ManagementLogin'])
        ->name('management-login');

    Route::get('/logout', [Controllers\Management\ManagementController::class, 'ManagementLogout'])
        ->name('management-logout');

    Route::group(['prefix' => 'orders'], function() {

        Route::get('/', [Controllers\Orders\OrdersController::class, 'OrdersManagementPage'])
            ->name('orders-management-page');

        Route::get('/detail-order/{order_id}', [Controllers\Orders\OrdersController::class, 'DetailOrdersManagementPage'])
            ->name('detail-order-management-page');

        Route::post('/change-order-properties-management/{order_id}', [Controllers\Orders\OrdersController::class, 'ChangeOrderProperties'])
            ->name('change-order-properties-management');

        Route::post('/change-count-product-in-order-management/{order_id}', [Controllers\Orders\OrdersController::class, 'ChangeCountProductInOrder'])
            ->name('change-count-product-in-order-management');

    });

});

Route::group(['prefix' => 'test'], function() {

    Route::get('/', [Controllers\TestController::class, 'index'])
        ->name('test');

    Route::get('/mail-test', function (){
        \Illuminate\Support\Facades\Mail::to('s-vesel94@ya.ru')->send(new \App\Helpers\MailSender());
    });

});

Route::group(['prefix' => 'files'], function() {

    Route::get('/{file_id}', [\App\Helpers\Files::class, 'GetFile'])
        ->name('files');

});

Route::group(['prefix' => 'catalog'], function() {

    Route::get('/{category_semantic_url}', [App\Http\Controllers\Categories\CategoriesController::class, 'CategoryPage'])
//        ->middleware('permissions:home-page,index')
        ->name('category');

    Route::get('/{category_semantic_url}/{subcategory_semantic_url}', [Controllers\Subcategories\SubcategoriesController::class, 'SubcategoryPage'])
//        ->middleware('permissions:home-page,index')
        ->name('subcategory');

    Route::get('/{category_semantic_url}/{subcategory_semantic_url}/{product_semantic_url}', [App\Http\Controllers\Products\ProductsController::class, 'ProductPage'])
//        ->middleware('permissions:home-page,index')
        ->name('product');
});

Route::group(['prefix' => 'basket'], function() {
    Route::get('/', [Controllers\Basket\BasketController::class, 'BasketPage'])
//        ->middleware('permissions:home-page,index')
        ->name('basket-page');

    Route::post('/update-count-products', [Controllers\Basket\BasketController::class, 'UpdateCountProducts'])
//        ->middleware('permissions:home-page,index')
        ->name('update-count-products');
});

Route::group(['prefix' => 'orders'], function() {
    Route::post('/', [Controllers\Orders\OrdersController::class, 'CreateOrder'])
//        ->middleware('permissions:home-page,index')
        ->name('create-order');
});


