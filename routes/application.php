<?php

Route::get('/application','Application\ApplicationController@index')->middleware('user:application.view');
Route::get('/application/{id}','Application\ApplicationController@show')->middleware('user:application.edit');
Route::put('/application/{id}','Application\ApplicationController@update')->middleware('user:menu.menu_update');


?>