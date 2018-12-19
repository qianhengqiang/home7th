<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingFloor extends Model
{
    //
    protected $table = 'building_floors';

    protected $fillable = [
        'building_id',
        'name',
        'space_count',
        'hourse_count',
    ];

    public $timestamps = false;
}
