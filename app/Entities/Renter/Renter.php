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
class Renter extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'renters';
    protected $fillable = [
        'company',
        'contact',
        'identification_card',
        'industry_category',
        'mobile',

        'email',
        'user_id'
    ];

    public function companyInfo()
    {
        return $this->hasOne(CompanyInfo::class);
    }

    public function kaipiaoInfo()
    {
        return $this->hasOne(CompanyKaipiao::class);
    }

}
