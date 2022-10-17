<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'qty',
        'total',
        'order_date',
        'livreur_id',
        'status',
        'confirmation',
        'is_returned',
        'raison_of_return'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function livreur(){
        return $this->belongsTo(User::class);
    }

    public function food(){
        return $this->belongsTo(Food::class);
    }
}
