<?php 
//Route::resource('/roles', 'RuleController');
Route::get('/roles/create','RoleController@create')->middleware('user:role.role_add');
Route::post('/roles/','RoleController@store')->middleware('user:role.role_add');
Route::get('/roles/index','RoleController@index')->middleware('user:role.role_list');
Route::get('/roles_list_data','RoleController@roles_list_data')->middleware('user:role.role_list');

Route::get('/roles/{id}','RoleController@show')->middleware('user:role.role_view');
Route::put('/roles/{id}','RoleController@update')->middleware('user:role.role_update');



Route::get('/roles/role_has_permission/{slug}','RoleController@role_has_permission')->middleware('user:role.role_list');
Route::get('/roles/remove_role_has_permission/{user_id}/{slug}','RoleController@remove_role_has_permission')->middleware('user:role.role_list');

?>