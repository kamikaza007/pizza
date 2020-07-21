@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pizza') }}: {{__('Edit')}}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{route('pizza.update', $pizza->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                          <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $pizza->name)}}">
                          </div>
                          <div class="form-group">
                              <label for="description">{{__('Description')}}</label>
                              <textarea name="description" class="form-control" id="description" cols="20" rows="10">{{old('description', $pizza->description)}}</textarea>
                          </div>
                          <div class="form-group">
                              <label for="price">{{__('Price')}}</label>
                              <input type="text" name="price" id="price" class="form-control" value="{{old('price', $pizza->price)}}">
                          </div>
                          <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                          <button type="submit" class="btn btn-primary btn-block">{{__('Save')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection