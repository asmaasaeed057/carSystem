<?php

// lang functions
Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : "";
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});

Route::get('/', function () {
    if (auth('admin')->check()) {
        return redirect('admin/home');
    } else {
        return redirect('/login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'Lang'], function () {

    // Route::get('login', 'admin\DashboardController@login');
    Route::post('login', 'admin\AdminLoginController@login')->name('admin-login');

    Route::post('reset/password', 'DashboardController@reset_password');
    Route::get('password/reset/{token}', 'DashboardController@reset_password_final');
    Route::post('password/reset/{token}', 'DashboardController@reset_password_change');
    // in auth
    Route::group(['middleware' => 'admin:admin'], function () {
        Route::get('/home', 'admin\DashboardController@home');
        // Route::get('/Client', 'admin\DashboardController@Client');
        Route::resource('admin', 'AdminController');
        Route::resource('client', 'ClientController');
        Route::resource('service', 'ServiceController');
        Route::resource('car', 'carController');
        Route::post('get_catagray', 'carController@get_catagray')->name('get_catagray');
        Route::post('get_car', 'ReprairCardController@get_car')->name('get_car');
        Route::get('newitem', 'ReprairCardController@newitem')->name('newitem');
        Route::get('print/{id}', 'AccountController@print')->name('print');
        route::get('clientDetails/{id}', 'ClientController@clientDetails');
        Route::resource('car', 'carController');
        Route::resource('permission', 'AdminGroupController');
        Route::resource('company', 'CompanyController');
        Route::resource('carCatogray', 'carCatograyController');
        Route::resource('Accounting', 'AccountController');
        Route::resource('carType', 'CarTypeController');
        Route::resource('cost', 'costController');
        Route::resource('reprairCard', 'ReprairCardController');
        Route::get('approved/{id}', 'ReprairCardController@approved')->name('approved');
        Route::post('accept', 'ReprairCardController@accept')->name('accept');
        Route::post('money', 'ReprairCardController@money')->name('money');
        Route::get('confirm/{id}', 'AccountController@confirm')->name('confirm');
        Route::resource('box', 'BoxController');

        Route::get('/createAdmin', 'admin\DashboardController@createAdmin');
        Route::any('logout', 'admin\AdminLoginController@logout');
        //Reports Routea
        Route::get('FilterClients', 'reportController@FilterClients');
        Route::get('FilterIncome', 'reportController@FilterIncome');
    });
});
