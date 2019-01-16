<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/10
 * Time: 10:23 AM
 */

Route::namespace('Admin')->group(function (){

    Route::post('login', 'AuthController@login')->name('login');

    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('getUserInfo', 'AuthController@getUserInfo');

    Route::prefix('permission')->group(function(){

        Route::get('getAllRoles','PermissionController@getAllRoles');
        Route::post('addRoleWithPermissions','PermissionController@addRoleWithPermissions');
        Route::post('deleteRole','PermissionController@deleteRole');
        Route::post('assignPermissionsToRole','PermissionController@assignPermissionsToRole');
        Route::get('getPermissionsByRole','PermissionController@getPermissionsByRole');

        Route::get('getAllPermissions','PermissionController@getAllPermissions');
        Route::post('addPermission','PermissionController@addPermission');
        Route::post('deletePermission','PermissionController@deletePermission');

    });

    Route::prefix('manager')->group(function (){
        Route::get('managerList','ManagerController@managerList');
        Route::post('addManager','ManagerController@addManager');
        Route::post('changePassword','ManagerController@changePassword');
        Route::post('assignRolesToManager','ManagerController@assignRolesToManager');
        Route::post('deleteManager','ManagerController@deleteManager');

    });

    Route::resource('building', 'BuildingsController');
    Route::resource('house', 'HousesController');


    Route::prefix('tag')->group(function(){
        Route::get('belongToUser','TagsController@belongToUser');

    });
    Route::resource('tag', 'TagsController');
    Route::resource('renter', 'RentersController');
//    Route::prefix('building')->group(function(){
//
//        Route::post('create','BuildingController@create');
//        Route::get('show','BuildingController@show');
//        Route::get('list','BuildingController@index');
//        Route::delete('delete','BuildingController@delete');
//
//    });
});

