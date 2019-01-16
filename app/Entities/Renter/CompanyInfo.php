<?php

namespace App\Entities\Renter;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Renter.
 *
 * @package namespace App\Entities\Renter;
 */
class CompanyInfo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'renter_company_info';

    protected $fillable = [
        'corpname',
        'website',
        'address',
        'creditcode',
        'gongsh',

        'orgcode',
        'state',
        'type',
        'regtime',
        'proxyer',

        'money',
        'onlinetime',
        'regpart',
        'fieldrange',
        'industry',

        'email',
        'phone',
        'taxNumber',
        'hasUnify',
        'shortcut',

        'renter_id',

    ];

    public $timestamps=false;
}

