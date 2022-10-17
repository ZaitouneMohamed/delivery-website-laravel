<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'active',
        'description'
    ];

    public function foods(){
        return $this->hasMany(Food::class);
    }
}
