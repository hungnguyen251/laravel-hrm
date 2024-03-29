<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilterable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnnualLeave extends Model
{
    use HasFactory, QueryFilterable, SoftDeletes;

    protected $table = 'annual_leave';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'staff_id',
        'number',
        'working_time',
        'created_at'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $filterable = [
        'staff_id', 'staff.code', 'staff.first_name', 'staff.code'
    ];


    /**
     * The fields that should be sortable by query.
     *
     * @var array
     */
    protected $sortable = [
        'staff_id', 'number', 'working_time', 'created_at'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $includable = [
        'staff'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
