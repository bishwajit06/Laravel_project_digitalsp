<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">
              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            </div>
            <a class="navbar-brand" href="#">
              <div class="d-flex align-items-center py-3"><img src="{{asset('assets/frontend/images/logo_dashboard.png')}}" alt="Digital Space">
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              @if(Request::is('admin*'))
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                  <!-- parent pages-->
                  <a class="nav-link" href="{{route('admin.dashboard')}}"> <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                    </div></a>
                </li>
                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">App</div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="{{ Request::is('admin/user*') ? 'true' : 'false' }}" aria-controls="user">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Students</span></div>
                  </a>
                  <ul class="nav collapse {{ Request::is('admin/user*') ? 'show' : '' }}" id="user">
                    <li class="nav-item">
                      <a class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}" href="{{route('admin.user.index')}}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Students</span></div>
                      </a><!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('admin/user/create') ? 'active' : '' }}" href="{{route('admin.user.create')}}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Register Student</span></div>
                      </a><!-- more inner pages-->
                    </li>
                  </ul>
                  <!-- parent pages-->
                  <a class="nav-link dropdown-indicator" href="#course" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="course">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Course</span></div>
                  </a>
                  <ul class="nav collapse {{ Request::is('admin/course*') ? 'show' : '' }}" id="course">
                    <li class="nav-item">
                      <a class="nav-link {{ Request::is('admin/course') ? 'active' : '' }}" href="{{route('admin.course.index')}}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Courses</span></div>
                      </a><!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New Course</span></div>
                      </a><!-- more inner pages-->
                    </li>
                  </ul>
                  <a class="nav-link {{ Request::is('admin/payment') ? 'active' : '' }}" href="{{route('admin.payment.index')}}" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-cart-plus"></span></span><span class="nav-link-text ps-1">Payment Order</span></div>
                  </a>
                </li>
                <!-- parent pages-->
                <a class="nav-link dropdown-indicator" href="#profile" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="profile">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Profile</span></div>
                </a>
                <ul class="nav collapse {{ Request::is('admin/profile') ? 'show' : '' }}" id="profile">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}" href="{{route('admin.profile.index')}}" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">View Profile</span></div>
                    </a><!-- more inner pages-->
                  </li>
                  <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="{{ route('logout') }}" data-bs-toggle="" aria-expanded="false" onclick="event.preventDefault(); this.closest('form').submit();">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Logout</span></div>
                    </a><!-- more inner pages-->
                    </form>
                  </li>
                </ul>
                
              </li>
              </ul>
              @endif
              @if(Request::is('user*'))
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                  <!-- parent pages-->
                  <a class="nav-link" href="{{route('dashboard')}}"> <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                    </div></a>
                </li>
                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">App</div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                  </div>
                  <!-- parent pages--><a class="nav-link dropdown-indicator" href="#course" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="course">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-file-alt"></span></span><span class="nav-link-text ps-1">Course</span></div>
                  </a>
                  <ul class="nav collapse {{ Request::is('user/course') ? 'show' : '' }}" id="course">
                    <li class="nav-item">
                      <a class="nav-link {{ Request::is('user/course') ? 'active' : '' }}" href="{{route('user.course.index')}}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Courses</span></div>
                      </a><!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">My Course</span></div>
                      </a><!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                <!-- parent pages-->
                <a class="nav-link dropdown-indicator" href="#profile" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="profile">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Profile</span></div>
                </a>
                <ul class="nav collapse {{ Request::is('user/profile') ? 'show' : '' }}" id="profile">
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('user/profile') ? 'active' : '' }}" href="{{route('user.profile.index')}}" data-bs-toggle="" aria-expanded="false">
                      <div class="d-flex align-items-center"><span class="nav-link-text ps-1">View Profile</span></div>
                    </a><!-- more inner pages-->
                  </li>
                </ul>
              </li>
              </ul>
              @endif
              <div class="settings mb-3">
                <div class="card alert p-0 shadow-none" role="alert">
                  <div class="btn-close-falcon-container">
                    <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                  </div>
                  <div class="card-body text-center"><img src="{{asset('assets/backend/img/icons/spot-illustrations/navbar-vertical.png')}}" alt="" width="80" />
                    <p class="fs--2 mt-2">Loving what you see? <br />Buy our hotest Course from <a href="#!">Digital Space</a></p>
                    <div class="d-grid"><a class="btn btn-sm btn-purchase" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>