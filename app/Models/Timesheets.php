<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheets extends Model
{
    use HasFactory;

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
        'month_leave',
        'remaining_leave',
        'note'
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
