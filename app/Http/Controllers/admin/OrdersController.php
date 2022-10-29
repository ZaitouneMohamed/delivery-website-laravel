<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // all orders
        $orders=order::orderBy('created_at','desc')->paginate(5);
        return view('admin.manage_orders.orders_list',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // untacked orders
        $orders=order::where('confirmation','=','nothing')->paginate(5);
        return view('admin.manage_orders.untacked',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // give order to a speacific livreur
        $order=order::find($request->order_id);
        $order->update([
            'confirmation'=>"wait for answer",
            'livreur_id'=>$request->livreur_id
        ]);
        return view('admin.manage_orders.request')->with([
            'success' => "wait for confirmation"
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
        // show order
        $order=order::find($id);
        $livreurs=User::all()->where('role',2)->where('adresse',$order->user->adresse);
        return view ('admin.manage_orders.show',compact('order','livreurs'));
    }

    public function onroad ($id){
        $order=order::find($id);
        $order->update([
            'status'=>"on road"
        ]);
        return redirect()->route('orders.index');
    }

    public function received ($id){
        $order=order::find($id);
        $order->update([
            'status'=>"received"
        ]);
        return redirect()->route('orders.index');
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

    public function returned_orders()
    {
        // returned orders
        $orders=order::where('confirmation','=','returned')->paginate(5);
        return view('admin.manage_orders.returned',compact('orders'));
    }

    public function tacked_orders()
    {
        // returned orders
        $orders=order::where('confirmation','=','accepte')->paginate(5);
        return view('admin.manage_orders.tacked',compact('orders'));
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
        //
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
        return redirect()->route('manage_order.index');
    }
}
