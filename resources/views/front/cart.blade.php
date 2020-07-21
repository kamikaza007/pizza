@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{__('Cart')}}
      <small>({{__('Count')}}: {{collect(session('cart'))->sum('quantity')}})</small>

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item active">{{__('Cart')}}</li>
    </ol>
    <div class="row">
    	<div class="col-md-12">
    		<table class="table table-striped">
    			<thead class="thead-dark">
    				<tr>
    					<th colspan="2" style="width:25%;">{{__('Pizza')}}</th>
    					<th>{{__('Price per Unit')}}</th>
    					<th>{{__('Quantity')}}</th>
    					<th>{{__('Total Price')}}</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($pizzas as $pizza)
    				<tr>
    					<td><img src="{{$pizza->thumbnail_url}}" width="100" alt="" class="img-fluid"></td>
    					<td class="text-left"><a href="{{route('front.pizza', $pizza->id)}}">{{$pizza->name}}</a></td>
    					<td>{{$pizza->price}}&euro;</td>
    					<td>{{$cart[$pizza->id]['quantity']}}</td>
    					<td class="text-right">{{$pizza->price*$cart[$pizza->id]['quantity']}}&euro;</td>
    				</tr>
    				@empty
    				<tr>
    					<td colspan="5">The cart is empty</td>
    				</tr>
    				@endforelse
    				<tfoot class="table-dark">
	    				<tr>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td>Total pizzas {{collect(session('cart'))->sum('quantity')}}</td>
	    					<td class="text-right">{{__('Total sum')}} {{$total_price}}&euro;</td>
	    				</tr>
    				</tfoot>

    			</tbody>
    		</table>
    	</div>
    </div>
    <div class="row my-4">
    	<div class="col-md-6">
    		<a href="{{route('front.orderForm')}}" class="btn btn-primary btn-block">{{__('Place your order')}}</a>
    	</div>
    	<div class="col-md-6">
    		<a href="{{route('front.clearCart')}}" class="btn btn-warning btn-block">{{__('Clear cart')}}</a>
    	</div>
    </div>
   </div>
@endsection