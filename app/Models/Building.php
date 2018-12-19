<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    protected $table = 'buildings';

    protected $fillable = [
        'type',
        'province',
        'city',
        'name',
        'area',

        'location',
        'bussiness_mobile',
        'use_for',
        'jianzhu_area',
        'zhandi_area',

        'manager_area',
        'build_time',
        'order_in_advance_day',
        'image',
        'pre_contract_num',

        'contract_midlle_type',
        'user_id',
    ];
}
