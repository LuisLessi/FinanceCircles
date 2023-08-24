<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = true;
    protected $table = 'user_groups';
    protected $fillable = [
        'user_id',
        'group_id',
        'permission',
    ];

    protected $hidden = [];
}