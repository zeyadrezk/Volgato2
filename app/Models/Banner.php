<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
	protected $fillable =[
		'image',
		'type',
		'idprod',
		'id',
	];
	
	protected $hidden = [
		'updated_at',
		'created_at',
	];
 
	
}
