<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class livreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // all livreurs
        $livreurs=User::where('role',2)->latest()->paginate(5);
        return view('admin.manage_livreurs.livreurs_list',compact('livreurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_livreurs.add_livreur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'email' => "required|email",
            'adresse' => "required",
            'phone' => "required",
            'password' => "required|min:6",
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'password' =>Hash::make($request->password),
            'role' => 2
        ]);
        return redirect()->route('manage_livreurs.index')->with([
            'success' => "le livreur est bien ajouter"
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
        $livreur=User::find($id);
        return view('admin.manage_livreurs.show',compact('livreur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livreur=User::find($id);
        $livreur->delete();
        return redirect()->route('manage_livreurs.index')->with([
            'success' => "livreur est bien supprimer"
        ]);
    }
}
