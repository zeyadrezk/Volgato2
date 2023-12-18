<?php

namespace App\Models\services;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'oldprice',
        'image',
        'details',
        'description',
        'short_description',
        'total_rate',
        'start_time',
        'end_time',
        'country_id',
        'duration',
        'status',


    ];

    protected $casts =[
		'name'=>'array',
		'description'=>'array',
		'short_description'=>'array',
		'details'=>'array',


    ];

	protected $hidden = [
		'updated_at',
		'created_at',
	];

	public function country(){
		return $this->belongsTo(Country::class);
	}

}
