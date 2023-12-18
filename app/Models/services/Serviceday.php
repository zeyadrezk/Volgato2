<?php

namespace App\Models\services;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serviceday extends Model
{
    use HasFactory;

	protected  $fillable = [
		'id',
		'name',
  		'start_time',
		'end_time',
 		'service_id',
	];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];


    protected $casts =[
        'name'=>'array',

    ];

	public function service()
    {
		return $this->belongsTo(Service::class);
	}
    public function servicetimes()
    {
		return $this->hasMany(ServiceTimes::class);
	}


}
