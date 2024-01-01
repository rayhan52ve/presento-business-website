  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Presento<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="{{asset('frontend/assets/img/logo.png')}}" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li>
            <a class="nav-link scrollto" href="{{ url()->current() != route('front.home') ? route('front.home'):'#hero'}}">Home</a>
          </li>
          <li><a class="nav-link scrollto" href="{{ url()->current() != url('front.home') ? route('front.home').'#about':'#about'}}">About</a></li>
          <li><a class="nav-link scrollto" href="{{ url()->current() != route('front.home') ? route('front.home').'#services':'#services'}}">Services</a></li>
          <li><a class="nav-link scrollto " href="{{ url()->current() != route('front.home') ? route('front.home').'#portfolio':'#portfolio'}}">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="{{ url()->current() != route('front.home') ? route('front.home').'#team':'#team'}}">Team</a></li>
          <li><a class="{{url()->current() == route('front.blog') ? 'active':'' }}" href="{{route('front.blog')}}">Blog</a></li>
          <li><a class="nav-link scrollto" href="{{ url()->current() != route('front.home') ? route('front.home').'#contact':'#contact'}}">Contact</a></li>
          <li class="dropdown"><a href="#"><span><i class="fa-regular fa-user"></i></span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if (@Auth::user()->id)
              <li><a target="_blank" href="{{route('dashboard')}}">Dashboard</a></li>
              <li><a  href="{{route('logout')}}">Logout</a></li>
              @else
              <li><a target="_blank" href="{{route('login')}}">Login</a></li>
              @endif
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->