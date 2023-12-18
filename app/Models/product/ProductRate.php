<?php
	
	namespace App\Models\product;
	
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	
	class ProductRate extends Model
	{
		use HasFactory;
		
		protected $fillable = [
			'name',
			'productEvaluation',
			'comment',
			'rate',
			'commentDate',
			'product_id',
	    	'user_id'
		];
		
		protected $casts = [
			'productEvaluation'=>'array',
			
		
		
		];
		protected $hidden = [
			'updated_at',
			'created_at',
		];
		
	}
