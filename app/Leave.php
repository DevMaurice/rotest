<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'date_from','date_to','reason','days','status'
    ];

    /**
     * Leave belongs to a User.
     *
     * return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStateAttribute()
    {
        if ($this->status == 'WAITING') {
            return 'indigo';
        } elseif ($this->status == 'APPROVED') {
            return 'green';
        } else {
            return 'red';
        }
    }
}
