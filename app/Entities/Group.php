<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Entities\User;
use App\Entities\Institution;

/**
 * Class Group.
 *
 * @package namespace App\Entities;
 */
class Group extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['name', 'user_id', 'institution_id'];

    public function getTotalValueAttribute()
    {
        return $this->moviments()->where('type', 1)->sum('value') - $this->moviments()->where('type', 2)->sum('value');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groups');

    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }
}
