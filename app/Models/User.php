<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\QueryFilterable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, QueryFilterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'decentralization',
        'staff_id',
        'status',
        'created_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

        /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $filterable = [
        'email', 'phone', 'decentralization', 'staff_id', 'status', 'staff.code'
    ];

    protected $exactFilterable = [
        'status'
    ];

    /**
     * The fields that should be sortable by query.
     *
     * @var array
     */
    protected $sortable = [
        'email', 'phone', 'decentralization', 'staff_id', 'created_at', 'status'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $includable = [
        'staff', 'notifications'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'user_id');
    }
}
