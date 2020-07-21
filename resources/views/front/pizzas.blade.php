@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Menu
      <small>List</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item active">{{__('Menu')}}</li>
    </ol>

    <div class="row">
    	@foreach($pizzas as $pizza)
	      <div class="col-lg-4 col-sm-6 portfolio-item">
	        <div class="card h-100">
	          <a href="{{route('front.pizza', $pizza->id)}}">
	          	<img class="card-img-top" src="{{$pizza->thumbnail_url}}" alt="{{$pizza->name}}">
	          </a>
	          <div class="card-body">
	            <h4 class="card-title">
	              <a href="{{route('front.pizza', $pizza->id)}}">{{$pizza->name}}</a>
	            </h4>
	            <p class="card-text">
	            	{{$pizza->description}}
	            </p>
	          </div>
	        </div>
	      </div>
      	@endforeach
    </div>

  </div>
  <!-- /.container -->
@endsection