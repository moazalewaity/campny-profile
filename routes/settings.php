<?php 
  Route::group(['prefix' => 'settings'], function () {

    Route::get('/create','SettingHome@getSetting')->middleware('user:settings.add');
    Route::post('/create/{id?}','SettingHome@postSetting')->name('addsetting')->middleware('user:settings.add');
    
  });
?>