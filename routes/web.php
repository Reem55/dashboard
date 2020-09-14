<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Expensecategories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Incomecategories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expensereports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    // Players
    Route::delete('players/destroy', 'PlayerController@massDestroy')->name('players.massDestroy');
    Route::resource('players', 'PlayerController');

    // Playerinvoices
    Route::delete('player-invoices/destroy', 'PlayerInvoiceController@massDestroy')->name('player-invoices.massDestroy');
    Route::resource('player-invoices', 'PlayerInvoiceController');

    // Trainers
    Route::delete('trainers/destroy', 'TrainerController@massDestroy')->name('trainers.massDestroy');
    Route::resource('trainers', 'TrainerController');

    // Trainerinvoices
    Route::delete('trainer-invoices/destroy', 'TrainerInvoiceController@massDestroy')->name('trainer-invoices.massDestroy');
    Route::resource('trainer-invoices', 'TrainerInvoiceController');

    // Stadia
    Route::delete('stadia/destroy', 'StadiumController@massDestroy')->name('stadia.massDestroy');
    Route::resource('stadia', 'StadiumController');

    // Products
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

      // ProductConsumptions
    Route::delete('product-consumptions/destroy', 'ProductConsumptionController@massDestroy')->name('product-consumptions.massDestroy');
    Route::resource('product-consumptions', 'ProductConsumptionController');

    // Stock Sorting

    Route::resource('stockssorting', 'StocksortingController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');

    Route::delete('products/conversations', 'ConversationController@massDestroy')->name('conversations.massDestroy');
    Route::resource('conversations', 'ConversationController');

    Route::post('conversations/{id}/message', 'ConversationMessageController@store')->name('conversation-messages.store');


});

