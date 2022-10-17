<?php

namespace App\Http\Controllers\admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories=Categorie::orderBy('id','desc')->paginate(5);
        return view('admin.manage_categorie.home',compact('categories'));
    }

    public function create()
    {
        return view('admin.manage_categorie.create');
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
            'image' => "required",
            'description' => "required",
        ]);
        if ($request->has('image')) {
            $file = $request ->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            // $file->move('/storage/categorie');
            $file->move(public_path('categories'),$image_name);
        }
        Categorie::create([
            'title' => $request->title,
            'image' => $image_name,
            'active' => $request->active,
            'description' => $request->description
        ]);
        return redirect()->route('categorie.index')->with([
            'success' => "categorie est bien ajouter"
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
        $categorie=Categorie::find($id);
        return view('admin.manage_categorie.show',compact(('categorie')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie=Categorie::find($id);
        return view('admin.manage_categorie.update',compact(('categorie')));
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
         // dd($request->all());
        $categorie=categorie::find($id);
        $request->validate([
            'title' => "required|min:8",
            'image' => "required",
            'description' => "required",
        ]);

        if ($request->has('image')) {
            $file = $request ->image;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('categories'),$image_name);
            unlink(public_path('/categories').'/'.$categorie->image);
            $categorie->image=$image_name;
        }
        $categorie->update([
            'title' => $request->title,
            'image' => $image_name,
            'active' => $request->active,
            'description' => $request->description
        ]);
        return redirect()->route('categorie.index')->with([
            'success' => "categorie est bien modifier"
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
        $categorie=Categorie::find($id);
        unlink(public_path('/categories').'/'.$categorie->image);
        $categorie->delete();
        return redirect()->route('categorie.index')->with([
            'success' => "categorie est supprimé"
        ]);
    }
}
