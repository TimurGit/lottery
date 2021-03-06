<?php

use Illuminate\Http\Request;

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
Route::get('prize', 'Api\PrizeController@getPrize');
Route::get('transferToBankAccount', 'Api\PrizeController@transferToBankAccount');
Route::get('transferBonus', 'Api\PrizeController@transferBonus');
Route::get('subjectApply', 'Api\PrizeController@subjectApply');
Route::get('convertBonusToMoney', 'Api\PrizeController@convertBonusToMoney');
