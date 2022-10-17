<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'categorie_id',
        'active'
    ];

    public function catgorie(){
        return $this->belongsTo(Categorie::class,'categorie_id','id');
    }

    public function order(){
        return $this->hasMany(order::class);
    }
}
