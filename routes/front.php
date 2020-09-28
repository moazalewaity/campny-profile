<?php 
    Route::group(['prefix' => '/'], function () {
        Route::get('/','Front\FrontController@index');
        Route::get('/category/{id}/{title?}','Front\FrontController@category');
        Route::get('/contact-us/{title}','Front\FrontController@contact_us');
        Route::get('/gallery/{title?}','Front\FrontController@gallery');
        Route::get('/search/{title?}','Front\FrontController@search');
        Route::get('/{id}/{title?}','Front\FrontController@post');
        // Route::get('/{id}','Front\FrontController@post');
        Route::post('/ajax/bk_ajax_comments_post/{id}','Front\FrontController@bk_ajax_comments_post');
        Route::post('/ajax/bk_ajax_search_post/','Front\FrontController@bk_ajax_search_post');
        Route::post('/ajax/bk_ajax_review/{id}','Front\FrontController@bk_ajax_review');

        Route::get('/front/images/{size?}/{folder?}/{month?}/{file?}','Front\FrontController@images');
        
        Route::get('/service/{type}/{title?}','Front\FrontController@service');
        Route::get('/serv/serv/test_uplad','Front\FrontController@updatenplaplasugfile');
        Route::post('/ajax/bk_ajax_plaint/{type}','Front\FrontController@bk_ajax_plaint');
        Route::post('/ajax/bk_ajax_deedcheck','Front\FrontController@bk_ajax_deedcheck');
        Route::post('/ajax/bk_ajax_transactions','Front\FrontController@bk_ajax_transactions');
        Route::post('/ajax/bk_ajax_contact_us','Front\FrontController@bk_ajax_contact_us');
    });
?>