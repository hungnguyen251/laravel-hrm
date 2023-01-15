<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilterable;

class Salary extends Model
{
    use HasFactory, QueryFilterable;

    protected $table = 'salaries';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'staff_id',
        'amount',
        'note',
        'insurance_amount'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $filterable = [
        'staff_id', 'amount', 'insurance_amount'
    ];


    /**
     * The fields that should be sortable by query.
     *
     * @var array
     */
    protected $sortable = [
        'staff_id', 'amount', 'insurance_amount'
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
