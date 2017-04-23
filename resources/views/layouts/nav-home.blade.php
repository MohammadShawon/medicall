<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse nav-bg">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="/">Medicall</a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ 'appointment' }}">Appointment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/support">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/faq">FAQ</a>
          </li>
          @if(Auth::check())
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" width="35" height="35" src="{{ auth()->user()->photo }}">
                            </span>
                <span class="username">{{ auth()->user()->name }}</span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="/profile"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                  <a href="/appointment"><i class="icon_clock_alt"></i> My Appointment</a>
                </li>
                <li>
                  <a href="#"><i class="icon_mail_alt"></i> Messages</a>
                </li>
                <li>
                  <a href="#"><i class="icon_chat_alt"></i> Answers</a>
                </li>
                <li class="nav-item">

                  <form action="/logout" method="post" id="logout">{{ csrf_field() }} </form>
                    <a class="" onclick="document.getElementById('logout').submit()"><i class="icon_key_alt"></i>Logout</a>
                </li>

              </ul>
            </li>

          @else
            <li class="nav-item">
              <a class="nav-link " href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/register">Register</a>
            </li>
          @endif
        </ul>
        
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>