<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Expensecategories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Incomecategories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Expensereports
    Route::apiResource('expense-reports', 'ExpenseReportApiController');

    // Players
    Route::apiResource('players', 'PlayerApiController');

    // Playerinvoices
    Route::apiResource('player-invoices', 'PlayerInvoiceApiController');

    // Trainers
    Route::apiResource('trainers', 'TrainerApiController');

    // Trainerinvoices
    Route::apiResource('trainer-invoices', 'TrainerInvoiceApiController');

    // Stadia
    Route::apiResource('stadia', 'StadiumApiController');
});
