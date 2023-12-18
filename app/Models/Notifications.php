<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    // Set the primary key as UUID
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Define fillable attributes for mass assignment
    protected $fillable = ['type', 'data', 'read_at'];

    // Define the relationship with the notifiable entity
    public function notifiable()
    {
        return $this->morphTo();
    }

}
