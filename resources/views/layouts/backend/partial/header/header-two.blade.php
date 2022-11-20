<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand" style="display: none;">
  <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
  <a class="navbar-brand me-1 me-sm-3" href="index.html">
    <div class="d-flex align-items-center"><img class="me-2" src="{{asset('assets/frontend/images/logo.png')}}" alt="" width="40"/><span class="font-sans-serif">Digital Space</span></div>
  </a>
  <ul class="navbar-nav align-items-center d-none d-lg-block">
    <li class="nav-item">
      <div class="search-box" data-list='{"valueNames":["title"]}'>
        <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
          <span class="fas fa-search search-box-icon"></span>
        </form>
        <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
          <div class="btn-close-falcon" aria-label="Close"></div>
        </div>
        <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
          <div class="scrollbar list py-3" style="max-height: 24rem;">
            <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Members</h6>

            @foreach (App\Models\User::latest()->where('utype', 'USR')->get(); as $user)
            <a class="dropdown-item px-card py-2" href="pages/user/profile.html">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-l status-online me-2">
                  <img class="rounded-circle" src="{{asset('assets/backend/img/profile-dumy.png')}}" alt="" />
                </div>
                <div class="flex-1">
                  <h6 class="mb-0 title">{{$user->first_name}} {{$user->last_name}}</h6>
                  @foreach ($user->courses as $course)
                  <p class="fs--2 mb-0 d-flex">{{$course->name}}</p>
                  @endforeach
                </div>
              </div>
            </a>
            @endforeach

          </div>
          <div class="text-center mt-n3">
            <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
          </div>
        </div>
      </div>
    </li>
  </ul>
  <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
    <li class="nav-item">
      <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
      <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
        <div class="card card-notification shadow-none">
          <div class="card-header">
            <div class="row justify-content-between align-items-center">
              <div class="col-auto">
                <h6 class="card-header-title mb-0">Notifications</h6>
              </div>
              <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
            </div>
          </div>
          <div class="scrollbar-overlay" style="max-height:19rem">
            <div class="list-group list-group-flush fw-normal fs--1">
              <div class="list-group-title border-bottom">NEW</div>
              <div class="list-group-item">
                <a class="notification notification-flush notification-unread" href="#!">
                  <div class="notification-avatar">
                    <div class="avatar avatar-2xl me-3">
                      <img class="rounded-circle" src="{{asset('assets/backend/img/team/1-thumb.png')}}" alt="" />
                    </div>
                  </div>
                  <div class="notification-body">
                    <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                  </div>
                </a>
              </div>
              <div class="list-group-item">
                <a class="border-bottom-0 notification notification-flush" href="#!">
                  <div class="notification-avatar">
                    <div class="avatar avatar-xl me-3">
                      <img class="rounded-circle" src="{{asset('assets/backend/img/team/10.jpg')}}" alt="" />
                    </div>
                  </div>
                  <div class="notification-body">
                    <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">View all</a></div>
        </div>
      </div>
    </li>
    <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-xl">
            @php
              $user = App\Models\User::find(Auth::id());
            @endphp
            @if($user->image)
            <img class="rounded-circle" src="{{ asset('storage/profile/'.$user->image) }}" alt="" />
            @else
            <img class="rounded-circle" src="{{asset('assets/backend/img/profile-dumy.png')}}" alt="" />
            @endif
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
        @if(Request::is('admin*'))
        <div class="bg-white dark__bg-1000 rounded-2 py-2">
          <a class="dropdown-item" href="{{route('admin.profile.index')}}">Profile &amp; account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('admin.profile.index')}}">Settings</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
          </form>
        </div>
        @endif
        @if(Request::is('user*'))
        <div class="bg-white dark__bg-1000 rounded-2 py-2">
          <a class="dropdown-item" href="{{route('user.profile.index')}}">Profile &amp; account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('user.profile.index')}}">Settings</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
          </form>
        </div>
        @endif
      </div>
    </li>
  </ul>
</nav>
<script>
  var navbarPosition = localStorage.getItem('navbarPosition');
  var navbarVertical = document.querySelector('.navbar-vertical');
  var navbarTopVertical = document.querySelector('.content .navbar-top');
  var navbarTop = document.querySelector('[data-layout] .navbar-top');
  var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');
  if (navbarPosition === 'top') {
    navbarTop.removeAttribute('style');
    navbarTopVertical.remove(navbarTopVertical);
    navbarVertical.remove(navbarVertical);
    navbarTopCombo.remove(navbarTopCombo);
  } else if (navbarPosition === 'combo') {
    navbarVertical.removeAttribute('style');
    navbarTopCombo.removeAttribute('style');
    navbarTop.remove(navbarTop);
    navbarTopVertical.remove(navbarTopVertical);
  } else {
    navbarVertical.removeAttribute('style');
    navbarTopVertical.removeAttribute('style');
    navbarTop.remove(navbarTop);
    navbarTopCombo.remove(navbarTopCombo);
  }
</script>