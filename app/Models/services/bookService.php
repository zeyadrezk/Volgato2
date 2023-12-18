<?php

namespace App\Models\services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookService extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'service_id',
        'date',
        'OrderNum',
        'value',
        'time'
    ];



    public function service()
    {
        return $this->belongsTo(Service::class);
    }


}
