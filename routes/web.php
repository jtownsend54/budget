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
Route::patch('/budgets/{budget}', 'BudgetController@patch')->name('budget_patch');
