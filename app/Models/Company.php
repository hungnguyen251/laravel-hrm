<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilterable;

class Company extends Model
{
    use HasFactory, QueryFilterable;

    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'tax_code',
        'founding_date',
        'email',
        'phone',
        'logo',
        'website',
        'address'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $filterable = [
        'name', 'tax_code', 'email', 'phone'
    ];


    /**
     * The fields that should be sortable by query.
     *
     * @var array
     */
    protected $sortable = [
        'name', 'tax_code', 'email', 'phone'
    ];

    /**
     * The fields that should be filterable by query.
     *
     * @var array
     */
    protected $includable = [
    ];
}
