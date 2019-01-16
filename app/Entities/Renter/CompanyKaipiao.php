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
class CompanyKaipiao extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'renter_company_kaipiao';

    protected $fillable = [
        'bank_name',
        'bank_account',
        'mobile',
        'billing_address',
        'renter_id',
    ];

    public $timestamps=false;

}
