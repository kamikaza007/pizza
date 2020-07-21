@extends('layouts.frontend')

@section('main')

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('{{asset('img/home_2.jpg')}}')">
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('{{asset('img/home_3.jpg')}}')">
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('{{asset('img/home_4.jpg')}}')">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to the Yummi Pizza</h1>

    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-body  text-center">
            <span class="ti-import text-danger" style="font-size:50px;"></span>
            <br><br>
            <h3>Cooked hot and hands free</h3>
            <p class="card-text">
            
            Our pizzas are baked HOT at 260˚C (500˚F) and then transferred by a long pizza paddle directly to your pizza box.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-body  text-center">
            <span class="ti-headphone-alt text-info" style="font-size:50px;"></span>
            <br><br>
            <h3>No contact delivery!</h3>
            <p class="card-text">         
              Order Online for NO-CONTACT delivery. Our driver will contact you upon arrival and leave your pizza on a safe surface (or wherever you’ve specified in the special instructions)
          </p>

          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-body  text-center">
            <span class="ti-truck text-success" style="font-size:50px;"></span>
            <br><br>
            <h3>Free delivery!</h3>
            <p class="card-text">
            Offering free and fast delivery, we’re open late, as well as 365 days a year, to provide excellent food and an exceptional experience every time.
          </p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <hr>

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>About Us</h2>
        <p>
          Inspired by the Italian New York pizzerias found in Little Italy, in 1993, the Yummi pizza was born with the aim of bringing a slice of deep pan to the Europe.
        </p>
        <p>
          Ever since then we have focused on making pizza the proper way; with respect. Each Goodfella’s pizza starts its life as an individual dough ball, which is rested to develop the texture and flavour before being baked on real
        </p>
        <p>

          Italian stone and then topped with the highest quality toppings for an authentic taste of New York. The Yummi Pizza. Made with Respect!
        </p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="{{asset('img/pizzeria.jpg')}}" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p>Our pizzas are baked in 475-degree ovens to ensure food safety and never touched after baking. Then, now and always. Left at your door with a ring of the doorbell.
.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-primary btn-block" href="{{route('front.pizzas')}}">Order NOW!</a>
      </div>
    </div>

  </div>
  <!-- /.container -->
@endsection