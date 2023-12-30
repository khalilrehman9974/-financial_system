<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartOfAccountController;
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

require_once 'theme-routes.php';

Route::get('/barebone', function () {
    return view('pages/user/profile', ['title' => 'This is Title']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

    //Company routes
    Route::group(['prefix' => 'chart-of-account'], function () {
        // Route::get('list', ['as' => 'chart-of-account.list', 'uses' => 'CompaniesController@index']);
        Route::get('create', ['as' => 'chart-of-account.create', 'uses' => 'App\Http\Controllers\ChartOfAccountController@create']);
        Route::post('save', ['as' => 'chart-of-account.save', 'uses' => 'App\Http\Controllers\ChartOfAccountController@store']);
        // Route::get('edit/{id}', ['as' => 'chart-of-account.edit', 'uses' => 'CompaniesController@edit']);
        // Route::post('update', ['as' => 'chart-of-account.update', 'uses' => 'CompaniesController@update']);
        // Route::delete('delete/{id}', ['as' => 'chart-of-account.delete', 'uses' => 'CompaniesController@destroy']);
        // Route::post('show/{id}', ['as' => 'chart-of-account.show', 'uses' => 'CompaniesController@show']);
        // Route::get('search', ['as' => 'chart-of-account.search', 'uses' => 'CompaniesController@search']);

    });

    Route::group(['prefix' => 'mainHead', 'middleware' => 'auth'], function () {
        Route::get('list', ['as' => 'mainHead.list', 'uses' => 'App\Http\Controllers\CoaMainHeadController@index']);
        Route::get('create', ['as' => 'mainHead.create', 'uses' => 'App\Http\Controllers\CoaMainHeadController@create']);
        Route::post('save', ['as' => 'mainHead.save', 'uses' => 'App\Http\Controllers\CoaMainHeadController@store']);
        Route::get('edit/{id}', ['as' => 'mainHead.edit', 'uses' => 'App\Http\Controllers\CoaMainHeadController@edit']);
        Route::post('update', ['as' => 'mainHead.update', 'uses' => 'App\Http\Controllers\CoaMainHeadController@store']);
        Route::get('delete', ['as' => 'mainHead.delete', 'uses' => 'App\Http\Controllers\CoaMainHeadController@destroy']);
        Route::post('show/{id}', ['as' => 'mainHead.show', 'uses' => 'App\Http\Controllers\CoaMainHeadController@show']);
        Route::get('search', ['as' => 'mainHead.search', 'uses' => 'App\Http\Controllers\CoaMainHeadController@search']);
    });

     //Store issue note
     Route::group(['prefix' => 'store-issue-note'], function () {
        Route::get('list', ['as' => 'store-issue-note.list', 'uses' => 'App\Http\Controllers\StoreIssueNoteController@index']);
        Route::get('create', ['as' => 'store-issue-note.create', 'uses' => 'App\Http\Controllers\StoreIssueNoteController@create']);
        Route::post('save', ['as' => 'store-issue-note.save', 'uses' => 'App\Http\Controllers\StoreIssueNoteController@store']);
        // Route::get('edit/{id}', ['as' => 'chart-of-account.edit', 'uses' => 'CompaniesController@edit']);
        // Route::post('update', ['as' => 'chart-of-account.update', 'uses' => 'CompaniesController@update']);
        // Route::delete('delete/{id}', ['as' => 'chart-of-account.delete', 'uses' => 'CompaniesController@destroy']);
        // Route::post('show/{id}', ['as' => 'chart-of-account.show', 'uses' => 'CompaniesController@show']);
        // Route::get('search', ['as' => 'chart-of-account.search', 'uses' => 'CompaniesController@search']);

    });

});
