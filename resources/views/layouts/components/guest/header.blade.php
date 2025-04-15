 <header class="header sticky-bar">
     <div class="container">
         <div class="main-header">
             <div class="header-left">
                 <div class="header-logo"><a class="d-flex" href="{{ route('index') }}"><img alt="jobBox"
                             src="/assets/media/logo.png" height="50"></a>
                 </div>
             </div>
             <sub class="fs-7">PT. Meiji Indonesia</sub>
             <div class="header-nav">
                 <nav class="nav-main-menu">
                     <ul class="main-menu">
                         <li>
                             <a href="{{ route('index') }}"
                                 class="{{ request()->routeIs('index') ? 'active' : '' }}">Home</a>
                         </li>
                         <li>
                             <a href="{{ route('career-list') }} "
                                 class="{{ request()->routeIs('career-list') ? 'active' : '' }}">Career List</a>
                         </li>
                     </ul>
                 </nav>
                 <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                         class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
             </div>
             <div class="header-right">
                 <div class="block-signin">
                     @auth
                         <div class="dropdown w-auto">
                             <a class="d-inline-flex align-items-center header-item dropdown-toggle " href= ""
                                 role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img alt="Logo"
                                     src="{{ Auth::user()->profile->avatar_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&font-size=0.4' }}"
                                     class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;" />
                                 <span class="text-left fw-medium" title="Hi, {{ Auth::user()->name }}">Hi,
                                     {{ Str::limit(Auth::user()->name, 10, '...') }}</span>
                                 <i class="icon-down ms-2"></i>
                             </a>
                             <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="min-width: auto;">
                                 <li class="dropdown-item ps-2 ">
                                     <span class="d-flex ms-0 ps-0">
                                         <img src="{{ Auth::user()->profile->avatar_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&font-size=0.4' }}"
                                             alt="Profile" class="rounded-circle me-2"
                                             style="width: 40px; height: 40px; object-fit: cover;">
                                         <div>
                                             <h6 class="mb-0 small">{{ Auth::user()->name }}</h6>
                                             <div class="text-muted text-xs small">{{ Auth::user()->email }}</div>
                                         </div>
                                     </span>
                                 </li>
                                 <li>
                                     <hr class="dropdown-divider">
                                 </li>
                                <a class="dropdown-item" href="/career-applied">My Profile</a>
                                 <a class="dropdown-item" href="/career-applied">Applied Jobs</a>
                                 <li><a class="dropdown-item" href="#">Saved Jobs</a></li>
                                 <li>
                                     <hr class="dropdown-divider">
                                 </li>
                                 <li><a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         Logout
                                     </a></li>
                             </ul>
                         </div>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                     @else
                         <!-- <a class="text-link-bd-btom hover-up" href="{{ route('register') }}">Register</a> -->
                         <a class="btn btn-danger btn-shadow ml-40 hover-up" href="{{ route('login') }}">Sign in</a>
                     @endauth
                 </div>
             </div>
         </div>
     </div>
 </header>
 <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
     <div class="mobile-header-wrapper-inner">
         <div class="mobile-header-content-area">
             <div class="perfect-scroll">
                
                     <div class="mobile-menu-wrap mobile-header-border">
                         <!-- mobile menu start-->
                         <nav>
                             <ul class="mobile-menu font-heading">

                                 <li><a href="{{ route('career-list') }}">Careers</a></li>
                             </ul>
                         </nav>
                     </div>
                      @auth
                     <div class="mobile-account">
                         <span class="d-flex align-items-center ms-0 ps-0">
                             <img src="{{ Auth::user()->profile->avatar_url ?? 'https://ui-avatars.com/api/?name=' . Auth::user()->name . '&font-size=0.4' }}"
                                 alt="Profile" class="rounded-circle me-2"
                                 style="width: 40px; height: 40px; object-fit: cover;">
                             <div>
                                 <h6 class="mb-0 small">{{ Auth::user()->name }}</h6>
                                 <p class="text-muted text-xs small">{{ Auth::user()->email }}</p>
                             </div>
                         </span>
                         <ul class="mobile-menu font-heading">
                             <li><a href="/career-applied">My Profile</a></li>
                             <li><a href="/career-applied">Applied Job</a></li>
                             <li><a href="#">Saved Jobs</a></li>
                             <li><a href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                     Logout
                                 </a></li>
                         </ul>
                     </div>
                 @else
                     <div class="mobile-account">
                         <a class="btn btn-danger btn-shadow ml-40 hover-up" href="{{ route('login') }}">Sign in</a>
                     </div>
                 @endauth
                 <div class="site-copyright">Copyright 2024 &copy; PT Meiji Indonesia. </div>
             </div>
         </div>
     </div>
 </div>

