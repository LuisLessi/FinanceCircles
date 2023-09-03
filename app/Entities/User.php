<?php

namespace App\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cpf',
        'name',
        'phone',
        'birth',
        'gender',
        'notes',
        'email',
        'password',
        'status',
        'permission',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];
        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 7, 3) . '-' . substr($cpf, -2);
    }

    public function getFormattedPhoneAttribute($value)
    {
        $value = $this->attributes['phone'];

        if ($value) {
            $numericValue = preg_replace('/[^0-9]/', '', $value);

            if (strlen($numericValue) === 10) {
                return '(' . substr($numericValue, 0, 2) . ') ' . substr($numericValue, 2, 5) . '-' . substr($numericValue, 7);
            } elseif (strlen($numericValue) === 11) {
                return '(' . substr($numericValue, 0, 2) . ') ' . substr($numericValue, 2, 5) . '-' . substr($numericValue, 7);
            }
        }

        return $value; 
    }

    public function getFormattedBirthAttribute($value)
    {
        $value = $this->attributes['birth'];

        if ($value) {
            return date('Y/m/d', strtotime($value));
        }

        return $value; 
    }
}
