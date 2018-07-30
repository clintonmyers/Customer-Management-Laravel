<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('customers', 'CustomerController@show')->middleware('auth.basic');
Route::put('customers/add/{customer}', 'CustomerController@add')->middleware('auth.basic');
Route::put('customers/remove/{index}', 'CustomerController@remove')->middleware('auth.basic');

// Route::put('customers', function(Request $request, $id) {
//     $article = Article::findOrFail($id);
//     $article->update($request->all());

//     return $article;
// });