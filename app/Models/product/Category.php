<?php

	namespace App\Models\product;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Category extends Model
	{
		use HasFactory , SoftDeletes;

		protected $fillable = [
			'name',
			'image',

		];
		protected $hidden = [
			'updated_at',
			'created_at',
		];

		protected $casts = [
			'name'=>'array',
		];
	}
