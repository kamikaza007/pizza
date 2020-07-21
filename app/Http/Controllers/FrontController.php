<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Order;

class FrontController extends Controller
{
    public function home()
    {
    	return view('front_home');
    }

    public function pizzas()
    {
    	$pizzas=Pizza::get();
    	return view('front.pizzas', compact('pizzas'));
    }

    public function pizza(Pizza $pizza)
    {
    	return view('front.pizza', compact('pizza'));
    }

    public function addToCart(Pizza $pizza)
    {
    	$cart=$this->addToCartLogic($pizza);

    	return redirect()->route('front.pizza', $pizza->id)->with('success', 'Pizza "'.$pizza->name.'" is added to cart. You have now '.$cart[$pizza->id]['quantity'].' "'.$pizza->name.'" in cart.');
    }

    public function buyNow(Pizza $pizza)
    {
    	$this->addToCartLogic($pizza);
    	return redirect()->route('front.cart');
    }

    public function addToCartLogic(Pizza $pizza)
    {
    	$cart=Session::pull('cart', []);

    	if(isset($cart[$pizza->id]))
    	{
    		$cart[$pizza->id]=[
    			'quantity'=>($cart[$pizza->id]['quantity']+1),
    			'price'=>$pizza->price,
    		];
    	}
    	else
    	{
    		$cart[$pizza->id]=[
    			'quantity'=>1,
    			'price'=>$pizza->price,
    		];
    	}

    	Session::put('cart',$cart);
    	return $cart;
    }

    public function clearCart()
    {
    	Session::forget('cart');

    	return redirect()->back();
    }

    public function cart()
    {
    	$cart=Session::get('cart', []);
    	$total_price=0;
    	$pizzas=[];

    	if(count($cart)>0)
    	{
    		$pizza_Ids=array_keys($cart);
    		$pizzas=Pizza::whereIn('id', $pizza_Ids)->get();
    		foreach($pizzas as $pizza)
    		{
    			$total_price+=$pizza->price*$cart[$pizza->id]['quantity'];
    		}
    	}


    	return view('front.cart', compact('cart', 'total_price', 'pizzas'));
    }

    public function orderForm()
    {
    	return view('front.orderForm');
    }

    public function contact()
    {
    	return view('front.contact');
    }

    public function orderHistory()
    {
    	$orders=Order::where('user_id', Auth::user()->id)->get();
    	return view('front.orderHistory', compact('orders'));
    }

    public function orderShow()
    {}

}
