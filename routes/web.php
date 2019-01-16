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
    $data['companyName'] = 'Hello';
//    $data['contactName'] = 'Post';
    $data['replyName'] = 'Reply';
//    return  \App\Entities\Renter::create($data);

//    $building = \App\Entities\Building\Building::first();
//    $building->name = 'HELLO';
//    dd($building->getOriginal('name'));
//    $m = \Ramsey\Uuid\Uuid::uuid1('3333');
//    echo $m->getHex();
//    dd($m);
//    \Illuminate\Support\Facades\Log::info('Hello Log');
//    return view('welcome');
})->middleware('test:aaaaa');
