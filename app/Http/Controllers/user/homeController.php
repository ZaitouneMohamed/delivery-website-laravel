<?php

namespace App\Http\Controllers\user;


use App\Models\order;
use App\Models\message;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index()
    {
        $categories=Categorie::all();
        $categorie2 = DB::table('categories')->where('title','burger')->first();
        return view('user.home',compact('categorie2','categories'));
    }

    public function fill_categorie(){
        $categories = Categorie::all();
        return view('user.includes.navbar',compact('categories'));
    }

    public function message(){
        $categories = Categorie::all();
        return view('user.message',compact('categories'));
    }

    public function send_message(Request $request){
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'content' => 'required'
            ]);
            message::create([
                'content'=>$request->content,
                'phone'=>$request->phone,
                'name'=>$request->name,
                'email'=>$request->email
            ]);
        }
        else{
            $request->validate([
                'content' => 'required'
            ]);
            message::create([
                'content'=>$request->content,
                'phone'=>auth()->user()->phone,
                'name'=>auth()->user()->name,
                'email'=>auth()->user()->email
            ]);
        }
        return redirect()->route('user.home')->with([
            'message' => "mercie pour votre message"
        ]);
    }


}
