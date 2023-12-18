<?php

namespace App\Models\cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class discountCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'discount_code',
        'percentage',
        'UseNumber',
        'start_date',
        'end_date',
        'maxValue',
    ];


    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    protected $dates = ['deleted_at'];
}
