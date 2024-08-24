<style>
    .bg-menu-theme.menu-vertical .menu-item.active>.menu-link:not(.menu-toggle) {
        background: #f47809;
    }
    .bg-menu-theme.menu-vertical .menu-sub>.menu-item>.menu-link:before {
    left: -5rem;
    }
    </style>
    <link rel="stylesheet" href="{{asset('assets/fonts/remixicon.css')}}">
<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
      <a href="{{ route('pages.index') }}" class="app-brand-link">
        <div class="mt-3">
            <img class="logo_dark" src="{{asset('assets/images/logo_dark.png')}}" alt="logo">
        </div>
  </span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="fa fa-bars"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">

        <li @if(url()->current() == Route::is('reader.dashboard')) class="menu-item active" @endif class="menu-item">
            <a href="{{ route('reader.dashboard') }}" class="mt-2 menu-link">
              <i style="margin-right: 10px;" class="fa fa-dashboard"></i>
              <div>Dashboard</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('reader.profile')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('reader.profile') }}" class="mt-2 menu-link">
              <i style="margin-right: 10px;" class="fa fa-user"></i>
              <div>Profile</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('reader.blog.index')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('reader.blog.index') }}" class=" menu-link">
              <i style="margin-right: 10px;" class="fa fa-heart"></i>
              <div>Favourite Blogs</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('reader.review.index')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('reader.review.index') }}" class=" menu-link">
              <i style="margin-right: 10px;" class="fa fa-star"></i>
              <div>My Reviews</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('reader.order.index','reader.order.view')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('reader.order.index') }}" class=" menu-link">
              <i style="margin-right: 10px;" class="fa fa-clone"></i>
              <div>My Orders</div>
            </a>
          </li>


          <li class="menu-item">
            <a class="menu-link" href="javascript:;"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i style="margin-right: 10px;" class="fa fa-sign-out"></i>
                <div class="align-middle"> Log Out</div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                </form>
             </a>
        </li>


    </ul>



  </aside>
  <!-- / Menu -->
