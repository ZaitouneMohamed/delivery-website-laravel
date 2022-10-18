<?php

namespace App\Http\Controllers\user;

use auth;
use App\Models\food;
use App\Models\User;
use App\Models\order;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $id=auth()->user()->id;
        $orders=order::select("*")->where('user_id','=',$id)->orderby('id','desc')->paginate(4);
        return view ('user.my_orders',compact('orders','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function add_order($id){
        $categories = Categorie::all();
        $food=food::find($id);
        return view('user.order',compact('food','categories'));
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
        $food=food::find($request->id);
        $total= $food->price * $request->qty;
        if ($request->has('adresse')) {
            $user=User::find(Auth()->user()->id);
            $user->update([
                'adresse'=>$request->adresse,
                'phone'=>$request->phone
            ]);
        }
        order::create([
            'user_id'=>auth()->user()->id,
            'food_id'=>$food->id,
            'qty'=>$request->qty,
            'total'=>$total,
            'order_date'=>now(),
            'livreur_id'=>Null,
            'status'=>'on load',
            'confirmation'=>'nothing'
        ]);
        return redirect()->route('add_order.index')->with([
            'message' => "order est bien ajouter"
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
        $order=order::find($id);
        $categories = Categorie::all();
        return view('user.show_order',compact('order','categories'))->with([
            'error' => "we are sorry we have a problem with your order"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=order::find($id);
        $categories = Categorie::all();
        return view('user.update_order',compact('order','categories'));
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
        $order=order::find($id);
        $food=food::find($request->food_id);
        $total=$food->price * $request->qty;
        $order->update([
            'qty'=>$request->qty,
            'total'=>$total
        ]);
        return redirect()->route('add_order.index')->with([
            'message' => "order est bien update"
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
        $order=order::find($id);
        $order->delete();
        return redirect()->route('add_order.index')->with([
            'message' => "order est bien suprimer"
        ]);
    }
}
