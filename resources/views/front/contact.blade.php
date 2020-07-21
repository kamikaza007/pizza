@extends('layouts.frontend')

@section('main')
  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{__('Contact')}}

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('front.home')}}">{{__('Home')}}</a>
      </li>
      <li class="breadcrumb-item active">{{__('Contact')}}</li>
    </ol>

      <div class="row mb-5">
        <div class="col-md-6">
          <div class="p-5 bg-white border border-success h-100">
            <h2 class="font-italic text-success"><span class="ti-mobile"></span> Call us</h2>
            <p>
                Customer Care <br>
                0800 11 22 33
            </p>

          </div>
        </div>
        <div class="col-md-6">
          <div class="p-5 bg-white border border-info h-100">
            <h2 class="font-italic text-info"><span class="ti-write"></span> Write to us</h2>
            <p>
              The Yummi Pizza <br>  
              ADM123456 <br>
              Berlin <br>
              SW2A 1TY 
            </p>
            
          </div>
        </div>
      </div>
    </div>
@endsection