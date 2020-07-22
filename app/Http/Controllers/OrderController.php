<?php

namespace App\Http\Controllers;

use App\Order;
use Session;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('created_at', 'DESC')->paginate(10);

        return view('order.index', compact('orders'));
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
            'firstname'=>'required|min:5|max:20',
            'lastname'=>'required|min:5|max:20',
            'address'=>'required|min:5',
            'phone'=>'required|min:5|max:20',
            'email'=>'required|min:5|max:40',
        ]);

        if(Session::has('cart'))
        {

            $cart=Session::get('cart', []);
            $total_price=0;
            foreach($cart as $item)
            {
                $total_price+=$item['quantity']*$item['price'];
            }

            $order=new Order;
            $order->firstname=$request->firstname;
            $order->lastname=$request->lastname;
            $order->address=$request->address;
            $order->phone=$request->phone;
            $order->email=$request->email;
            $order->total_price=$total_price;
            $order->user_id=(Auth::user())?Auth::user()->id:NULL;
            $order->save();

            $order->pizzas()->sync($cart);

            Session::forget('cart');
        }


        return redirect()->route('order.show', $order->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
