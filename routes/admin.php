<?php

    use App\Http\Controllers\dashboard\AdminController;
    use App\Http\Controllers\dashboard\AdminProductController;
    use App\Http\Controllers\dashboard\AdminServiceController;
    use App\Http\Controllers\dashboard\CategoryController;
    use App\Http\Controllers\dashboard\StaticPageController;
    use Illuminate\Support\Facades\Route;

    Route::prefix('admin')->group(function () {


        Route::group([
            'controller' => AdminProductController::class,
            'prefix' => 'products',
            'middleware' => 'auth:sanctum',
        ], function () {
            Route::get('/', 'index')->name('products.index');
            Route::get('/create', 'create')->name('products.create');
            Route::get('/edit/{id}', 'edit')->name('products.edit');
            Route::get('/show/{id}', 'show')->name('products.show');
            Route::post('/store', 'store')->name('products.store');
            Route::put('/update/{id}', 'update')->name('products.update');
            Route::delete('/destroy/{id}', 'destroy')->name('products.destroy');
        });


        Route::group([
            'controller' => AdminController::class,
        ], function () {
            Route::get('/login', 'signIn')->name('admin.signIn')->middleware('guest'); //show page login
            Route::post('/login', 'login')->name('admin.login')->middleware('guest');
            Route::get('/logout', 'logout')->name('admin.logout')->middleware('auth');
        });


        Route::group([
            'controller' => StaticPageController::class,
            'middleware' => 'auth:sanctum',
        ], function () {
            Route::get('/pages    ', 'index')->name('page.index');
            Route::get('/pages/show/{id}   ', 'show')->name('page.show');
            Route::get('/pages/edit/{id}   ', 'edit')->name('page.edit');
            Route::put('/pages/update/{id}   ', 'update')->name('page.update');
        });

        Route::group([
            'controller' => CategoryController::class,
            'middleware' => 'auth:sanctum',
        ], function () {
            Route::get('/categories    ', 'index')->name('category.index');
            Route::get('/categories/create', 'create')->name('category.create');
            Route::post('/categories/store', 'store')->name('category.store');
            Route::get('/categories/show/{id}', 'show')->name('category.show');
            Route::get('/categories/edit/{id}', 'edit')->name('category.edit');
            Route::put('/categories/update/{id}', 'update')->name('category.update');
            Route::delete('/categories/destroy/{id}', 'destroy')->name('category.destroy');
        });


        Route::group([
            'controller' => AdminServiceController::class,
            'prefix' => 'Services',
            'middleware' => 'auth:sanctum',
            'as'=>'services.'
        ], function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/store', 'store')->name('store');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/destroy/{id}', 'destroy')->name('destroy');
        });



    });
