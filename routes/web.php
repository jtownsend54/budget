<?php

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

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('/budgets', 'BudgetController@index')->name('budgets');
Route::get('/budgets/create', 'BudgetController@create')->name('budget_create');
Route::get('/budgets/{budget}', 'BudgetController@show')->name('budget_show');
Route::post('/budgets', 'BudgetController@store')->name('budget_store');
Route::patch('/budgets/{budget}', 'BudgetController@update')->name('budget_update');

Route::get('/budget-categories', 'BudgetCategoriesController@index')->name('budget_categories');
Route::get('/budget-categories/create', 'BudgetCategoriesController@create')->name('budget_categories_create');
Route::get('/budget-categories/{budgetCategory}', 'BudgetCategoriesController@show')->name('budget_categories_show');
Route::post('/budget-categories', 'BudgetCategoriesController@store')->name('budget_categories_store');
Route::patch('/budget-categories/{budgetCategory}', 'BudgetCategoriesController@update')->name('budget_categories_update');

Route::get('/expenses', 'ExpensesController@index')->name('expenses');
Route::get('/expenses/{budgetAmount}/create', 'ExpensesController@create')->name('expense_create');
Route::get('/expenses/{expense}', 'ExpensesController@show')->name('expense_show');
Route::post('/expenses', 'ExpensesController@store')->name('expense_store');
Route::patch('/expenses/{expense}', 'ExpensesController@update')->name('expense_update');

Route::get('/incomes', 'IncomesController@index')->name('incomes');
Route::get('/incomes/{budget}/create', 'IncomesController@create')->name('income_create');
Route::get('/incomes/{income}', 'IncomesController@show')->name('income_show');
Route::post('/incomes', 'IncomesController@store')->name('income_store');
Route::patch('/incomes/{income}', 'IncomesController@update')->name('income_update');
