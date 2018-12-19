<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    $m = \Ramsey\Uuid\Uuid::uuid1('3333');
//    echo $m->getHex();
//    dd($m);
    return view('welcome');
});
