<?php

namespace App\Http\Controllers\admin;

use App\Models\food;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class foodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods=food::orderBy('id','desc')->paginate(5);
        return view('admin.manage_food.home',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie=Categorie::all();
        return view('admin.manage_food.create',compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => "required|min:4",
            'description' => "required|min:4",
            'price' => "required",
            'image' => "required",
        ]);
        if ($request->has('image')) {
            $file = $request ->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foods'),$image_name);
        }

        food::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image_name,
            'categorie_id' => $request->categorie,
            'active' => $request->active
        ]);
        return redirect()->route('food.index')->with([
            'success' => "food est bien ajouter"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food=food::find($id);
        return view('admin.manage_food.show',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food=food::find($id);
        $categorie=Categorie::all();
        return view('admin.manage_food.update',compact('food','categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food=food::find($id);
        $request->validate([
            'title' => "required|min:8",
            'description' => "required",
            'image' => "required",
            'price' => "required",
        ]);

        if ($request->has('image')) {
            $file = $request ->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            // $file->move('/storage/categorie');
            $file->move(public_path('foods'),$image_name);
            unlink(public_path('/foods').'/'.$food->image);
            $food->image=$image_name;
        }
        $food->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $image_name,
            'categorie_id' => $request->categorie,
            'active' => $request->active
        ]);
        return redirect()->route('food.index')->with([
            'success' => "food est bien modifier"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food=food::find($id);
        unlink(public_path('/foods').'/'.$food->image);
        $food->delete();
        return redirect()->route('food.index')->with([
            'success' => "food est supprimé"
        ]);
    }
}
