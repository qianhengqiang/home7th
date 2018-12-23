<?php

namespace App\Entities;

use App\Models\Auth;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Tag.
 *
 * @package namespace App\Entities;
 */
class Tag extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','parent_id','user_id','alias'
    ];

    public function children()
    {
        return $this->hasMany(Tag::class,'parent_id','id');
    }

    public function childrenSystem()
    {
        return $this->children()->whereIn('user_id',Auth::SUPER);
    }

    public function childrenUsers()
    {
        return $this->children()->whereIn('user_id',array_merge(Auth::SUPER,[auth()->user()->id]));
    }

    public function parent()
    {
        return $this->belongsTo(Tag::class,'parent_id','id');
    }

    //删除所有
    protected function deleteChildren()
    {
        $this->children()->delete();
    }

}
