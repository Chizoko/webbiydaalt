<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get("student","App\Http\Controllers\studentController@list_student");
Route::get("student/{id}","App\Http\Controllers\studentController@get_student");
Route::get("search","App\Http\Controllers\studentController@search_student");
Route::post("search","App\Http\Controllers\studentController@search");
Route::get("account","App\Http\Controllers\accountController@index");
Route::get("account/{id}","App\Http\Controllers\\transactionController@list");
Route::get("transaction",function(){
    $title="Transacion";
    return view('transaction.transaction',["title"=>$title]);
});
Route::post("transaction","App\Http\Controllers\\transactionController@dotransaction");