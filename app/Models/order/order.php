<?php

	namespace App\Models\order;

	use App\Models\User;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class order extends Model
	{
		use HasFactory;

			 protected $fillable = [
                 'user_id',
                 'name',
                 'address',
                 'DateOfOrder',
                 'OrderNumber',
                 'total',
                 'discountValue',
                 'totalAfterDisc',
                 'PaymentReference',
                 'status',

		];

		protected $hidden = [
			'updated_at',
			'created_at',
		];


		public function items()
		{
			return $this->hasMany(OrderItems::class);
		}


		public function user()
		{
			return $this->belongsTo(User::class);
		}


	}
