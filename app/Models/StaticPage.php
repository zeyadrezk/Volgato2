<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description'];

    protected $casts =[
        'title'=>'array',
        'description'=>'array',

    ];


    protected $hidden = [
        'updated_at',
        'created_at',
    ];

}
