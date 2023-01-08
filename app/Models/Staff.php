<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'code',
        'first_name',
        'last_name',
        'avatar',
        'gender',
        'date_of_birth',
        'address',
        'type',
        'position_id',
        'department_id',
        'diploma_id',
        'marriage_status',
        'start_date',
        'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function diploma()
    {
        return $this->belongsTo(Diploma::class, 'diploma_id');
    }
}
