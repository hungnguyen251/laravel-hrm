<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilterable;

class Notification extends Model
{
    use HasFactory, QueryFilterable;

    protected $table = 'notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'department_id',
        'status'
    ];

        /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $filterable = [
        'title', 'content', 'user_id', 'department_id'
    ];


    /**
     * The fields that should be sortable by query.
     *
     * @var array
     */
    protected $sortable = [
        'title', 'user_id', 'department_id'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $includable = [
        'user', 'departments'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class, 'department_id');
    }
}
