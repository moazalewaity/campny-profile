<?php
Route::get('/alerts/new_alert_view','alerts\AlertsController@new_alerts_view')->middleware('user:alert.alert_info');
Route::post('/alerts/new_alert_data','alerts\AlertsController@new_alert_data')->middleware('user:alert.alert_info');


// عرض البيانات
Route::get('/alerts/show_alert_data','alerts\AlertsController@show_alert_data')->middleware('user:alert.alert_info');
Route::get('/alerts/show_alert_view','alerts\AlertsController@show_alert_view')->middleware('user:alert.alert_info');
//
Route::get('/alerts/alert_data/{id}','alerts\AlertsController@alert_data')->middleware('user:alert.alert_info');

Route::put('/alerts/edit_alert/{id}','alerts\AlertsController@edit_alert')->middleware('user:alert.alert_info');





?>