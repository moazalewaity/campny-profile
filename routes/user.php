<?php 
Route::get('/user/registerfromarray','RegistartionController@regFromArray')->middleware('user:user.user_add');
Route::get('/get_user_fromold','RegistartionController@get_user_fromold');
Route::get('/download','RegistartionController@download');
Route::get('/user/register','RegistartionController@register')->middleware('user:user.user_add');

Route::post('/user/register','RegistartionController@postRegister')->middleware('user:user.user_add');
Route::get('/user/user_list','RegistartionController@users_list')->middleware('user:user.user_list');
Route::get('/user/user_remove_list','RegistartionController@users_remove_list')->middleware('user:user.user_list');
Route::get('/user/user_list/changestatus/{id}/{status}','RegistartionController@changestatus')->middleware('user:user.user_add');
Route::get('/user/users_list_data','RegistartionController@users_list_data')->middleware('user:user.user_list');
Route::get('/user/users_remove_list_data','RegistartionController@users_remove_list_data')->middleware('user:user.user_list');
Route::get('/user/user_view/{id}','RegistartionController@user_view')->middleware('user:user.user_view');
Route::put('/user/user_update/{id}' ,'RegistartionController@user_update')->middleware('user:user.user_update');
Route::put('/user/update_permission/{id}','RegistartionController@update_permission')->middleware('user:user.update_permission');
Route::put('/user/update_role/{id}','RegistartionController@update_role')->middleware('user:user.update_role');
//Route::get('/user/update_password', function () { return \Redirect::to('https://elogin.gov.ps/new/'); });
Route::get('/user/update_password','RegistartionController@update_password')->middleware('user:index');
Route::post('/user/update_password','RegistartionController@updatePassword')->middleware('user:index');

Route::get('/login','LoginController@login');
Route::post('/login','LoginController@postLogin');
Route::get('/logout','LoginController@logout');
// for chating
Route::get('/user/migrate_data','RegistartionController@migrate_data')->middleware('user:index');
// مين يملك الصلاحيت
Route::get('/user/user_has_permission/{slug}','RegistartionController@user_has_permission')->middleware('user:user.user_list');
Route::get('/user/role_has_permission/{slug}','RegistartionController@role_has_permission')->middleware('user:user.user_list');
// إزالة الصلاحية
Route::get('/user/remove_permission/{user_id}/{slug}','RegistartionController@remove_permission')->middleware('user:user.user_list');
Route::get('/user/remove_role_has_permission/{user_id}/{slug}','RegistartionController@remove_role_has_permission')->middleware('user:user.user_list');
// add lang user
Route::get('/user/userlangs/{id}','LoginController@lang')->middleware('user:index');
Route::get('/user/user_image/{id}','RegistartionController@user_image')->middleware('user:user.user_list');
?>