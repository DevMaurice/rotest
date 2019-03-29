<?php

namespace App;

use App\Leave;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','manager_id','kra_pin','dob','file_number','days_remaining'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship to users Leaves
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'user_id');
    }

    /**
     * Get user's manager.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Get all staff managed by this manager.
     */
    public function staff()
    {
        return $this->hasMany(User::class, 'manager_id');
    }

    /**
     * Determine if a given user is a manager.
     */
    public function getIsManagerAttribute()
    {
        return $this->manager_id ? true :false;
    }
}
