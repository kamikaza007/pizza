<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>The Yummi pizza</title>

  <!-- STYLES -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.css')}}">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('front.home')}}">The Yummi pizza</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('front.home')}}">{{__('Home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('front.pizzas')}}">{{__('Menu')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('front.contact')}}">{{__('Contact')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('front.cart')}}">
              <span class="ti-shopping-cart"></span> {{__('Shopping cart')}} 
              <span class="badge badge-pill badge-success">{{collect(session('cart'))->sum('quantity')}}</span>
            </a>
          </li>
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{route('front.orderHistory')}}" class="dropdown-item">{{__('Order history')}}</a>
                    @if(Auth::user()&&Auth::user()->is_admin)
                      <a href="{{route('admin.home')}}" class="dropdown-item">{{__('Admin panel')}}</a>
                    @endif

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        </ul>
      </div>
    </div>
  </nav>

  @yield('main')

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Petar Orovic 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
