<section class="top-navbar-section">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('assets/frontend/images/logo.png')}}" width="96"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#digitalSpaceTopNav" aria-controls="digitalSpaceTopNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="digitalSpaceTopNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18 {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18 {{ Request::is('/about') ? 'active' : '' }}" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18 {{ Request::is('/our-course') ? 'active' : '' }}" href="{{route('course')}}">Our Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18 {{ Request::is('/our-team') ? 'active' : '' }}" href="{{route('team')}}">Our Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18" href="#">Our Students</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18 {{ Request::is('/our-team') ? 'active' : '' }}" href="{{route('contact')}}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-grey font-weight-500 font-size-18" href="{{route('register')}}">Registration</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>