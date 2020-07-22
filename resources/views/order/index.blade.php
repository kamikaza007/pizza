@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Orders') }} ({{__('Count')}}: {{$orders->total()}})
                </div>

                <div class="card-body">
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
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
