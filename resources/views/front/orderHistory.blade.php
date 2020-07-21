@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{__('Order history')}}
      <small>({{__('Count')}}: {{$orders->count()}})</small>

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item active">{{__('Order history')}}</li>
    </ol>
    <div class="row">
    	<div class="col-md-12">
    		<table class="table table-striped">
    			<thead class="thead-dark">
    				<tr>
    					<th>{{__('Order Nb.')}}</th>
    					<th>{{__('Total price')}}</th>
    					<th>{{__('Ordered At')}}</th>
    				</tr>
    			</thead>
    			<tbody>
    				@forelse($orders as $order)
    				<tr>
    					<td>
                            <a href="{{route('order.show', $order->id)}}">{{$order->id}}</a>
                        </td>
    					<td>{{$order->total_price}}&euro;</td>
    					<td>{{$order->created_at->format('H:i:s d.m.Y')}}</td>
    				</tr>
    				@empty
    				<tr>
    					<td colspan="3">The list is empty</td>
    				</tr>
    				@endforelse
    			</tbody>
    		</table>
    	</div>
    </div>
   </div>
@endsection