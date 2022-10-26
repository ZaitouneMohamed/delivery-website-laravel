<?php

namespace App\Http\Controllers\user;

use App\Models\food;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FoodsController extends Controller
{
    public function index(){
        $categories = Categorie::all();
        $foods=food::all();
        return view ('user.food',compact('foods','categories'));
    }

    public function speacial_food($id) {
        $categories = Categorie::all();
        $foods = food::all()->where('categorie_id','like',$id);
        // $categorie_name = Categorie::where('id','=',$id)->get($id);
        $categorie_name=DB::table('categories')->where('id', $id)->first();
        return view ('user.speacial_food',compact('foods','categories','categorie_name'));
    }

    public function search(Request $request){
        $categories = Categorie::all();
        $key=$request->search;
        $foods = DB::table('food')->where('title','LIKE','%'.$key.'%')
                    ->get();

        return view ('user.search',compact('foods','categories','key'));
    }
}
