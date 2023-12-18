<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
	protected $fillable =[
		'name',
		'id',
	];
	
	protected $hidden = [
		'updated_at',
		'created_at',
	];
	
	
	protected $casts =[
		'name'=>'array',
	
	];
	
}
