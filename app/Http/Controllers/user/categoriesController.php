<?php

namespace App\Http\Controllers\user;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('user.categories',compact('categories'));
    }
}
