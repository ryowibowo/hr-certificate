<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    public $table = 'trainer';
	protected $fillable = [
        'id', 'name', 'phone_number'
    ];
}
