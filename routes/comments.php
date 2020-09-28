<?php 
Route::group(['prefix' => 'comments'], function () {
    //=========================================================================
    Route::get('/','Comments\CommentsController@index')->middleware('user:comments.list');
	Route::get('/data', 'Comments\CommentsController@index_data')->middleware('user:comments.list');	
	Route::get('/{id}','Comments\CommentsController@view')->middleware('user:comments.list');
	        
	Route::get('/changestatus/{id}/{state}','Comments\CommentsController@changestatus')->middleware('user:comments.status');
    Route::delete('/{id}','Comments\CommentsController@delete')->middleware('user:comments.delete');
    //=============================================
 
});
?>