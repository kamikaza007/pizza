@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Pizzas') }} ({{__('Count')}}: {{$pizzas->count()}})
                    <a href="{{route('pizza.create')}}" class="btn btn-sm btn-primary float-right"><span class="ti-plus"></span> {{__('Add new')}}</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Created At')}}</th>
                                <th>{{__('Created By')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pizzas as $pizza)
                            <tr>
                                <td><img src="{{$pizza->thumbnail_url}}" alt="{{$pizza->name}}" width="50" class="img-fluid"></td>
                                <td>
                                    <a href="{{route('pizza.show', $pizza->id)}}">{{$pizza->name}}</a>
                                </td>
                                <td>{{$pizza->price}} &euro;</td>
                                <td>{{$pizza->created_at->format('d.m.Y')}}</td>
                                <td>{{$pizza->creator->name}}</td>
                                <td>
                                    <form method="POST" action="{{route('pizza.destroy', $pizza->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('pizza.edit', $pizza->id)}}" class="btn btn-sm btn-info"><span class="ti-pencil-alt"></span> {{__('Edit')}}</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure?');"><span class="ti-trash"></span> {{__('Delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
