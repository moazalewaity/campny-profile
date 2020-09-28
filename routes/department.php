<?php 
  Route::group(['prefix' => 'department'], function () {

    Route::get('/','DepartmentController@view')->middleware('user:department.list');
    Route::get('/add/{id?}','DepartmentController@add')->name('editdep')->middleware('user:department.add');
    Route::post('/create/{id?}','DepartmentController@create')->name('adddep')->middleware('user:department.add');
    Route::get('/delete/{id}','DepartmentController@delete')->name('deletedep')->middleware('user:department.delete');
    

    Route::post('/resort_table','DepartmentController@resort_table');
    Route::get('/getdata', 'DepartmentController@datapost')->name('department/getdata');
    Route::get('/submenu/{id}','DepartmentController@get_submenu');

    Route::get('/status_option/{id}/{val}/{status}','DepartmentController@status_option');
    Route::post('/sort_option/{id}','DepartmentController@sort_option');

    Route::get('/getoptionmenu/{id}/{postid?}','DepartmentController@getoptionmenu');
  });
?>