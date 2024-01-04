<?php
Route::domain(config('app.domain'))->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'AuthController@showLoginForm')->name('admin.login');
        Route::post('/login', 'AuthController@login')->name('login.login_auth');
        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
        Route::post('/task', 'Task@index')->name('task.index');
        Route::prefix('task')->group(function () {
        });
        Route::middleware('auth:admin')->group(function () {
            Route::prefix('task')->group(function () {
                Route::get('/', 'TaskController@index')->name('task.index');
                Route::get('/create', 'TaskController@create')->name('task.create');
                Route::post('/update', 'TaskController@update')->name('task.update');
            });
            Route::prefix('company')->group(function () {
                Route::get('/', 'CompaniesController@index')->name('company.index');
                //gate
                // Route::get('/', 'CompaniesController@index')->name('company.index')->middleware('can:manage_users');
                Route::get('/create', 'CompaniesController@create')->name('company.create');
                Route::post('/update', 'CompaniesController@update')->name('company.update');
                Route::get('/send-mail', 'CompaniesController@sendMail')->name('login.end-mail');
            });
            Route::prefix('upload')->group(function () {
                Route::get('/', 'UploadController@index')->name('upload.index');
                Route::post('/', 'UploadController@doUpload')->name('upload.doUpload');
            });
        });

        Route::prefix('administrators')->group(function () {

            Route::get('/', 'AdministratorsController@index')->name('administrators.index');
            Route::get('/search', 'AdministratorsController@search')->name('administrators.search');

            Route::get('/create', 'AdministratorsController@create')->name('administrators.create');
            Route::get('/{administratorId}', 'AdministratorsController@edit')->name('administrators.edit');
            Route::post('/update', 'AdministratorsController@update')->name('administrators.update');
            Route::post('/delete', 'AdministratorsController@delete')->name('administrators.delete');
        });
    });
});
