@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{__('Pizza')}}
      <small>{{$pizza->name}}</small>

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('front.pizzas')}}">{{__('Menu')}}</a>
      </li>
      <li class="breadcrumb-item active">{{$pizza->name}}</li>
    </ol>
	
	@if(session()->has('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  {{session()->get('success')}}
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
    <!-- Portfolio Item Row -->
    <div class="row mb-5">

      <div class="col-md-6">
        <img class="img-fluid img-thumbnail" src="{{$pizza->image_url}}" alt="">
      </div>

      <div class="col-md-6">
        <h3 class="my-3">{{$pizza->name}}</h3>
        <p class="text-muted">{{__('Price')}}: {{$pizza->price}} &euro;</p>
        <p>{{$pizza->description}}</p>
        <hr>
	<div class="row">
		<div class="col-md-6">
			<a href="{{route('front.buyNow', $pizza->id)}}" class="btn btn-block btn-danger">{{__('Buy now!')}}</a>
		</div>
		<div class="col-md-6">
			<a href="{{route('front.addToCart', $pizza->id)}}" class="btn btn-block btn-primary">{{__('Add to cart')}}</a>
		</div>
	</div>
        
        
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection