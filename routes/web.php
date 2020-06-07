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

Route::get('home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'Lang'], function () {

    // Route::get('login', 'admin\DashboardController@login');
    Route::post('login', 'admin\AdminLoginController@login')->name('admin-login');

    Route::post('reset/password', 'DashboardController@reset_password');
    Route::get('password/reset/{token}', 'DashboardController@reset_password_final');
    Route::post('password/reset/{token}', 'DashboardController@reset_password_change');
    // in auth
    Route::group(['middleware' => 'admin:admin'], function () {
        Route::get('/home', 'admin\DashboardController@home')->name('dashboard');
        // Route::get('/Client', 'admin\DashboardController@Client');
        Route::resource('service', 'ServiceController');
        Route::resource('admin', 'AdminController');
        Route::resource('client', 'ClientController');
        Route::get('clientSearch', 'ClientController@search')->name('clientSearchIndex');
        Route::resource('car', 'CarController');
        Route::resource('note', 'BillNoteController');

        Route::get('carSearch', 'CarController@carSearch')->name('car.carSearch');

        Route::resource('brand', 'CarBrandController');
        Route::resource('brandCategory', 'CarBrandCategoryController');
        Route::resource('carType', 'CarTypeController');
        Route::resource('/group', 'GroupController');
        Route::resource('/account', 'AccountController');
        Route::resource('expense', 'ExpenseController');
        Route::get('expenseReport', 'ExpenseReportController@index')->name('expenseReport');
        Route::get('expenseSearch', 'ExpenseReportController@search')->name('expenseSearch');
        Route::get('expenseTaxReport', 'ExpenseTaxReportController@index')->name('expenseTaxReport');
        Route::get('expenseTaxSearch', 'ExpenseTaxReportController@search')->name('expenseTaxSearch');
        Route::get('car/create/{clientid}', 'CarController@createCar')->name('car.createCar');
        Route::get('repairCard/create/{cid}', 'ReprairCardController@createRepairCardFromClient')->name('repairCard.createRepairCard');
        Route::get('addServiceItem/{sid}', 'ReprairCardController@addServiceItem')->name('repairCard.addServiceItem');
        Route::post('storeServiceItem/{cardid}', 'ReprairCardController@storeServiceItem')->name('repairCard.storeServiceItem');

        //Invoice Report
        Route::get('invoiceContractReport', 'InvoiceReportController@index')->name('invoiceContractReport');
        Route::get('invoiceContractSearch', 'InvoiceReportController@search')->name('invoiceContractSearch');

        Route::get('invoiceNoneContractReport', 'InvoiceReportController@indexNoneContract')->name('invoiceNoneContractReport');
        Route::get('invoiceNoneContractSearch', 'InvoiceReportController@searchNoneContract')->name('invoiceNoneContractSearch');

        //Income Report
        Route::get('incomeContractReport', 'IncomeReportController@index')->name('incomeContractReport');
        Route::get('incomeContractSearch', 'IncomeReportController@search')->name('incomeContractSearch');

        Route::get('incomeNoneContractReport', 'IncomeReportController@indexNoneContract')->name('incomeNoneContractReport');
        Route::get('incomeNoneContractSearch', 'IncomeReportController@searchNoneContract')->name('incomeNoneContractSearch');


        Route::post('get_catagray', 'CarController@get_catagray')->name('get_catagray');
        Route::post('get_car', 'ReprairCardController@getCars')->name('getCars');
        Route::post('getServices', 'ReprairCardController@getServices')->name('getServices');
        Route::post('getPrice', 'ReprairCardController@getPrice')->name('getPrice');

        Route::get('print/{id}', 'AccountController@print')->name('print');
        route::get('clientDetails/{id}', 'ClientController@clientDetails');
        Route::resource('permission', 'AdminGroupController');
        Route::resource('company', 'CompanyController');
        Route::resource('carCategory', 'carCategoryController');
        Route::resource('Accounting', 'AccountController');
        Route::resource('carType', 'CarTypeController');
        Route::resource('reprairCard', 'ReprairCardController');
        Route::get('approved/{id}', 'ReprairCardController@approved')->name('approved');
        Route::get('denied/{id}', 'ReprairCardController@denied')->name('denied');
        Route::get('ClientReport', 'ReprairCardController@ClientReport')->name('ClientReport');
        Route::get('ClientSearch', 'ReprairCardController@clientSearch')->name('clientSearch');
        Route::get('cardTaxesReport', 'ReprairCardController@cardTaxesReport')->name('cardTaxesReport');
        Route::get('cardTaxesSearch', 'ReprairCardController@cardTaxesSearch')->name('cardTaxesSearch');
        Route::post('accept', 'ReprairCardController@accept')->name('accept');
        Route::post('money', 'ReprairCardController@money')->name('money');
        Route::get('confirm/{id}', 'AccountController@confirm')->name('confirm');
        Route::get('cardSearch', 'ReprairCardController@cardSearch')->name('cardSearch');


        Route::get('/createAdmin', 'admin\DashboardController@createAdmin');
        Route::any('logout', 'admin\AdminLoginController@logout');
        //Reports Routea

        Route::get('invoice/create/{cardId}', 'ReprairCardController@createInvoice')->name('createInvoice');
        Route::get('receipt/{Id}', 'ReprairCardController@receiptInvoicePayment')->name('receiptInvoicePayment');

        Route::get('operationOrder', 'OperationOrderController@index')->name('operationOrder.index');
        Route::get('operationOrder/{oid}', 'OperationOrderController@show')->name('operationOrder.show');
        Route::get('operationOrderNoneContract', 'OperationOrderController@indexNoneContract')->name('operationOrder.indexNoneContract');
        Route::get('operationOrderSearch', 'OperationOrderController@operationSearchIndex')->name('operationOrder.operationSearchIndex');
        Route::get('operationSearchNoneContractIndex', 'OperationOrderController@operationSearchNoneContractIndex')->name('operationOrder.operationSearchNoneContractIndex');



        Route::get('invoice', 'ReprairCardController@invoiceIndex')->name('invoiceIndex');
        Route::get('invoiceShow/{invId}', 'ReprairCardController@invoiceShow')->name('invoiceShow');
        Route::get('invoiceNoneContract', 'ReprairCardController@invoiceIndexNoneContract')->name('invoiceIndexNoneContract');



        Route::get('invoicePayment/{invId}', 'ReprairCardController@invoicePayment')->name('invoicePayment');
        Route::post('invoicePayment', 'ReprairCardController@paymentStore')->name('payment.store');
        Route::resource('customInvoice', 'CustomInvoiceController');

        Route::get('noneContractClient/create', 'ClientController@createNoneContractClient')->name('noneContractClient.createNoneContractClient');
        Route::post('noneContractClient', 'ClientController@storeNoneContractClient')->name('noneContractClient.storeNoneContractClient');
        Route::get('noneContractClient', 'ClientController@indexNoneContract')->name('noneContractClient.indexNoneContract');

        Route::get('noneContractClient/{cid}/edit', 'ClientController@editNoneContractClient')->name('noneContractClient.editNoneContractClient');
        Route::put('noneContractClient/{cid}', 'ClientController@updateNoneContractClient')->name('noneContractClient.updateNoneContractClient');
        Route::resource('technicalEmployee', 'TechnicalEmployeeController');
        Route::resource('companyDetails', 'CompanyDetailsController');
        Route::resource('cardTaxes', 'CardTaxesController');
    });
});
