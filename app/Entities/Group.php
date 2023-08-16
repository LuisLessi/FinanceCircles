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

    protected $fillable = ['user_id', 'institution_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
}
