@extends('admin.layouts.auth-scaffold')
@push('title')
Admin Login
@endpush
@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('admin/assets/vendor/css/pages/page-auth.css')}}">
@endpush
@section('content')
</head>
<body>
   <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
         <div class="authentication-inner py-4">
            <div class="card">
               <div class="card-body">
                  <div class="app-brand justify-content-center mb-4 mt-2">
                        <div>

<a href="{{ route('pages.index') }}">   <img class="logo_dark" src="{{asset('assets/images/logo_dark.png')}}" alt="logo"></a>
                        </div>
                     </a>
                  </div>
                  <h4 class="mb-1 pt-2">Welcome to Shopwise</h4>
                  <p class="mb-4">Please sign-in to your account</p>
                  @if(Session::has('Error'))
                  <div class="alert alert-danger">{{ Session::get('Error') }}</div>
                  @endif
                  <form id="formAuthentication" class="mb-3" action="" method="POST">
                     @csrf
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
                        <small class="text-danger">@error ('email') {{ $message }} @enderror</small>
                     </div>
                     <div class="mb-3 form-password-toggle">
                        <div class="d-flex justify-content-between">
                           <label class="form-label" for="password">Password</label>

                        </div>
                        <div class="">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                           <small class="text-danger">@error ('password') {{ $message }} @enderror</small>
                        </div>
                        <div class="mt-3">
                            <input type="checkbox" onclick="MyFunction()">
                             Show Password
                        </div>
                     </div>
                     <div class="mb-3">
                        <button class="btn btn-primary d-grid w-100 hover" type="submit">Sign in</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   @push('scripts')
   <script type="text/javascript">
    function MyFunction(){
        var show = document.getElementById('password');
        if(show.type == 'password'){
            show.type = 'text';
        }
        else{
            show.type = 'password';
        }
    }
    </script>
<script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5J3LMKC');

   </script>
   <script src="{{asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/hammer/hammer.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/i18n/i18n.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/js/menu.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
   <script src="{{asset('admin/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/main.js')}}"></script>
   <script src="{{asset('admin/assets/js/pages-auth.js')}}"></script>
   @endpush
   @endsection
