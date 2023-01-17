<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilterable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timesheets extends Model
{
    use HasFactory, QueryFilterable, SoftDeletes;

    protected $table = 'timesheets';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'staff_id',
        'salary_id',
        'allowance',
        'work_day',
        'advance',
        'received',
        'month',
        'year',
        'month_leave',
        'remaining_leave',
        'note',
        'status'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $filterable = [
        'code', 'staff_id', 'month', 'year', 'status', 'staff.code'
    ];

    protected $exactFilterable = [
        'month', 'year', 'status'
    ];

    /**
     * The fields that should be sortable by query.
     *
     * @var array
     */
    protected $sortable = [
        'code', 'staff_id', 'salary_id', 'received', 'month', 'year', 'status'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $includable = [
        'staff', 'salary'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }
}
