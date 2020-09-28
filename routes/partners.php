<?php 
  Route::group(['prefix' => 'partners'], function () {

    Route::get('/','PartnerController@view')->middleware('user:partners.list');
    Route::get('/create','PartnerController@add')->middleware('user:partners.add');
    Route::get('/edit/{id}','PartnerController@edit')->name('editpartners')->middleware('user:partners.list');
    Route::post('/create/{id?}','PartnerController@create')->name('addpartners')->middleware('user:partners.list');
    Route::get('/delete/{id}','PartnerController@delete')->name('delpartners')->middleware('user:partners.list');
    
    Route::get('/changestatus/{id}/{state}','PartnerController@changestatus')->middleware('user:partners.status');


    
    Route::get('/getdata', 'PartnerController@datapost')->name('post/getdata')->middleware('user:partners.list');
    Route::get('/updategllarey', 'PartnerController@updategllarey')->middleware('user:partners.list');
    Route::get('/updatedepartment', 'PartnerController@updatedepartment')->middleware('user:partners.list');

  });
?>