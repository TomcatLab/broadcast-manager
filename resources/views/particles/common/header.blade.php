<div class="horizontal-menu">
  <nav class="navbar top-navbar">
    <div class="container">
      <div class="navbar-content">
        <a href="#" class="navbar-brand">
          Br.<span>mng</span>
        </a>
        <form class="search-form">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i data-feather="search"></i>
              </div>
            </div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown nav-notifications">
            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="bell"></i>
              <div class="indicator">
                <div class="circle"></div>
              </div>
            </a>
            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                <a href="javascript:;" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="user-plus"></i>
                  </div>
                  <div class="content">
                    <p>New customer registered</p>
                    <p class="sub-text text-muted">2 sec ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="gift"></i>
                  </div>
                  <div class="content">
                    <p>New Order Recieved</p>
                    <p class="sub-text text-muted">30 min ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="alert-circle"></i>
                  </div>
                  <div class="content">
                    <p>Server Limit Reached!</p>
                    <p class="sub-text text-muted">1 hrs ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="layers"></i>
                  </div>
                  <div class="content">
                    <p>Apps are ready for update</p>
                    <p class="sub-text text-muted">5 hrs ago</p>
                  </div>
                </a>
                <a href="javascript:;" class="dropdown-item">
                  <div class="icon">
                    <i data-feather="download"></i>
                  </div>
                  <div class="content">
                    <p>Download completed</p>
                    <p class="sub-text text-muted">6 hrs ago</p>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="javascript:;">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown nav-profile">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="{{ url('assets/images/profile-img.jpg') }}" alt="profile" width="30" hight="30">
            </a>
            <div class="dropdown-menu" aria-labelledby="profileDropdown">
              <div class="dropdown-header d-flex flex-column align-items-center">
                <div class="figure mb-3">
                  <img src="{{ url('assets/images/profile-img.jpg') }}" alt="">
                </div>
                @guest
                  <div class="info text-center">
                    <p class="name font-weight-bold mb-0">Broadcaster</p>
                    <p class="email text-muted mb-3">Manager</p>
                  </div>
                @else
                  <div class="info text-center">
                    <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                    <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                  </div>
                @endguest
                
              </div>
              <div class="dropdown-body">
                <ul class="profile-nav p-0 pt-3">
                  <!-- <li class="nav-item">
                    <a href="pages/general/profile.html" class="nav-link">
                      <i data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      <i data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      <i data-feather="repeat"></i>
                      <span>Switch User</span>
                    </a>
                  </li> -->
                  @guest
                        
                  @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="log-out"></i>
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </li>
                  @endguest
                 
                </ul>
              </div>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
          <i data-feather="menu"></i>					
        </button>
      </div>
    </div>
  </nav>
  <nav class="bottom-navbar">
    <div class="container">
      <ul class="nav page-navigation">
        <li class="nav-item">
          <a class="nav-link" href="{{url('')}}">
            <i class="link-icon" data-feather="activity"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('providers') }}" class="nav-link">
            <i class="link-icon" data-feather="zap"></i>
            <span class="menu-title">Providers</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="category-heading">Providers</li>
              <li class="nav-item"><a class="nav-link" href="{{ url('providers/new-provider') }}">New</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('providers') }}">Providers</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('providers/add-category') }}">Add Category</a></li>
              <li class="category-heading">Category</li>
              <li class="nav-item"><a class="nav-link" href="{{ url('categories/new-category') }}">New</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('categories') }}">Categories</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="{{ url('settings') }}" class="nav-link">
            <i class="link-icon" data-feather="settings"></i>
            <span class="menu-title">Settings</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="nav-item"><a class="nav-link" href="{{ url('settings/general') }}">General</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('settings/menu') }}">Menu</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('posts')}}">
            <i class="link-icon" data-feather="airplay"></i>
            <span class="menu-title">Posts</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('cron/status') }}" class="nav-link">
            <i class="link-icon" data-feather="cast"></i>
            <span class="menu-title">Cron</span>
            <i class="link-arrow"></i>
          </a>
          <div class="submenu">
            <ul class="submenu-item">
              <li class="category-heading">Providers</li>
              <li class="nav-item"><a class="nav-link" href="{{url('cron/status')}}">Cron Status</a></li>
              <li class="nav-item"><a class="nav-link" href="{{url('cron')}}">Cron</a></li>
            </ul>
          </div>
        </li>        
      </ul>
    </div>
  </nav>
</div>