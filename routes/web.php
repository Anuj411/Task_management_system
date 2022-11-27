<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskcontroller;

Route::get('/', function () {
    return redirect('login');
});

Route::get('login', function () {
    return view('login');
});

Route::post('postlogin','App\Http\Controllers\taskcontroller@postlogin');

Route::get('home','App\Http\Controllers\taskcontroller@home');

Route::get('add_user', 'App\Http\Controllers\taskcontroller@add_user');

Route::post('insert_user', 'App\Http\Controllers\taskcontroller@insert_user');

Route::get('add_task', 'App\Http\Controllers\taskcontroller@add_task');

Route::post('insert_task', 'App\Http\Controllers\taskcontroller@insert_task');

Route::get('assign_task', 'App\Http\Controllers\taskcontroller@assign_task');

Route::post('post_assign_task', 'App\Http\Controllers\taskcontroller@post_assign_task');

Route::get('changepass', 'App\Http\Controllers\taskcontroller@changepass');

Route::post('post_changepass','App\Http\Controllers\taskcontroller@post_changepass');

Route::get('logout','App\Http\Controllers\taskcontroller@logout');

?>