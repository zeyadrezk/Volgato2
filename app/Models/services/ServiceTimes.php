<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTimes extends Model
{
    use HasFactory;

    protected  $fillable = [
        'id',
'service_time',
'status',
'service_id',
'day_id',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function serviceDay()
    {
        return $this->belongsTo(Serviceday::class, 'serviceday_id');
    }


}
