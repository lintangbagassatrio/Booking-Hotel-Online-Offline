<!-- Navbar -->
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a href="{{ route('home') }}" class="navbar-brand">
      <img src="{{ url('frontend/images/logo.jpg') }}" alt="Logo NOMADS" />
    </a>
    <button
      class="navbar-toggler navbar-toggler-right"
      type="button"
      data-toggle="collapse"
      data-target="#navb"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item mx-md-2">
          <a href="#home" class="nav-link active">Home</a>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#room" class="nav-link">Rooms & Suites</a>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#about" class="nav-link">About Us</a>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#svc" class="nav-link">Services</a>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#testi" class="nav-link">Testimonial</a>
        </li>
        <li class="nav-item mx-md-2">
          <a href="#contact" class="nav-link">Contact</a>
        </li>
      </ul>
    

    @guest
        <form class="form-inline my-2 my-lg-0 d-none d-md-block">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </form>
    @endguest

    @auth
    <!-- Mobile Button -->
        <form class="form-inline d-sm-block d-md-none" action="{{  url('logout') }}" method="POST">
            @csrf
            <button class="btn btn-login my-2 my-sm-0" type="submit">
                Keluar
            </button>
        </form>

        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{  url('logout') }}" method="POST">
            @csrf
            <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                Keluar
            </button>
        </form>
    @endauth
    </div>
  </nav>
</div>
