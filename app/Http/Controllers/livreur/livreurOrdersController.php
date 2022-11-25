<?php

namespace App\Http\Controllers\livreur;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class livreurOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=order::where('status','=','on load')->paginate(5);
        return view('livreur.all_orders',compact('orders'));
    }

    public function request(){
        $livreur_id=auth()->user()->id;
        $orders=order::where('livreur_id','like',$livreur_id)->where('confirmation','=','wait for answer')->get();
        return view('livreur.request',compact("orders"));
    }

    public function confirm_request($id){
        $order=order::find($id);
        $order->update([
            'confirmation' => 'accepte',
            'status' => 'on road',
        ]);
        return redirect()->route('livreur.home')->with([
            'message' => "you take this order"
        ]);
    }

    public function refuse_request($id){
        $order=order::find($id);
        $order->update([
            'confirmation' => "refuse",
            'livreur_id'=>null
        ]);
        return redirect()->route('livreur.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=order::where('livreur_id','=',auth()->user()->id)->where('confirmation','=',"accepte")->paginate(5);
        return view ('livreur.my_orders',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order=order::find($request->order_id);
        $order->update([
            'livreur_id' =>Auth()->user()->id,
            'status' =>'on road',
            'confirmation' =>"accepte"
        ]);
        return redirect()->route('orders.index')->with([
            'message' => "you take this order"
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
        return view('livreur.show_order',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id=$request->order_id;
        $order=order::find($id);
        $order->update([
            'status'=>'received'
        ]);
        return view('livreur.home');
    }

    public function return_order(Request $request, $id){
        $order=order::find($id);
        $order->update([
            'livreur_id' => Null,
            'status' => 'returned',
            'confirmation' => "returned",
            'is_returned' => 'yes',
            'raison_return' => $request->raison ,
        ]);
        return Redirect()->route('livreur.home');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
