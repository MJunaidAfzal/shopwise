<style>
    .bg-menu-theme.menu-vertical .menu-item.active>.menu-link:not(.menu-toggle) {
        background: #ff324d;
    }
    .bg-menu-theme.menu-vertical .menu-sub>.menu-item>.menu-link:before {
    left: -5rem;
    }
    </style>
    <link rel="stylesheet" href="{{asset('assets/fonts/remixicon.css')}}">
<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
      <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
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

        <li @if(url()->current() == Route::is('admin.dashboard')) class="menu-item active" @endif class="menu-item">
            <a href="{{ route('admin.dashboard') }}" class="mt-2 menu-link">
              <i style="margin-right: 10px;" class="fa fa-dashboard"></i>
              <div>Dashboard</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.user.index')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.user.index') }}" class="mt-2 menu-link">
              <i style="margin-right: 10px;" class="fa fa-user"></i>
              <div>Users</div>
            </a>
          </li>


          <li @if(url()->current() == Route::is('admin.product.index','admin.product.create','admin.product.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.product.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-stack-overflow"></i>
              <div>Product</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.page.index','admin.page.create','admin.page.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.page.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-file"></i>
              <div>Pages</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.review.index')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.review.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-star"></i>
              <div>Product Reviews</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.order.index','admin.order.view')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.order.index') }}" class=" menu-link">
              <i style="margin-right: 10px;" class="fa fa-clone"></i>
              <div>Orders</div>
            </a>
          </li>


          <li @if(url()->current() == Route::is('admin.contact.index')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.contact.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-phone"></i>
              <div>Contacts</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.category.index','admin.category.create','admin.category.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.category.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-clone"></i>
              <div>Category</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.brand.index','admin.brand.create','admin.brand.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.brand.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-buysellads"></i>
              <div>Brand</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.slider.index','admin.slider.create','admin.slider.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.slider.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-sliders"></i>
              <div>Slider</div>
            </a>
          </li>

          <li @if(url()->current() == Route::is('admin.banner.index','admin.banner.create','admin.banner.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.banner.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-image"></i>
              <div>Banner</div>
            </a>
          </li>


          <li @if(url()->current() == Route::is('admin.blog.index','admin.blog.search')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.blog.index') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-book"></i>
              <div>Blogs</div>
            </a>
          </li>


          <li @if(url()->current() == Route::is('admin.setting.edit')) class="menu-item" @endif class="menu-item">
            <a href="{{ route('admin.setting.edit') }}" class="menu-link">
              <i style="margin-right: 10px;" class="fa fa-cog"></i>
              <div>Settings</div>
            </a>
          </li>


    </ul>



  </aside>
  <!-- / Menu -->
