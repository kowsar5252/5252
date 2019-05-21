<?php
Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('membership/check', 'CaptchaController@membershipCheck')->name('membershipCheck');
Route::post('store-captcha-form', 'CaptchaController@storeCaptchaForm');

Auth::routes();
Route::post('user/getIslands', 'FrontEndController@getIslands');
Route::post('user/getAdress', 'FrontEndController@getAdress');

Route::post('edit/user/getIslands', 'FrontEndController@getIslands');
Route::post('edit/user/getAdress', 'FrontEndController@getAdress');

Route::post('manager/data', 'ManagerController@getdata');
Route::post('manager/all/data', 'ManagerController@getAllData');



Route::get('edit/{nid}', 'ManagerController@editRequest')->middleware('auth');
Route::post('edit/request/insert', 'ManagerController@editRequestInsert');



Route::post('user/edit/role/user/getIslands', 'RolesettingController@getIslands');
Route::post('user/edit/role/user/getAdress', 'RolesettingController@getAdress');
Route::post('user/edit/role/user/getConstitution', 'RolesettingController@getConstitution');
Route::get('search', 'SearchController@fetch_data')->middleware('auth');
Route::get('search/phone', 'SearchController@searchPhone')->middleware('auth');
Route::get('search/nid', 'SearchController@searchnid')->middleware('auth');

Route::get('short/data', 'SearchController@shortData')->middleware('auth');
Route::get('unshort/data', 'SearchController@unshortData')->middleware('auth');
Route::get('name/short/data', 'SearchController@nameshortData')->middleware('auth');
Route::get('name/unshort/data', 'SearchController@nameunshortData')->middleware('auth');
Route::get('bd/short/data', 'SearchController@bdshortData')->middleware('auth');
Route::get('bd/unshort/data', 'SearchController@bdunshortData')->middleware('auth');
Route::get('address/short/data', 'SearchController@addressshortData')->middleware('auth');
Route::get('address/unshort/data', 'SearchController@addressunshortData')->middleware('auth');
Route::get('status/short/data', 'SearchController@statusshortData')->middleware('auth');
Route::get('status/unshort/data', 'SearchController@statusunshortData')->middleware('auth');

Route::post('/user/add/role', 'FrontEndController@addRole');
Route::post('user/addArea', 'RolesettingController@addArea');
Route::post('user/role/add', 'RolesettingController@add_role')->name('add_role');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','role');
Route::get('/user/role/setting', 'HomeController@roleSetting')->name('roleSetting')->middleware('auth','role');
Route::get('/user/recyclebin', 'HomeController@recycleBin')->name('recycleBin')->middleware('auth','role');

Route::get('/manager/dashboard', 'ManagerController@index')->middleware('auth');
Route::get('/manager/membership', 'ManagerController@membership')->middleware('auth');

Route::get('user/edit/role/{id}', 'RolesettingController@editRole')->middleware('auth');
Route::get('delete/role/{id}', 'RolesettingController@deleteRole')->middleware('auth');


Route::get('user/active/{id}', 'FrontEndController@userActive')->middleware('auth');
Route::get('user/delete/{id}', 'FrontEndController@userDelete')->middleware('auth');

Route::get('user/restore/{id}', 'FrontEndController@userRestore')->middleware('auth');
Route::get('user/destroy/{id}', 'FrontEndController@userDestroy')->middleware('auth');

Route::get('member/update/request', 'UpdateController@memberUpdateRequest')->middleware('auth');
Route::get('update/request/accept/{id}', 'UpdateController@UpdateRequestAccept')->middleware('auth');
Route::get('update/request/cancel/{id}', 'UpdateController@UpdateRequestCancel')->middleware('auth');
Route::post('edit/request/insert/confirm', 'UpdateController@UpdateRequestAcceptConfirm')->middleware('auth');

Route::get('email/change/{id}', 'HomeController@emailChange')->middleware('auth');
Route::get('password/change/{id}', 'HomeController@passwordChange')->middleware('auth');
Route::post('change/email/insert', 'HomeController@emailInsert')->middleware('auth');
Route::post('change/password/insert', 'HomeController@passwordInsert')->middleware('auth');
