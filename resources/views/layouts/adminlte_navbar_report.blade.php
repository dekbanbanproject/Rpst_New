<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <div class="container">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        <a href="" class="navbar-brand">
         
            <img src="{{ asset('/img/logo/rpst.jpg') }}" alt="" style="height:40px; width:40px;" style="opacity: .8">
           
            @foreach($data_hos  as $item )
            <label for=""  style='font-size:15px;color:rgb(8, 204, 129)'><cite title="Source Title">{{$item->hospitalname}}</cite></label>
            @endforeach
          <span class="brand-text font-weight-light"></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

     <!-- Left navbar links -->
     <ul class="navbar-nav">
          
            <li class="nav-item">
                    <a href="{{url('home')}}" class="nav-link"> <i class="fas fa-home" style='font-size:20px;color:rgb(253, 77, 7)'></i></a>
            </li>

            @foreach($permiss_u as $key => $item)
            <li class="nav-item">
                @if($item->user_hos == 'on' )
                <a href="{{url('hos/dashboard_hos/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="nav-link"> <i class="fas fa-hospital-symbol" style='font-size:20px;color:rgb(253, 77, 7)'></i></a>
                @endif
            </li>
            <li class="nav-item">
                @if($item->user_medic == 'on' )
                <a href="{{url('dashbord_medical/'.(Auth::user()->store_id).'/'.(Auth::user()->id))}}" class="nav-link"> <i class="fas fa-hospital" style='font-size:20px;color:rgb(253, 77, 7)'></i></a>
                @endif
            </li>
            <li class="nav-item">
                @if($item->user_rep == 'on' )
                <a href="{{url('report/report_dashboard/'.(Auth::user()->store_id).'/'.(Auth::user()->id) )}}" class="nav-link"> <i class="fas fa-chart-line" style='font-size:22px;color:rgb(253, 77, 7)'></i></a>
                @endif
            </li>
            @endforeach
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              
              <img src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->img)) }}"
              class="profile-user-img img-fluid img-circle" alt="User profile picture"  style="height:40px; width:40px;">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
             
              <img src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->img)) }}"
              class="profile-user-img img-fluid img-circle" alt="User profile picture"  style="height:40px; width:40px;">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
             
              <img src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->img)) }}"
              class="profile-user-img img-fluid img-circle" alt="User profile picture"  style="height:40px; width:40px;">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
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

  <div class="image">
    <img src="data:image/png;base64,{{ chunk_split(base64_encode(Auth::user()->img)) }}"
    class="profile-user-img img-fluid img-circle" alt="User profile picture"  style="height:40px; width:40px;">

    </div>
     
    </ul>
  </nav>
  <!-- /.navbar -->
