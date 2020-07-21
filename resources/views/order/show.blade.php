@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{__('Order')}}
      <small>({{__('Count')}}: {{$order->pizzas->sum('pivot.quantity')}})</small>

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item active">{{__('Order')}}</li>
    </ol>
    <div class="row mb-5">
    	<div class="col-md-8">
    		<table class="table table-sm table-striped">
    			<thead class="thead-dark">
    				<tr>
    					<th>{{__('Pizza')}}</th>
    					<th>{{__('Price per Unit')}}</th>
    					<th>{{__('Quantity')}}</th>
    					<th>{{__('Total Price')}}</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($order->pizzas as $pizza)
    				<tr>
    					<td class="text-left"><a href="{{route('front.pizza', $pizza->id)}}">{{$pizza->name}}</a></td>
    					<td>{{$pizza->pivot->price}}&euro;</td>
    					<td>{{$pizza->pivot->quantity}}</td>
    					<td class="text-right">{{$pizza->pivot->price*$pizza->pivot->quantity}}&euro;</td>
    				</tr>
    				@empty
    				<tr>
    					<td colspan="4">The cart is empty</td>
    				</tr>
    				@endforelse
    				<tfoot class="table-dark">
	    				<tr>
	    					<td></td>
	    					<td></td>
	    					<td>Total pizzas {{$order->pizzas->sum('pivot.quantity')}}</td>
	    					<td class="text-right">{{__('Total sum')}} {{$order->total_price}}&euro;</td>
	    				</tr>
    				</tfoot>

    			</tbody>
    		</table>
    	</div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{__('Ordered by')}}</div>
                <div class="card-body">
                    {{$order->firstname}} {{$order->lastname}} <br>
                    {{$order->address}} <br>
                    {{$order->phone}} <br>
                    {{$order->email}} <br>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection