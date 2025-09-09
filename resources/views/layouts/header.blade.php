<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logg.png') }}" alt="image"/></a>
          </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">

            <div class="header_widgets">
              <div class="circle_icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
              <p class="uppercase_text">Email</p>
              <a href="mailto:rentacar@gmail.com">rentacar@gmail.com</a>
            </div>

            <div class="header_widgets">
              <div class="circle_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <p class="uppercase_text">Phone</p>
              <a href="tel:044000000">044 000-000</a>
            </div>

            {{-- @include('auth.userlogin') <!-- vendos file Blade për login/register --> --}}

            @if(isset($client))
              <span>Welcome To Car rental portal</span>
            @else
              <a href="#loginform" class="btn btn-danger btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="header_wrap">
        <div class="user_login">
            <ul>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        @if(isset($client))
                            {{ $client->name }}
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        @if(isset($client))
                            <li><a href="/profileclient">Profile Settings</a></li>
                            <li><a href="/update-password">Update Password</a></li>
                            <li><a href="/my-bookings">My Booking</a></li>
                            <li><a href="/logouts">Sign Out</a></li>
                        @else
                            <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Profile Settings</a></li>
                            <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Update Password</a></li>
                            <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">My Booking</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>

        <div class="header_search">
            <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
            <form action="#" method="get" id="header-search-form">
                <input type="text" placeholder="Search..." class="form-control">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="#vehicles">Car Listing</a></li>
          <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

