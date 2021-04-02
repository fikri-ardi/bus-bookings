<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes([
    'register' => false
]);

Route::get('buses/print', 'BusController@print')->name('buses.print');
Route::get('buses/export', 'BusController@export')->name('buses.export');

Route::get('drivers/print', 'DriverController@print')->name('drivers.print');
Route::get('drivers/export', 'DriverController@export')->name('drivers.export');

Route::get('orders/print', 'OrderController@print')->name('orders.print');
Route::get('orders/export', 'OrderController@export')->name('orders.export');

Route::get('schedules', 'ScheduleController@index')->name('schedules.index');
Route::get('schedules/print', 'ScheduleController@print')->name('schedules.print');
Route::get('schedules/export', 'ScheduleController@export')->name('schedules.export');

Route::resources([
    'buses' => 'BusController',
    'drivers' => 'DriverController',
    'orders' => 'OrderController',
]);