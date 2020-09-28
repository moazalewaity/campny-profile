<?php
Route::get('/menus/create','MenuController@create')->middleware('user:menu.menu_add');
Route::post('/menus/','MenuController@store')->middleware('user:menu.menu_add');
Route::get('/menus','MenuController@index')->middleware('user:menu.menu_list');
Route::get('/menu_list','MenuController@menu_list')->middleware('user:menu.menu_list');
Route::get('/menus/{id}','MenuController@show')->middleware('user:menu.menu_view');
Route::put('/menus/{id}','MenuController@update')->middleware('user:menu.menu_update');


Route::get('/display_prog_num/{id}/{userid}','MenuController@display_prog_num')
->middleware('user:menu.menu_list'); ///نشوف الصلاحيه
Route::post('/prog_num_permission/{id}','MenuController@prog_num_permission')
->middleware('user:menu.menu_list'); ///نشوف الصلاحيه

?>