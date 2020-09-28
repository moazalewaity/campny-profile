<?php 
  Route::group(['prefix' => 'setting'], function () {

    Route::get('/','Post\SettingController@view')->middleware('user:setting.list');
    Route::get('/create','Post\SettingController@add')->middleware('user:setting.add');
    Route::get('/edit/{id}','Post\SettingController@edit')->name('editsetting')->middleware('user:setting.edit');
    Route::post('/create/{id?}','Post\SettingController@create')->name('addsetting')->middleware('user:setting.add');
    Route::post('/imageupload/{id?}','Post\SettingController@upladimage')->name('imageuploadsetting')->middleware('user:setting.add');
    Route::get('/delete/{id}','Post\SettingController@delete')->name('delsetting')->middleware('user:setting.delete');
    Route::get('/deleteimage/{id}','Post\SettingController@deletePostImage')->middleware('user:setting.delete');
    
    Route::get('/changestatus/{id}/{state}','Post\SettingController@changestatus')->middleware('user:setting.status');
    Route::get('/submenu/{id}','Post\SettingController@get_submenu');
    Route::post('/resort','Post\SettingController@resort');
    Route::post('/resort_table','Post\SettingController@resort_table');

    Route::get('/getdata', 'Post\SettingController@datapost')->name('setting/getdata')->middleware('user:setting.list');
    Route::get('/updategllarey', 'Post\SettingController@updategllarey')->middleware('user:setting.list');
    Route::get('/updatedepartment', 'Post\SettingController@updatedepartment')->middleware('user:setting.list');

  });
?>