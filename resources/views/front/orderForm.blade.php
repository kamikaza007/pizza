@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{__('Order')}}
      <small>{{__('Form')}}</small>

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{route('front.cart')}}">{{__('Cart')}}</a>
      </li>
      <li class="breadcrumb-item active">{{__('Order Form')}}</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('order.store')}}">
          @csrf
            <div class="form-row">
              <div class="form-group col">
                <input type="text" class="form-control" placeholder="First name" name="firstname" id="firstname">
              </div>
              <div class="form-group col">
                <input type="text" class="form-control" placeholder="Last name" name="lastname" id="lastname">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
                <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Address"></textarea>
              </div>
              
            </div>
            <div class="form-row">
              <div class="form-group col">
                <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone">
              </div>
              <div class="form-group col">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">{{__('Complete your order')}}</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection