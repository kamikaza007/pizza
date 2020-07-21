@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}: {{__('Show')}}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{$pizza->image_url}}" alt="{{$pizza->name}}" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-6">
                            <h2>{{$pizza->name}}</h2>
                            <div id="price" class="text-muted">{{__('Price')}}: {{$pizza->price}} &euro;</div>
                            <br>
                            <div id="description">
                                {{$pizza->description}}
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
